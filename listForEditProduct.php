<?php 

    $result = getAllProduct();

    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){

        ?>
          <div class="col-sm-6 col-md-4 col-lg-3 p-2">
                <div class="card shadow-sm" >
                    <div class="card-header">
                        สินค้า
                    </div>
                    <img src="upload/img/<?php echo $row['product_image']; ?>" class="card-img-top" alt="..." width="30px" height="100px">
                    <div class="card-body">
                        <h5 class="card-title">ชื่อสินค้า : <?php echo $row['product_name']; ?></h5>
                        <p class="card-text">คงเหลือ : <?php echo $row['product_unit']; ?> ชิ้น</p>
                        <p class="card-text">กำไรต่อชิ้น : <?php echo $row['product_profit']; ?> บาท</p>
                        <a href="edit.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-outline-dark btn-block>" >
                            แก้ไข
                        </a>
                        <button onclick="confirmDel(<?php echo $row['product_id']; ?>)"  class="btn btn-outline-danger btn-block>" >
                            ลบ
                        </button>
                    </div>
                </div>
            </div>  
            
        <?php
        }
    }
    else{
        echo "ไม่มีสินค้าในระบบ";
    }

?>
<script>
    function confirmDel(product_id){
       
        $.sweetModal.confirm('ยืนยันการลบ ?', function() {
            $.ajax({
                type: "POST",
                url: 'deleteProduct.php',
                data: {product_id: product_id},
                success: function(data){
                    console.log(data);
                    $.sweetModal(data);
                    location.reload();
                    return false;
                },
                error: function(xhr, status, error){
                    console.error(xhr);
                    $.sweetModal(xhr);

                }
                });
        });
    }
</script>
