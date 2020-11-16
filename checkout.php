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
    <div class="container card p-2">
        <a href="user.php" class="text-dark m-2"> <i class="fas fa-backward"></i> กลับหน้าแรก</a>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="text-center">ปรับยอดสินค้า</h5>
                        <hr>
                        <?php 
                            $data = getProductInfo($_GET['product_id']);
                            $fetch = $data->fetch_assoc();
                            
                        ?>
                        <h5>ชื่อสินค้า : <?php echo $fetch['product_name']; ?> </h5>
                        <img src="/upload/img/<?php echo $fetch['product_image']; ?>" alt="" class="d-flex mx-auto rounded img-fluid w-25">
                        <p>รายได้ต่อชิ้น : <?php echo $fetch['product_profit']; ?> บาท</p>
                        <p>คงเหลือ : <?php echo $fetch['product_unit']; ?> ชิ้น</p>
                        
                        <form action="step2.php" method="post" class="form-inline d-flex justify-content-center">
                            <div class="form-group m-1">
                                <label for="">จำนวนที่หัก :</label>
                                <input type="number" name="unit" id="unit" min="0" max="<?php echo $fetch['product_unit'];?>" class="form-control" value="0">
                                <input type="number" name="pricePerItem" id="pricePerItem" hidden value="<?php echo $fetch['product_profit']; ?>">
                            </div>
                            <div class="form-group m-1">
                                <label for="">กำไร : </label>
                                <input type="number" name="profit" id="profit" min="0" max="" class="form-control" value="0" readonly>
                            </div>
                            <input type="hidden" name="product_id" value="<?php echo $fetch['product_id']; ?>">
                            <button type="submit" class="btn btn-dark" <?php if($fetch['product_unit']<1){ echo "disabled"; }  ?> >ยืนยันการหัก</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $("#unit").change(()=>{
        let price = $("#unit").val() * $("#pricePerItem").val()
        $("#profit").val(price)
    });
    
</script>

</html>