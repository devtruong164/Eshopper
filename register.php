
<?php include_once("header.php");?>
<?php
if(isset($_SESSION["user"])!=""){
    header("Location: index.php");
}

require_once("entities/user.class.php");
if(isset($_POST["btn-signup"])){
    $u_name=$_POST["txtname"];
    $u_email=$_POST["txtemail"];
    $u_pass=$_POST["txtpass"];
    $account = new User($u_name,$u_email,$u_pass);
    $result = $account->save();
    if(!$result){
        ?>
        <script>alert('Something wrong, check data');</script>
        <?php
    }else{
        $_SESSION["user"]=$u_name;
        header("Location: index.php");
    }
}
?>

<form method="post" style="width:50%">
    <div class="form-group row">
        <label for="txtname" class="col-sm-2 form-control-label">UserName</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="txtname" placeholder="User name">
        </div>
    </div>
    <div class="form-group row">
        <label for="txtemail" class="col-sm-2 form-control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="txtemail" placeholder="Email">
        </div>
    </div>
    <div class="form-group row">
        <label for="txtpass" class="col-sm-2 form-control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="txtpass" placeholder="Password">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="btn-signup" value="Sign Up">
        </div>
    </div>
</form> -->
<form method="post" class="login100-form validate-form">
					<span class="login100-form-logo">
						<img src="img/uniqlo-logo.png"width="100px" alt="">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="txtname" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="txtpass" placeholder="Gmail">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="txtemail" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
				

					<div class="container-login100-form-btn">
						<input type = 'submit' name="btn-signup" value="Sign Up" class="login100-form-btn">
						
                        
					</div>

				
				</form>
<?php include_once("footer.php");?>
