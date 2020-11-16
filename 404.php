<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 ERROR</title>
    <?php 
        include('link.php');
        header('Refresh:3;url=index.php');
    ?>
</head>
<body class="bg-black text-white">
    <div class="container text-center mt-5">
        <div class="display-3">404</div>
        <h1>ไม่พบหน้านี้</h1>
        <p>ระบบกำลังพาคุณกลับใน 3 วินาที...</p>
    </div>
</body>
</html>