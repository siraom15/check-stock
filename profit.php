
<div class="card border-dark mb-3">
    <div class="card-header">สรุปรายได้</div>
    <div class="card-body text-dark">
        <h5 class="card-title">รายได้วันนี้ : <?php echo getTodayProfit(); ?> บาท</h5>
        <p class="card-text">รายได้ทั้งหมด : <?php echo getAllProfit(); ?> บาท</p>
        <button onclick="showMenuByDate()" class="btn-block btn-outline-secondary btn">สรุปรายได้ในแต่ละวัน</button>
        <div class="card" id="menuByDate" style="display:none;">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">เลือกวันที่</label>
                        <input type="date" name="dateprofit" id="dateprofit" value="<?php echo date("Y-m-d"); ?>">
                    </div>
                    <span>รายได้ : <span id="profitVal"><?php echo getTodayProfit(); ?></span> บาท</span>

                </form>
            </div>
        </div>
       
        <a href="history.php" class="btn-block btn-outline-secondary btn">ประวัติการขาย</a>
    </div>
</div>
<script>
    function showMenuByDate(){
        document.getElementById("menuByDate").style.display = "block";
    }
    $("#dateprofit").change(()=>{
        let datex = $("#dateprofit").val();
        console.log(datex);
        $.ajax({
                type: "POST",
                url: 'getProfit.php',
                data: {date: datex},
                success: function(data){
                    console.log(data);
                    $("#profitVal").text(data);
                },
                error: function(xhr, status, error){
                    console.error(xhr);
                    $.sweetModal(xhr);

                }
                });
    });
</script>