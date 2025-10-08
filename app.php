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
$id=$_SESSION['sellerid'];
$_SESSION['sellerid']=$id;
include('config.php');
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
		
</style>
<script>

(function(){
    'use strict';
	var $ = jQuery;
	$.fn.extend({
		filterTable: function(){
			return this.each(function(){
				$(this).on('keyup', function(e){
					$('.filterTable_no_results').remove();
					var $this = $(this), 
                        search = $this.val().toLowerCase(), 
                        target = $this.attr('data-filters'), 
                        $target = $(target), 
                        $rows = $target.find('tbody tr');
                        
					if(search == '') {
						$rows.show(); 
					} else {
						$rows.each(function(){
							var $this = $(this);
							$this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
						})
						if($target.find('tbody tr:visible').size() === 0) {
							var col_count = $target.find('tr').first().find('td').size();
							var no_results = $('<tr class="filterTable_no_results"><td colspan="'+col_count+'">No results found</td></tr>')
							$target.find('tbody').append(no_results);
						}
					}
				});
			});
		}
	});
	$('[data-action="filter"]').filterTable();
})(jQuery);

$(function(){
    // attach table filter plugin to inputs
	$('[data-action="filter"]').filterTable();
	
	$('.container').on('click', '.panel-heading span.filter', function(e){
		var $this = $(this), 
			$panel = $this.parents('.panel');
		
		$panel.find('.panel-body').slideToggle();
		if($this.css('display') != 'none') {
			$panel.find('.panel-body input').focus();
		}
	});
	$('[data-toggle="tooltip"]').tooltip();
})
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
			<b style="color: red"></b>BID FOR APPLICATION</h1>
		</div>
<div class="col-md-3">
<img src="images/logo.jpg" class="img-responsive" style="border-radius : 20px" />
</div>

</div>

		<div class="menu" style="background-color: white ; font-family: Times New Roman">
			<div class="container" style="padding-left: 290px">
				<ul class="list-inline">
					<li><a href="add.php">Add new Vehicle</a></li>
					<li ><a href="remove.php">Remove Vehicle</a></li>
					<li><a href="app.php" class="active">View bidding application</a></li>
					<li><a href="logout.php"><del>Log out</del></a></li>
				</ul>
			</div>
		</div>
															<br><br><br>
		
	<div class="container">
    	<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title" style="font-family: Times New Roman"> Bidding Applicaiton</h3>
						<div class="pull-right" style="margin-top:-15px;">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
								<i class="glyphicon glyphicon-filter"></i>
							</span>
						</div>
					</div>
					<div class="panel-body">
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter" />
					</div>
					
                    <table class="table table-hover" id="dev-table" style="font-family: Times New Roman">
						<thead>
							<tr>
								<th>Vehicle ID</th>
								<th>Vehicle name</th>
								<th>Buyer email</th>
								<th>Original price</th>
								<th>Buying price</th>
                                <th>Accept</th>
							</tr>
						</thead>
						<tbody>
                         <?php 
					$select=mysql_query("select * from biddapp where sellerid='$id'") or die(mysql_error());
					while ($row=mysql_fetch_array($select))
					{	
					$appid=$row['id'];		
					$prodname=$row['prodname'];
					$bidderid=$row['bidderid'];
					$oprice=$row['oprice'];
					$bprice=$row['bprice'];
					$status=$row['status'];
								
					
					$get=mysql_query("select * from product where prodname='$prodname'");
					$row1=mysql_fetch_array($get);
					
					$prodid=$row1['id'];
					
						$a=mysql_query("select * from bidder where email='$bidderid'");
					$b=mysql_fetch_array($a);
					
					$c=$b['contact'];
					
					
					?>
							<tr>
                            <td><?php echo $prodid; ?></td>
								<td><?php echo $prodname; ?></td>
                                <td><?php echo $bidderid; ?></td>
                                <td><?php echo $oprice; ?></td>
                                <td><?php echo $bprice; ?></td>
                                <td>
                                
                                <?php if($status=="Accepted")
								{
									echo "Application accepted";
								}
								else
								{
								 ?>
                                <form method="post">
                                <input type="hidden" name="appid" value="<?php echo $appid; ?>">
                                <input type="submit" name="accept" value="Accept">
                                </form>
                                <?php 
								}
								?>
                                </td>
							</tr>
					<?php } ?>		
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
	</div>
	
	<br><br><br><br>
	<footer style="background-color: #068c71 ; border-radius: 30px"><br><br>
