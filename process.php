<?php
    session_start();
    //CREATE CONNECTION TO DATABASE OR THROW ERROR IF CONNECTION FAILED
    $db = new mysqli('localhost', 'root', 'cuvxus', 'crud') or die("Connection failed: ".$db->connect_error);

    //CHECK IF SAVE BUTTON HAS BEEN CLICKED
    if(isset($_POST['save'])){
        $name = $_POST['name'];
        $location = $_POST['location'];

        $db->query("INSERT INTO data (name, location) VALUES('$name', '$location')") 
        or die($db->error);

        // SET SESSION VARIABLES
        $_SESSION['message'] = 'Record has been saved!';
        $_SESSION['msg_type'] = 'success';

        //REDIRECT TO index.php
        header("location: index.php");
    }

    //CHECK IF DELETE BUTTON HAS BEEN CLICKED
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];

        $db->query("DELETE FROM data WHERE id=$id") or die($db->error());

        $_SESSION['message'] = 'Record has been deleted!';
        $_SESSION['msg_type'] = 'danger';

        header("location: index.php");
    }


?>