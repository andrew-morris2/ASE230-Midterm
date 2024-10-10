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
                    if ($user['type'] === 'admin'){
                        header("Location: ../admin.php");
                    } else{
                        header("Location: ../welcome.php?user=" . urlencode($username));
                        exit();
                    }
                } else{
                    $error = "Invalid username or password";
                }
                $user_found = true;
                break;
            }
        }
        if (!$user_found){
            header("Location: signin.php"); //if username or password is incorrect, keep them at logon screen
            exit();
        }

    }
?>