<?php 
    session_start();
    
    if(isset($_POST['product_id']) && $_SESSION['status']==1){
        require('server/config.php');
        $product_id = $_POST['product_id'];
        $sql = "DELETE FROM product WHERE product_id = '${product_id}' "; 
        
        if($conn->query($sql)===TRUE){
            echo "ลบสำเร็จ";
        }else{
            echo $conn->error;
        }

    }
?>