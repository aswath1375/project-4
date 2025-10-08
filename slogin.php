<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

<script src="js/jquery.js" ></script>
<script src="js/jquery.min.js"></script>
<?php
session_start();
include('config.php');
ob_start();
 ?>
<style>
.banner
{
	margin:20px;
}

		.menu
		{
			margin-top:100px;
		}
		.menu a
		{
			font-size:22px;
			color:#367d44;
			margin-right:20px;
			text-decoration:none;
		}
		.menu .active
		{
			background-color:#367d44;
			padding:10px;
			border-radius:3px;
			text-decoration:none;
			color:#fff;
		}

.panel-login {
	border-color: #ccc;
	-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
	color: #00415d;
	background-color: #fff;
	border-color: #fff;
	text-align:center;
}
.panel-login>.panel-heading a{
	text-decoration: none;
	color: #666;
	font-weight: bold;
	font-size: 15px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
	color: #029f5b;
	font-size: 18px;
}
.panel-login>.panel-heading hr{
	margin-top: 10px;
	margin-bottom: 0px;
	clear: both;
	border: 0;
	height: 1px;
	background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
	background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
	height: 45px;
	border: 1px solid #ddd;
	font-size: 16px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
	outline:none;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	border-color: #ccc;
}
.btn-login {
	background-color: #1CB94E;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #59B2E6;
}
.btn-login:hover,
.btn-login:focus {
	color: #fff;
	background-color: #53A3CD;
	border-color: #53A3CD;
}
.forgot-password {
	text-decoration: underline;
	color: #888;
}
.forgot-password:hover,
.forgot-password:focus {
	text-decoration: underline;
	color: #666;
}

.btn-register {
	background-color: #1CB94E;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #1CB94A;
}
.btn-register:hover,
.btn-register:focus {
	color: #fff;
	background-color: #1CA347;
	border-color: #1CA347;
}

</style>
<script>

$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});

</script>
</head>

<body style="background-color: #31525B">   <br><br>

<div class="container">
<div class="col-md-3">
<img src="images/logo.jpg" class="img-responsive" style="border-radius : 20px" />
</div>
<div class="col-md-6"><br>
			<h1 style="font-size: 50px ; font-family: Times New Roman ;
			 background-color: white ; text-align: center ; border-radius: 30px ; color: green"> 
			<b style="color: red"></b>FLEET AUCTION MANAGEMENT</h1>
		</div>
<div class="col-md-3">
<img src="images/logo.jpg" class="img-responsive" style="border-radius : 20px" />
</div>
</div>


		<div class="menu" style="background-color: white ; font-family: Times New Roman">
			<div class="container" style="padding-left: 290px">
				<ul class="list-inline">
					<li><a href="index.php">HOME</a></li>
					<li><a href="alogin.php">ADMIN</a></li>
					<li><a href="slogin.php" class="active">SELLER</a></li>
					<li><a href="buyerlogin.php">BUYER</a></li>
					<li><a href="contact.php">CONTACT US</a></li>
									</ul>
			</div>
		</div>
															<br><br><br>
<!-- <h1 style="font-size: 45px ; font-family: Cooper Black ; background-color: white"> WELCOME TO E-BIDDING</h1> -->


	<div class="login">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-login">
						<div class="panel-heading">
							<div class="row" style="font-family: Times New Roman">
								<div class="col-xs-6">
									<a href="#" class="active" id="login-form-link" style="color: green">SELLER LOGIN</a>
								</div>
								<div class="col-xs-6">
									<a href="#" id="register-form-link" style="color: red"> SELLER REGISTER</a>
								</div>
							</div>
							<hr>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<form id="login-form"  method="post" role="form" style="display: block;">
										<div class="form-group">
											<input type="text" style="font-family: Times New Roman ; font-size: 20px" name="email" style="color: green" tabindex="1" class="form-control" placeholder="email" value="">
										</div>
										<div class="form-group">
											<input type="password" style="font-family: Times New Roman ; font-size: 20px" name="password" style="color: red" id="password" tabindex="2" class="form-control" placeholder="Password">
										</div>
										
										<div class="form-group">
											<div class="row">
												<div class="col-sm-6 col-sm-offset-3">
													<input type="submit" name="login" id="login" tabindex="4" style="font-family: Forte" class="form-control btn btn-login" value="Log In">
												</div>
											</div>
										</div>
									</form>
									
									<form id="register-form" method="post" role="form" style="display: none;">
								   
										<div class="form-group">
											<input type="text" name="name"  style="font-family: Times New Roman ; font-size: 20px" tabindex="1" class="form-control" placeholder="Username" required value="">
										</div>
										<div class="form-group">
											<input type="email" style="font-family: Times New Roman ; font-size: 20px" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" name="email" id="email" tabindex="1" required class="form-control" placeholder="Email Address" value="">
										</div>
										
									    <div class="form-group">
											<textarea name="address" style="font-family: Times New Roman ; font-size: 20px" tabindex="1" class="form-control" placeholder="Address" required value=""></textarea>
										</div>
										
										<div class="form-group">
											<input type="text" style="font-family: Times New Roman ; font-size: 20px" pattern="[6789][0-9]{9}"  name="contact" id="contact" tabindex="2" required class="form-control" placeholder="Contact number">
										</div>
										
										<div class="form-group">
											<input type="password" style="font-family: Times New Roman ; font-size: 20px" name="password" id="password" tabindex="2" class="form-control" required="" placeholder="Password">
										</div>
										
										<div class="form-group">
											<div class="row">
												<div class="col-sm-6 col-sm-offset-3">
													<input type="submit" name="register" style="font-family: Times New Roman" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
												</div>
											</div>
										</div>
									</form>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<br><br><br><br>
	<footer style="background-color: #068c71 ; border-radius: 30px"><br><br>
<h5 style="color: white ; text-align: center ; text-size: 20px">&copy copyright by Vehicle Auction </h5><br><br>
</footer>
	
<?php 

if(isset($_POST['register']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	$password=$_POST['password'];
	$insert=mysql_query("insert into seller(name,email,address,contact,password)values('$name','$email','$address','$contact','$password')") or die(mysql_error());
	if($insert)
	{
		echo '<script>alert("You are Registered successfully.");</script>';
	}
	else
	{
		echo '<script>alert("Sorry! Try again later.");</script>';
	}
	
}

?>
<?php 
if(isset($_POST['login']))
{
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql="select * from seller where email='".$_POST['email']."' and password='".$_POST['password']."'";
	$res=mysql_query($sql);
	$count=mysql_num_rows($res);
	
	if($count)
	{
		$_SESSION['sellerid']=$_POST['email'];
		header("location:add.php");
		#header("location:index.php");
	}
	else
	{
		?>
        <script>alert("Invalid username or password");</script>
        <?php
	}
}
ob_end_flush();
?>

</body>
</html>