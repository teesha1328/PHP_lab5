<?php

namespace App\Controllers;

use App\Models\TicketModel;

class TicketController
{
    private $model;

    public function __construct()
    {
        $this->model = new TicketModel();
    }

    public function searchTrains()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $destination = trim($_POST['destination'] ?? '');
            $date = trim($_POST['date'] ?? '');

            if (empty($destination) || empty($date)) {
                die('Invalid input.');
            }

            $trains = $this->model->searchTrains($destination, $date);
            include __DIR__ . '/../Views/searchResults.php';
        } else {
            include __DIR__ . '/../Views/searchForm.php';
        }
    }

    public function bookTicket()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user_id'] ?? null;
            $trainName = trim($_POST['train_name'] ?? '');
            $journeyDate = trim($_POST['journey_date'] ?? '');
            $destination = trim($_POST['destination'] ?? '');

            if (!$userId || empty($trainName) || empty($journeyDate) || empty($destination)) {
                die('Invalid booking details.');
            }

            $ticketId = $this->model->bookTicket($userId, $trainName, $journeyDate, $destination);
            include __DIR__ . '/../Views/bookingConfirmation.php';
        }
    }

    public function viewBookings()
    {
        session_start();
        $userId = $_SESSION['user_id'] ?? null;

        if (!$userId) {
            die('User not authenticated.');
        }

        $bookings = $this->model->getUserBookings($userId);
        include __DIR__ . '/../Views/viewBookings.php';
    }
}
