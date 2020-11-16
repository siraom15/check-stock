<?php 
    session_start();
    
    if(isset($_POST['date']) && $_SESSION['status']==1){
        require('server/config.php');

        $date = $_POST['date'];
        $sql = "SELECT SUM(profit) AS allprofit FROM history WHERE date = '${date}' ";
        $result = $conn->query($sql);
        $fetch = $result->fetch_assoc();
        if($fetch['allprofit']==NULL){
            echo 0;
        }else{
            echo $fetch['allprofit'];
        }
    }
?>