<h5 style="color: white ; text-align: center ; text-size: 20px">&copy copyright by Vehicle Auction </h5><br><br>
</footer>
	
<?php
if(isset($_POST['accept']))
{
	//$proid=$_POST['proid'];
	$ok="Accepted";
	$update=mysql_query("update biddapp set status='$ok'");
	if($update)
	{
		echo '<script>alert("Success");</script>';
				
		
		error_reporting(0);
set_time_limit(0);
$ser="http://api.mVaayoo.com/mvaayooapi/MessageCompose";
$ckfile = tempnam ("/tmp", "CURLCOOKIE");
$login=$ser."Login1.action"; 
$uid="9751135898";
$pwd="1234567";
$id=$_POST['id'];
$mob=$_POST['mob'];

$to=$c;
$msg="Bidding Application accepted. Login for further details.";

if(!$to)
{
	 $to=$uid;
 }
if(!$msg)
{
	 $msg=rword(5).rword(5).rword(5).rword(5).rword(5);
 }


flush();
if($uid && $pwd)
{
$ibal="0";
$sbal="0";
$lhtml="0";
$shtml="0";
$khtml="0";
$qhtml="0";
$fhtml="0";
$te="0";
echo '<div class="content">User: <span class="number"><b>'.$uid.'</b></span><br>';


$loginpost="gval=&username=".$uid."&password=".$pwd."&Login=Login";

$ch = curl_init();
$lhtml=post($login,$loginpost,$ch,$ckfile);
////curl_close($ch);

if(stristr($lhtml,'Location: '.$ser.'vem.action') || stristr($lhtml,'Location: '.$ser.'MainView.action') || stristr($lhtml,'Location: '.$ser.'ebrdg.action')) 
{
	 preg_match("/~(.*?);/i",$lhtml,$id);
$id=$id['1'];
if(!$id)
{
show('Login Failed. We Didnot Get Session Value.','darkred');
/*goto end;*/
 }
  show('Login Successfull.','darkgreen');
  /*goto bal;*/
 }
elseif(stristr($lhtml,'Location: http://api.mVaayoo.com/mvaayooapi/MessageCompose')) 
{

show('Login Failed. Invalid Login Details.','darkred');
/* goto end; */
}
 else
 {
	  show('Login Failed. Unknown Error Occured.','darkred'); 
	  /*goto end;*/
 }
bal:
///$ch = curl_init();
$msg=urlencode($msg);
$main=$ser."smstoss.action";
$ref=$ser."sendSMS?Token=".$id;
$conf=$ser."smscofirm.action?SentMessage=".$msg."&Token=".$id."&status=0";
$post="ssaction=ss&Token=".$id."&mobile=".$to."&message=".$msg."&Send=Send Sms&msgLen=".strlen($msg);
$mhtml=post($main,$post,$ch,$ckfile,$proxy,$ref);
if(stristr($mhtml,'smscofirm.action?SentMessage='))
{
	 show('SmS Sent Successfully To '.$to.'.','darkgreen');
	
	 
} 
else
 {
	  show('Error in Sending SmS.','darkred');
	   /*echo '<meta http-equiv="refresh" content="0"/>';*/
  }
   curl_close($ch);
}
echo "</div>";

		
		
		
		
	}
	else
	{
		echo '<script>alert("Error");</script>';
	}
}

 ?>
</body>
</html>