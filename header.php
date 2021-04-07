<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xây Dụng Website Bán Hàng</title>
    <link href="booptrap/booptrapcss/bootstrap.min.css" media="screen" rel="stylesheet">
    <link rel="stylesheet" href="booptrap/booptrapcss/bootstrap.min.css.map" media="screen">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css">
   
    <script src="https://kit.fontawesome.com/7d65f38fc8.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
        <nav class="nav navbar-expand-xl">
         <a class="logo_img" href="index.php"><img src="img/uniqlo-logo.png"width ="100px"alt=""><b><span></span></b></a>
            <div class="btn-group" role="group" aria-label="Basic example">
                <ul>
                  <li><a href="index.php"><button type="button" class="btn btn-danger"><i class="fas fa-home"></i> Home</button></a></li>
                  <li><a href="list_product.php"><button type="button" class="btn btn-danger"><i class="fas fa-list"></i> Danh Sách Sản Phẩm</button></a></li>
                  <li><a href="add_product.php"><button type="button" class="btn btn-danger"><i class="fas fa-plus"></i> Thêm Sản Phẩm</button></a></li>
                   <li><a href="shopping_cart.php"><button type="button" class="btn btn-danger"><i class="fas fa-cart-plus"></i> Giỏ Hàng</button></a></li>
                    <li><a href="register.php"><button type="button" class="btn btn-danger"><i class="fas fa-user-circle"></i> Đăng Nhập</button></a></li>
                    <li><a href="Login.php"><button type="button" class="btn btn-danger"><i class="fas fa-user-circle"></i> Đăng Ký</button></a></li>
                </ul>
            </div>    
        </nav>
        <div class="title">
                <h1><i class="fas fa-laptop-house"></i> Website Bán Hàng</h1>
                <?php
        session_start();
        if(isset($_SESSION["user"])!=""){
            echo "<h2>Hello: ".$_SESSION["user"]."<a href='logout.php'>Logout</a></h2>";
        }else{
            echo "<h2>You not sign in <a href='login.php'>Login</a> - <a href='register.php'>Register</a></h2>";
        }
        ?>
        </div>
    </div> 
</body>
</html>