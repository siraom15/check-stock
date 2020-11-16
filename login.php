<?php 
    session_start();
    if(isset($_SESSION['status'])){
        if($_SESSION['status']==1){
            header('location:user.php');
        }
    }

    if(isset($_POST['username'])){

        require('server/config.php');

        $username = $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string($_POST['password']);
      

        $sql = "SELECT * FROM user WHERE username = '${username}' AND password = '${password}'";
        $result = $conn->query($sql);
        if($result->num_rows==1){
            while($row = $result->fetch_assoc()){

                $_SESSION['status'] = 1;
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                header('location:user.php');
            }
        }else{
            // include('sweetModalLink.php');
            
            echo "<script>
                    $.sweetModal('Titled Alert', 'This is an alert.');
                </script>";
        }


    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login หน้าสมาชิก</title>
    <?php 
        include("link.php");
    ?>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center mt-5">
            
            <div id="item">
                <div class="card rounded-0 shadow-sm" style="width: 18rem;">
                    <div class="card-body kanit">
                        <div class="card-title mitr text-center h4">เข้าสู่ระบบ</div>
                        <form class="kanit p-2" action="" method="POST">
                            <div class="form-group">
                                <label for="email">Username</label>
                                <input class="form-control form-control-sm" id="username" type="text" name="username"
                                    placeholder="ใส่ Username ของคุณ" required="" autofocus=""></div>
                            <div class="form-group">
                                <label for="password">รหัสผ่าน</label>
                                <input class="form-control form-control-sm" id="password" type="password"
                                    name="password" placeholder="ใส่รหัสผ่านของคุณ" required=""></div>
                            <button class="btn text-white bg-dark btn-block btn-sm text-center" type="submit"
                                value="submit">เข้าสู่ระบบ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>