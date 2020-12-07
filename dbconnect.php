<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'google_chat');
    if($conn != true) {
        echo "connection Failed";
    }

?>