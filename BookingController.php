<?php

// Start the session to manage user authentication and state
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


// Autoload classes using Composer
require __DIR__ . '/../../vendor/autoload.php';




// Import the controllers
use App\Controllers\BookingController;
use App\Controllers\TicketController;

// Routing logic
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Route definitions
if ($requestUri === '/search-trains' && $requestMethod === 'GET') {
    $controller = new TicketController();
    $controller->searchTrains();
} elseif ($requestUri === '/search-trains' && $requestMethod === 'POST') {
    $controller = new TicketController();
    $controller->searchTrains();
} elseif ($requestUri === '/book-ticket' && $requestMethod === 'POST') {
    $controller = new TicketController();
    $controller->bookTicket();
} elseif ($requestUri === '/view-bookings' && $requestMethod === 'GET') {
    $controller = new TicketController();
    $controller->viewBookings();
} else {
    // Default route - show 404 or home page
    http_response_code(404);
    echo '<h1>404 - Page Not Found</h1>';
}
