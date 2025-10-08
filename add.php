<html >
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

$id=$_SESSION['sellerid'];
$_SESSION['sellerid']=$id;
?>

<style>
.banner
{
	margin:20px;
}
    	.row{
		    margin-top:40px;
		    padding: 0 10px;
		}
		.clickable{
		    cursor: pointer;   
		}
 .panel-primary .panel-heading  {
		font-size: 15px;
		background-color:#367d44;
		border-color:#367d44;
		}
		.panel-primary   {
				border-color:#367d44;
		}
		.panel-heading div {
		font-size: 15px;
		
		}
		.panel-heading div span{
			margin-left:5px;
		}
		.panel-body{
			display: none;
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
		.width
		{
			width:400px;
			margin-top:50px;
		}
		
</style>

</head>
<body style="background-color: #31525B ; color: #31525B">   <br><br>

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
					<li><a href="add.php"  class="active">Add new Vehicle</a></li>
					<li ><a href="remove.php">Remove Vehicle</a></li>
					<li><a href="app.php">View bidding application</a></li>
					<li><a href="logout.php"><del>Log out</del></a></li>
				</ul>
			</div>
		</div>
															<br><br><br>
												<center><h3 style="color: #07241e ; font-family: Times New Roman">Add new Vehicle</h3></center>
		<div class="container">
			<div class="width">
				<div class="col-sm-12 col-sm-offset-12">
					<form  method="post" enctype="multipart/form-data" style="font-family: Times New Roman">
                        <div class="form-group">
							<label>Vehicle id</label>
							<input type="text" name="prodid" required class="form-control" placeholder="Vehicle ID" >
						</div>
                        <div class="form-group">
                            <label>Vehicle name</label>
							<input type="text" name="prodname" required class="form-control" placeholder="Vehicle name" >
						</div>
                        <div class="form-group">
                            <label>Seller name</label>
							<input type="text" name="fname" required class="form-control" placeholder="Seller name" >
						</div>
                        <div class="form-group">
                            <label>Seller Contact</label>
							<input type="number" name="fno" required class="form-control" placeholder="Seller Contact" >
						</div>
                        <div class="form-group">
                            <label>Seller Location</label>
							<input type="text" name="flocation" required class="form-control" placeholder="Seller Location" >
						</div>
                        <div class="form-group">
                            <label>Near by KM</label>
							<input type="number" name="km" required class="form-control" placeholder="Near by KM" >
						</div>
                        <div class="form-group">
                            <label>Vehicle description</label>
                            <textarea name="description" required class="form-control" placeholder="Description"></textarea>
						</div>
                        <div class="form-group">
                            <label>Vehicle Type</label><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							  <input type="radio" name="type" id="type" value="Two Wheeler"/>Two Wheeler&nbsp&nbsp&nbsp
							  <input type="radio" name="type" id="type" value="Four Wheeler"/>Four Wheeler
							  <input type="radio" name="type" id="type" value="six Wheeler"/>six Wheeler
						</div>
						<div class="form-group">
                            <label>Image</label>
							<input type="file" name="photo" required class="form-control" placeholder="Image" >	
						</div>
						<div class="form-group">
                            <label>Initial price</label>
							<input type="text" name="price" required class="form-control" placeholder="Price" >	
						</div>
                        <div class="form-group">
							<div class="row">
								<div class="col-sm-6 col-sm-offset-3">
									<input type="submit" name="add" class="form-control btn btn-register" style="background-color: red ; color: white ; border-color: green ; border-radius: 20px" value="ADD">
								</div>
							</div>
						</div>
					</form>
				</div>	
			</div>	 
		</div>



<?php 
if(isset($_POST['add']))
{
		$prodid=$_POST['prodid'];
	$prodname=$_POST['prodname'];
	$fname=$_POST['fname'];
	$fno=$_POST['fno'];
	$flocation=$_POST['flocation'];
	$km=$_POST['km'];
	$desc=$_POST['description'];
	$type=$_POST['type'];
	$price=$_POST['price'];
	
	$image=array("gif","jpeg","jpg","png");
	$temp=explode(".",$_FILES['photo']['name']);
	$end=end($temp);
	$name=$_FILES['photo']['name'];
	move_uploaded_file($_FILES['photo']['temp_name'],"/images/".$_FILES['photo']['name']);
	
	$insert=mysql_query("insert into product(prodid,prodname,fname,fno,flocation,km,description,type,photo,price,selleremail)values('$prodid','$prodname','$fname','$fno','$flocation','$km','$desc','$type','$name','$price','$id')");
	if($insert)
	{
		echo $name;
		echo '<script>alert("Vehicle added successfully");</script>';
	}
	else
	{
		echo '<script>alert("Sorry!.Error");</script>';
	}
	
}
?>


</body>
</html>