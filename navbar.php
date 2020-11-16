<nav class="navbar navbar-expand-lg navbar-light shadow-sm mb-5 bg-white" id="navbar">
    <a class="navbar-brand" href="/user.php">
        <i class="fas fa-smoking"></i> ระบบจัดการสินค้า</a>
        <button class="navbar-toggler" type="button"
        data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation"><i
            class="fas fa-chevron-circle-down text-dark text-shadow"></i>
        </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#"> 
                    <i class="fas fa-user"> </i> <?php echo $_SESSION['username']; ?>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="logout.php"> 
                    <i class="fas fa-sign-out-alt"></i>
                    ออกจากระบบ
                </a>
            </li>
        </ul>
    </div>
</nav>