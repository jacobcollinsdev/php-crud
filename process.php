<?php

    //CREATE CONNECTION TO DATABASE OR THROW ERROR IF CONNECTION FAILED
    $db = new mysqli('localhost', 'root', 'cuvxus', 'crud') or die("Connection failed: ".$db->connect_error);

    //CHECK IF SAVE BUTTON HAS BEEN PRESSED
    if(isset($_POST['save'])){
        $name = $_POST['name'];
        $location = $_POST['location'];

        $db->query("INSERT INTO data (name, location) VALUES('$name', '$location')") 
        or die($db->error);
    }

?>