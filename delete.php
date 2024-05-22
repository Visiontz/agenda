<?php

require_once 'auth.php';
require_once 'config.php';

// Check if ID is provided in the URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo 'ID not provided';
    exit;
}

$id = $_GET['id'];

// Fetch the agenda item from the database based on the provided ID
$sql = 'SELECT * FROM agenda WHERE id = :id';
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$agenda_item = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the agenda item exists
if (!$agenda_item) {
    echo 'Agenda item not found';
    exit;
}

// Delete the agenda item from the database
$sql = 'DELETE FROM agenda WHERE id = :id';
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    header('Location: tabel.php');
} else {
    echo 'Error deleting agenda item';
}
