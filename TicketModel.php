<?php

namespace App\Models;

use PDO;

class TicketModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=railway_management', 'root', '');
    }

    public function searchTrains($destination, $date)
    {
        $stmt = $this->db->prepare("SELECT * FROM trains WHERE destination = :destination AND journey_date = :journey_date");
        $stmt->execute(['destination' => $destination, 'journey_date' => $date]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function bookTicket($userId, $trainName, $journeyDate, $destination)
    {
        $stmt = $this->db->prepare("INSERT INTO tickets (user_id, train_name, journey_date, destination) VALUES (:user_id, :train_name, :journey_date, :destination)");
        $stmt->execute([
            'user_id' => $userId,
            'train_name' => $trainName,
            'journey_date' => $journeyDate,
            'destination' => $destination
        ]);
        return $this->db->lastInsertId();
    }

    public function getUserBookings($userId)
{
    $stmt = $this->db->prepare("SELECT * FROM tickets WHERE user_id = :user_id");
    $stmt->execute(['user_id' => $userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
