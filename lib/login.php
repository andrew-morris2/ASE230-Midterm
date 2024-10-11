<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = htmlspecialchars(trim($_POST['username']));
        $password = htmlspecialchars(trim($_POST['password']));

        $jsonFile = 'users.json'; 
        $jsonData = file_get_contents($jsonFile);
        $phpArray = json_decode($jsonData, true);

        $user_found = false;
        $user_admin = false;
        foreach($phpArray['users'] as $user){
            if ($user['username'] === $username){
                if ($user['password'] === $password){
                    $_SESSION['username'] = $username;
                    $_SESSION['type'] = $user['type'];
                    if ($user['type'] === 'admin'){
                        header("Location: ../admin.php");
                    } else{
                        header("Location: ../welcome.php?user=" . urlencode($username));
                        exit();
                    }
                } else{
                    header("Location: signin.php?error=" . urlencode("Invalid username or password"));
                    exit();
                }
                $user_found = true;
                break;
            }
        }
        if (!$user_found){
            header("Location: signin.php?error=" . urlencode("Invalid username or password")); //if username or password is incorrect, send error into url
            exit();
        }

    }
?>