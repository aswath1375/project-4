<html>
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
					<li><a href="add.php">Add new Vehicle</a></li>
					<li ><a href="remove.php" class="active">Remove Vehicle</a></li>
					<li><a href="app.php">View bidding application</a></li>
					<li><a href="logout.php"><del>Log out</del></a></li>
				</ul>
			</div>
		</div>
															<br><br><br>

<div class="container">
<div class="width">

<center><h3 style="color: #092923; font-family: Times New Roman">Remove Vehicle</h3></center>
						<form  method="post" enctype="multipart/form-data">
                                   <div class="form-group">
                                     <label>Vehicle name</label>
										<input type="text" name="prodname"   class="form-control" placeholder="Vehicle name" >
									</div>
                                    
								                                                                                                                                   
                                  	<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="remove"   class="form-control btn btn-register" value="Remove">
											</div>
										</div>
									</div>
							
    </form>
   </div>	
        
</div>





<?php
if(isset($_POST['remove']))
{

	$prodname=$_POST['prodname'];
	$sql="Delete from product where prodname='$prodname'";
	$res=mysql_query($sql);
	if($res)
	{
		echo '<script>alert("Successfully removed");</script>';
		
	}
	
}
ob_end_flush();
?>

  </html>
</body>