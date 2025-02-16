<?php
session_start();
?>

<h2>Your Bookings</h2>

<?php if (!empty($bookings) && is_array($bookings)): ?>
    <ul>
        <?php foreach ($bookings as $booking): ?>
            <li>
                <strong>Train:</strong> <?= htmlspecialchars($booking['train_name']) ?> | 
                <strong>Date:</strong> <?= htmlspecialchars($booking['journey_date']) ?> | 
                <strong>Status:</strong> <?= htmlspecialchars($booking['booking_status']) ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No bookings found.</p>
<?php endif; ?>
