<?php
// script requested by card_creation.js to generate HTML code based on members + database
    include('dbconfig.php');
    $artist_name = $_POST['name'];


    $groups_json = file_get_contents($_SERVER['DOCUMENT_ROOT']. '/data/' . 'groups.json');
    $groups_arr = json_decode($groups_json, true);

    echo $artist_name //placeholder. here we should echo full HTMl
?>