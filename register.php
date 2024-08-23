<?php
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate input data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $zipcode = $_POST['zipcode'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Update or insert user data
    $stmt = $pdo->prepare("REPLACE INTO users (firstName, lastName, dob, phone, address, city, state, country, zipcode, email, username, password)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt->execute([$firstName, $lastName, $dob, $phone, $address, $city, $state, $country, $zipcode, $email, $username, $password])) {
        echo 'Record updated successfully!';
    } else {
        echo 'Failed to update record.';
    }
}
?>
