<?php 
    session_start();
    if(!isset($_SESSION['status'])){
        header('location:login.php');
    }
    if(isset($_POST['profit'])){
        require('server/config.php');
        $profit = $_POST['profit'];
        $unit = $_POST['unit'];
        $product_id = $_POST['product_id'];
        $user_id = $_SESSION['user_id'];
        $date = date("Y-m-d");
        $note = $_POST['note'];
        // update stock

        $sql_update = "UPDATE product SET product_unit = product_unit - ${unit} WHERE product_id = '${product_id}' ";
        if($conn->query($sql_update)===TRUE){
            // insert history
            $sql_insert = "INSERT INTO `history` (`date`, `product_id`, `unit`, `profit`, `user_id`, `note`) 
            VALUES ( '${date}', '${product_id}', '${unit}', '${profit}', '${user_id}', '${note}');";

            if($conn->query($sql_insert)===TRUE){
                echo "<script>alert('ทำรายการสำเร็จ');</script>";

                header("Refresh:0;url=user.php");

            }else{
                echo $conn->error;
            }

        }else{
            echo $conn->error;
        }
    }
?>