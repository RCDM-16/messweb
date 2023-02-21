<?php 
    session_start();
    if(isset($_SESSION['id_diff'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['id_diff'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (id_msg_in, id_msg_out, message)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        }
    }else{
        header("location: ../login.php");
    }


    
?>