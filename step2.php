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
        require('server/function.php');
        require('link.php');
    ?>
</head>

<body class="bg-light">
    <!-- nav -->
    <?php 
        include_once('navbar.php');
    ?>
    <div class="container card p-2">
    <a href="checkout.php?product_id=<?php echo $_POST['product_id'];?>" class="text-dark m-2"> <i class="fas fa-backward"></i> ย้อนกลับ</a>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="text-center">ยืนยันการขาย</h4>
                        <hr>
                        <?php 
                            $data = getProductInfo($_POST['product_id']);
                            $fetch = $data->fetch_assoc();
                            
                        ?>
                        <h5>ชื่อสินค้า : <?php echo $fetch['product_name']; ?> </h5>
                        <img src="/upload/img/<?php echo $fetch['product_image']; ?>" alt="" class="d-flex mx-auto rounded img-fluid w-50">
                        <hr>
                        <h5>ยอดก่อนหน้า : <?php echo $fetch['product_unit']; ?> ชิ้น</h5>
                        <h5>ขาย : <?php echo $_POST['unit']; ?>  ชิ้น</h5>
                        <h5>คงเหลือ : <?php echo $fetch['product_unit']-$_POST['unit']; ?> ชิ้น </h5>
                        <hr>
                        <h5>กำไร : <?php echo $_POST['profit']; ?> บาท </h5>
                        <hr>
                        <form action="confirm.php" method="post" class="">
                            <!-- <input type="number" name="user_id"> -->
                            <input type="number" name="profit" value="<?php echo $_POST['profit']; ?>" hidden>
                            <input type="number" name="unit" value="<?php echo $_POST['unit']; ?>" hidden>
                            <input type="number" name="product_id" value="<?php echo $_POST['product_id']; ?>" hidden>
                            
                            <textarea name="note" id="" cols="30" rows="2" placeholder="บันทึกช่วยจำ"></textarea>
                            <br>
                            <button type="submit" class="btn btn-dark" <?php if($fetch['product_unit']<1){ echo "disabled"; }  ?> >ยืนยันการขาย</button>
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