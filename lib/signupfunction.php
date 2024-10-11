<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $type = 'standard';

    if ($password === $confirm_password) {
        $file_path = 'users.json';
        if (file_exists($file_path)) {
            $json_data = file_get_contents($file_path);
            $data = json_decode($json_data, true);
        } else {
            $data = ['users' => []]; // Initialize with users key
        }

        $new_user = [
            'username' => $username,
            'password' => $password,
            'type' => $type,
        ];

        $data['users'][] = $new_user; // Add new user to the users array

        file_put_contents($file_path, json_encode($data, JSON_PRETTY_PRINT)); // Encode and save

        header('Location: signin.php');
        exit();
    } else {
        header('Location: register.html?error=Passwords do not match');
        exit();
    }
}
?>