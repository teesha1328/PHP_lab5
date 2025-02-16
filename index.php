<?php

// Start the session to manage user authentication and state
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Autoload classes using Composer
require __DIR__ . '/../../vendor/autoload.php';

// Get the request URI and method
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Debugging: Output the request URI and method
var_dump($requestUri); // Output the URI
var_dump($requestMethod); // Output the request method

// Routing logic
if ($requestUri === '/search-trains' && ($requestMethod === 'GET' || $requestMethod === 'POST')) {
    $controller = new TicketController();
    $controller->searchTrains(); // Correct method name
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
