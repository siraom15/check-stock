<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

<table class="table" id="myTable">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">วันที่</th>
      <th scope="col">ชื่อสินค้า</th>
      <th scope="col">จำนวนสินค้า</th>
      <th scope="col">ราคา</th>
      <th scope="col">ผู้ทำการขาย</th>
      <th scope="col">บันทึกช่วยจำ</th>

    </tr>
  </thead>
  <tbody>
    <?php 
        $data = getHistory();
        if($data->num_rows>0){
            $i = 1;
            while($row = $data->fetch_assoc()){

                ?>
                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['unit']; ?> ชิ้น</td>
                    <td><?php echo $row['profit']; ?> บาท</td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['note']; ?></td>

                </tr>
                
                <?php
                $i++;
            }
        }
    ?>
    
  </tbody>
</table>

<script>
    $(document).ready( function () {
            $('#myTable').DataTable({
                responsive: true,
                "language": {
                    "lengthMenu": "แสดง _MENU_ ต่อหน้า",
                    "zeroRecords": "ไม่พบข้อมูล",
                    "info": "กำลังแสดงหน้า _PAGE_ จาก _PAGES_",
                    "infoEmpty": "ไม่มีข้อมูล",
                    "infoFiltered": "(filtered from _MAX_ total records)"
                }
            });
        } );
</script>

