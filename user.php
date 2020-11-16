<?php 
    session_start();
    if(!isset($_SESSION['status'])){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการสินค้า</title>
    <?php 
        include('server/function.php');
        include('link.php');
    ?>
</head>

<body class="bg-light">
    <!-- nav -->
    <?php 
        include_once('navbar.php');
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <?php include('profit.php') ?>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <?php include('productMenu.php') ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                    <div class="card border-dark mb-3" >

                    <div class="card-header">สินค้าทั้งหมด</div>

                    <div class="card-body">

                        <div class="row">
                            <?php 
                                include_once('allProduct.php');
                            ?>
                        </div>
                    </div>
                    </div>

            </div>    
        </div>
    </div>
</body>

</html>