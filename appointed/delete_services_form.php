<?php
include('../database_conn.php');

if(isset($_GET['id'])){
    $user_id = $_GET['id'];

    $sql = "DELETE FROM `_appointments` WHERE `id`='$user_id'";

    $result = $conn->query($sql);
     
    if($result == TRUE){
        
        echo"Record deleted";
        header('location:appointment.php');

    }else{
        // echo"Error".$sql. "<br>". $conn->error;
    } 
}
?>