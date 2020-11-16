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
    <a href="user.php" class="text-dark m-2"> <i class="fas fa-backward"></i> ย้อนกลับ</a>
        
        <div class="row">
            <div class="col-12">
                    <div class="card border-dark mb-3" >

                    <div class="card-header">แก้ไขสินค้า</div>

                    <div class="card-body">

                        <div class="row">
                            <?php 
                                include_once('listForEditProduct.php');
                            ?>
                        </div>
                    </div>
                    </div>

            </div>    
        </div>
    </div>
</body>

</html>