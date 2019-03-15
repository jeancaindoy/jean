<?php
    require_once('connect.php');
    require_once('token.php');
    session_start();
    $jwt = $_SESSION['jwt'];    
    $id = $_SESSION['id'];
    validateToken($id, $jwt, $conn);
    function validateToken($id, $userToken, $conn){
        // create a new token based on the token date stored on the db before
        $existingToken = generateToken($id, 1, $conn);
        echo "Existing token: ". $existingToken;
        // compare the two token
        if($userToken===$existingToken){
            echo "<br> TOKEN IS VALID";
            echo "<br>";
            echo "$userToken";
        }else{
            echo "<br> TOKEN IS INVALID";
            echo "<br>";
            echo "$userToken";
        }
    }
?>