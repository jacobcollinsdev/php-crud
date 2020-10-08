<?php

    //CREATE CONNECTION TO DATABASE OR THROW ERROR IF CONNECTION FAILED
    $db = new mysqli('localhost', 'root', 'cuvxus', 'crud') or die("Connection failed: ".$db->connect_error);

    //CHECK IF SAVE BUTTON HAS BEEN CLICKED
    if(isset($_POST['save'])){
        $name = $_POST['name'];
        $location = $_POST['location'];

        $db->query("INSERT INTO data (name, location) VALUES('$name', '$location')") 
        or die($db->error);
    }

    //CHECK IF DELETE BUTTON HAS BEEN CLICKED
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $db->query("DELETE FROM data WHERE id=$id") or die($db->error());
    }


?>