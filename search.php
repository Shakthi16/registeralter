<?php
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['searchFirstName'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE firstName = ?");
    $stmt->execute([$firstName]);
    $user = $stmt->fetch();

    if ($user) {
        echo json_encode([
            'success' => true,
            'user' => $user
        ]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>
