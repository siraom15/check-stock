<?php 
    
    function getAllProduct(){
        require('config.php');

        $sql = "SELECT * FROM product";
        $result = $conn->query($sql);
        
        return $result;
    }
    
    function getNumberOfProduct(){
        require('config.php');

        $sql = "SELECT * FROM product";
        $result = $conn->query($sql);
        
        return $result->num_rows;
    }

    function getProductInfo($product_id){
        require('config.php');

        $sql = "SELECT * FROM product WHERE product_id = '${product_id}' ";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            return $result;
        }else{
            return null;
        }
    }
    function getAllProfit(){

        require('config.php');

        $sql = "SELECT SUM(profit) AS allprofit FROM history ";
        $result = $conn->query($sql);
        $fetch = $result->fetch_assoc();
        if($fetch['allprofit']==NULL){
            return 0;
        }else{
            return $fetch['allprofit'];

        }
    }

    function getTodayProfit(){

        require('config.php');

        $date = date("Y-m-d");
        $sql = "SELECT SUM(profit) AS allprofit FROM history WHERE date = '${date}' ";
        $result = $conn->query($sql);
        $fetch = $result->fetch_assoc();
        if($fetch['allprofit']==NULL){
            return 0;
        }else{
            return $fetch['allprofit'];

        }
    }
    
    function getHistory(){

        require('config.php');

        
        $sql = "SELECT * FROM history h JOIN user u ON h.user_id = u.user_id JOIN product p ON h.product_id = p.product_id ";
        $result = $conn->query($sql);

        return $result;
    }
?>