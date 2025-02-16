<?php

namespace App\Models;

use PDO;

class Ticket
{
    private $pdo;

    public function __construct()
    {
        // Set up the database connection
        $this->pdo = new PDO('mysql:host=localhost;dbname=railway_management', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getUserBookings($userId)
    {
        // Fetch bookings for the given user ID
        $sql = "SELECT train_name, journey_date, booking_status FROM tickets WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':user_id' => $userId]);

        // Return the results as an associative array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
