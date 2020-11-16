<?php 
    session_start();
    if(!isset($_SESSION['status'])){
        header('location:login.php');
    }
    if(isset($_POST['product_name'])){
        require('server/config.php');

        $product_name = $conn->real_escape_string($_POST['product_name']);
        $product_unit = $conn->real_escape_string($_POST['product_unit']);
        $product_profit = $conn->real_escape_string($_POST['product_profit']);
        
        // img
        $name_file =  $_FILES['product_image']['name'];
        $tmp_name =  $_FILES['product_image']['tmp_name'];
        $locate_img ="upload/img/";
        move_uploaded_file($tmp_name,$locate_img.$name_file);
        
        $sql = "INSERT INTO `product` (`product_name`, `product_image`, `product_unit`, `product_profit`) 
        VALUES ('${product_name}', '${name_file}', '${product_unit}', '${product_profit}');";

        if($conn->query($sql)==TRUE){
            echo "<script>alert('เพิ่มสินค้าสำเร็จ');</script>";
        }
    }else{

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
    <div class="container card p-2">
        <a href="user.php" class="text-dark m-2"> <i class="fas fa-backward"></i> กลับหน้าแรก</a>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center">เพิ่มสินค้า</h5>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">ชื่อสินค้า</label>
                                <input type="text" name="product_name" id="" class="form-control"
                                    placeholder="ใส่ชื่อสินค้า" required>
                            </div>
                            <div class="form-group">
                                <label for="">รูปภาพสินค้า</label>
                                <input type="file" id="imgInp" class="form-control-file" name="product_image" required>
                                <img id="prev" src="#" alt="รูปภาพตัวอย่าง..."
                                    class="d-flex mx-auto rounded img-fluid img-thumbnail w-50" />
                            </div>

                            <div class="form-group">
                                <label for="">จำนวนสินค้า</label>
                                <input type="number" name="product_unit" id="" class="form-control"
                                    placeholder="ใส่จำนวนสินค้า" min="0" required>
                            </div>
                            <div class="form-group">
                                <label for="">กำไรต่อชิ้น</label>
                                <input type="number" name="product_profit" id="" class="form-control"
                                    placeholder="ใส่กำไรต่อชิ้น" min="0" required>
                            </div>
                            <button type="submit" class="btn btn-block bg-dark text-white">เพิ่มสินค้า</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#prev').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#imgInp").change(function () {
        readURL(this);
    });
</script>

</html>