<?php
    $server = "localhost";
    $username = 'root';
    $password = 'mission0321';
    $database = 'photocards'; //specifies which schema within locally hosted mySQL server

    $conn = new mysqli($server, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }


?>