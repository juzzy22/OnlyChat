<?php
require_once '../APP/init.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // verify
    if (!isset($password)) {
        $token = $_POST["token"];

        // verify
        $query = "SELECT * FROM users WHERE token = '$token'";
        $verify = new Connect($query);
        $data = $verify->read($verify->query());

        header("Location: index.php?token=" . $token . "&username=" . $data["username"]);
    };
    // Collect the form data
    $token = $_POST['token'] ?? null;
    $password = $_POST['password'] ?? null;

    // Verify Account


    // Password Change
    $changePass = new Update($password, $token);
    $changePass->update();
}


// $changePass = new Update("345", "dWxhcjY0MTkxMTczMzk2Mjc3NQ==");
// var_dump($changePass->tokenVerify());