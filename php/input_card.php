<?php
    //select from supported groups, or add new group!
    //select from supported members, or add new member!

    //upon adding new group/new member, update groups.json

    include('dbconfig.php'); //connects to database photocards

    //check which form by checking name of submit input button since
    //the name of the input is 'set' differently by respective form
    if (isset($_POST["custom_submit"])) {
        $custom = true;
        $group = strtoupper($_POST['custom_group_name']);
        $artist = strtolower($_POST['custom_artist_name']);
        $contact = $_POST['custom_contact'];
        $image_link = $_POST['custom_image'];
        $image = $_FILES['custom_image_file']['tmp_name']; //current temp location of file
        $details = $_POST['custom_details'];

        // update groups.json, add group/member accordingly
        // $_SERVER['DOCUMENT_ROOT']

    }

    else {
        echo 'non-custom';
        $custom = false;
        $group = strtoupper($_POST['group_name']);
        $artist = strtolower($_POST['artist_name']);
        $contact = $_POST['contact'];
        $image_link = $_POST['image'];
        $image = $_FILES['image_file']['tmp_name'];
        $details = $_POST['details'];

        // update groups.json, add group;/member accordingly.


    }

    //update groups.json. if new custom group, create new HTML page under cards to be accessed
    if ($custom) {
        // get contents of json file as string, turn into json, add new group and nmember
        $groups_file = file_get_contents($_SERVER['DOCUMENT_ROOT']. '/data/' . 'groups.json');
        $groups_arr = json_decode($groups_file, true); //json as associative array
        $groups_arr[$group] = array("has_pic" => false, "color" => "black", "members" => array($artist));
        file_put_contents($_SERVER['DOCUMENT_ROOT']. '/data/' . 'groups.json', json_encode($groups_arr)); // write to json file

        $new_html = $_SERVER['DOCUMENT_ROOT']. '/cards/' . strtolower($group) . '.html';
        if (!file_exists($new_html)) {
            $input_html = "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Document</title>
                <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Koulen'>
                <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Bebas+Neue'>
                <link rel='stylesheet' href='../css/style.css'>
            
            </head>
            <body>
            <header style='background-color:black'>
            <div class='home_bar'>
                <a href='../index.html'>HOME</a>
            </div>
            <div class='in-header'>" . $group . "
            </div>
    
            <div class='search'>
                <a href='../card_search.html'>Back to Group Search</a>
            </div>
        </header>
    
        <main>
            <!-- dev server side using ajax post request-->
    <!-- get from database: sort using group number, then sort by ascending hash number. if member not put in, then no cards of that member
    available!-->
            <div class='collapse_container'>
            <button type='button' class='collapsible'> rosé </button>
    
            <div class='content'>
                <div>
                    Contact Info
                </div>
                <div>
                    Date Uploaded
                </div>
                <div>
                    Photocard Image
                </div>
                <div>
                    Additional Details
                </div>
    
                <div>
                    @rob_onion
                </div>
                
                <div>
                    4/5/2022
                </div>
                <div>
                    image linkasd;fja;sdjfiasd;jfiasd;fiai;dsfjiasjdf;dsifas;difasd;ifad;sifa;idj;fadsiafs;nvasdn;lkan;dkjva;svnisj
                </div>
    
                <div>
                    new super slay card woah
                </div>
    
                <div>
                    HAKUNA MATATA 
                </div>
            </div>
            </div>
    
            <div class='collapse_container'>
                <button type='button' class='collapsible'> lisa </button>
        
                <div class='content'>
                    <div>
                        Contact Info
                    </div>
                    <div>
                        Date Uploaded
                    </div>
                    <div>
                        Photocard Image
                    </div>
                    <div>
                        Additional Details
                    </div>
        
                    <div>
                        @rob_onion
                    </div>
                    
                    <div>
                        4/5/2022
                    </div>
                    <div>
                        image linkasd;fja;sdjfiasd;jfiasd;fiai;dsfjiasjdf;dsifas;difasd;ifad;sifa;idj;fadsiafs;nvasdn;lkan;dkjva;svnisj
                    </div>
        
                    <div>
                        new super slay card woah
                    </div>
                </div>
                </div>
    
                <div class='collapse_container'>
                    <button type='button' class='collapsible'> jisoo </button>
            
                    <div class='content'>
                        <div>
                            Contact Info
                        </div>
                        <div>
                            Date Uploaded
                        </div>
                        <div>
                            Photocard Image
                        </div>
                        <div>
                            Additional Details
                        </div>
            
                        <div>
                            @rob_onion
                        </div>
                        
                        <div>
                            4/5/2022
                        </div>
                        <div>
                            image linkasd;fja;sdjfiasd;jfiasd;fiai;dsfjiasjdf;dsifas;difasd;ifad;sifa;idj;fadsiafs;nvasdn;lkan;dkjva;svnisj
                        </div>
            
                        <div>
                            new super slay card woah
                        </div>
                    </div>
                    </div>
    
            <div class='collapse_container'>
            <button type='button' class='collapsible'> jennie </button>
    
            <div class='content'>
                <div>
                    Contact Info
                </div>
                <div>
                    Date Uploaded
                </div>
                <div>
                    Photocard Image
                </div>
                <div>
                    Additional Details
                </div>
    
                <div>
                    @rob_onion
                </div>
                
                <div>
                    4/5/2022
                </div>
                <div>
                    image linkasd;fja;sdjfiasd;jfiasd;fiai;dsfjiasjdf;dsifas;difasd;ifad;sifa;idj;fadsiafs;nvasdn;lkan;dkjva;svnisj
                </div>
    
                <div>
                    new super slay card woah
                </div>
            </div>
            </div>
    
    
    
        </main>
    
        <script src='../js/collapsible.js'></script>
        </body>
            ";
            $html_card = fopen($new_html, "w");
            fwrite($html_card, $input_html);

        }
    }
    else { //group already exists, check if member exists. if doesn't, add!
        $groups_file = file_get_contents($_SERVER['DOCUMENT_ROOT']. '/data/' . 'groups.json');
        $groups_arr = json_decode($groups_file, true); //json as associative array
        if (!in_array($artist, $groups_arr[$group]["members"])) { //if member not in, add
            array_push($groups_arr[$group]["members"], $artist);
            file_put_contents($_SERVER['DOCUMENT_ROOT']. '/data/' . 'groups.json', json_encode($groups_arr));
        }
    }

    // if no uploaded image, use image_link (no need to modify)
    if (empty($_FILES['image_file']['tmp_name'])) { //if javascript form has input named image_file, it is always set! must use empty
        $image = $image_link;
        echo 'EMPTY FILE';
    }

    else {
        echo 'uploading file';
        // store file onto server
        $fileName = basename($_FILES["image_file"]["name"]); //gets name of file after the last /
        $fileName = $_SERVER['DOCUMENT_ROOT']. '/uploads/' . $fileName; //use base root
        echo $fileName;

        if (move_uploaded_file($image, $fileName)) {
            echo 'IMAGE UPLOAD SUCCESS!';
        }
        
        else {
            echo 'Error with image upload';
        }

        $iamge = $fileName;
    }

    // store either image or imagelink (image takes priority - path to image on serverside)
    $arg = [$group, $artist, $contact, $image, $details];

    function change_arr($str) {
        if (empty($str)) {
            return '\'NULL\'';
        }
        
        else {
            return '\'' . $str . '\'';
        }

    }

    $arg = array_map('change_arr', $arg);
    echo var_dump($arg);
    echo join(', ', $arg);

    $sql_command = "INSERT INTO cards 
    VALUES (DEFAULT, CURDATE(), " . join(', ', $arg) . ')';//syntax for insertion.

    //send to server!
    
    // echo $sql_command;
    // if (mysqli_query($conn, $sql_command)) {
    //     echo "SQL COMMAND OK";
    // }
    // else {
    //     echo "SQL ERROR" . mysqli_error($conn);
    // }




    
    

?>