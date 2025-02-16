<h2>Available Trains</h2>
<?php foreach ($trains as $train): ?>
    <p>Train: <?= $train['name'] ?> | Destination: <?= $train['destination'] ?> | Date: <?= $train['journey_date'] ?></p>
    <form method="POST" action="/book-ticket">
        <input type="hidden" name="user_id" value="1"> <!-- Assume user is logged in -->
        <input type="hidden" name="train_name" value="<?= $train['name'] ?>">
        <input type="hidden" name="journey_date" value="<?= $train['journey_date'] ?>">
        <input type="hidden" name="destination" value="<?= $train['destination'] ?>">
        <button type="submit">Book Ticket</button>
    </form>
<?php endforeach; ?>
