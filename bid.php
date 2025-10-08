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
$id=$_SESSION['bidderid'];
$_SESSION['bidderid']=$id;
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
					<li><a href="view.php">View Vehicle</a></li>
					<li><a href="bid.php" class="active">Bid</a></li>
					<li><a href="status.php">View Bidding status</a></li>
					<!--<li><a href="question.php">Add Question</a></li>-->
					
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
						<h3 class="panel-title" style="font-family: Times New Roman">Vehicle for Bid</h3>
						<div class="pull-right" style="margin-top:-15px;">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
								<i class="glyphicon glyphicon-filter"></i>
							</span>
						</div>
					</div>
					<div class="panel-body">
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter like (name,flocation,price)" />
					</div>
					
                    <table class="table table-hover" id="dev-table" style="font-family: Times New Roman ; font-size: 15px">
						<thead>
							<tr>
								<th>Vehicle id   	</th>
								<th>Vehicle name 	</th>
								<th>Image        	</th>
								<th>Seller name 	</th>
								<th>Seller email 	</th>
								<th>Seller location </th>
                                <th>Price        	</th>
                                <th>Bidding Price	</th>
                                <th>Bid          	</th>                              
                                
							</tr>
						</thead>
						<tbody>
                         <?php 
					$select=mysql_query("select * from product") or die(mysql_error());
					while ($row=mysql_fetch_array($select))
					{			
					$prodname=$row['prodname'];
					$description=$row['description'];
					$fname=$row['fname'];
					$selleremail=$row['selleremail'];
					$flocation=$row['flocation'];
					$photo=$row['photo'];
					$price=$row['price'];
					$prodid=$row['id'];
					?>
							<tr>
                            	<td><?= $prodid; ?></td>
								<td><?= $prodname; ?></td>
                                <td><img src="images/<?= $photo; ?>" class="img-thumbnail" width="100px"></td>
								<td><?= $fname; ?></td>
								<td><?= $selleremail; ?></td>
								<td><a href="https://maps.app.goo.gl/5r731jeZmETpGRJW7"><u>location</u></a></td>
                                <td style="color: red"><b>Rs.<?= $price; ?>.00</b></td>
								<td> <form method="post">
                                <input type="hidden" name="prodname" value="<?= $prodname; ?>">
                                <input type="hidden" name="selleremail" value="<?= $selleremail; ?>">
                                <input type="hidden" name="flocation" value="<?= $flocation; ?>">
								<input type="hidden" name="oprice" value="<?= $price; ?>">  
                                <input type="number" name="bprice" style="color: red" placeholder="Bidding price">
                                </td>
                                <td>
                                <input type="submit" name="send" style="background-color: #008000 ; color: white" value="Pre-Book">
                                </form></td>
							</tr>
					<?php } ?>		
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
	</div>

<?php
if(isset($_POST['send']))
{
	$bprod=$_POST['prodname'];
	$bseller=$_POST['selleremail'];
	$bprice=$_POST['bprice'];
	$oprice=$_POST['oprice'];
	if($bprice>$oprice)
	{
	
	$bid=mysql_query("insert into biddapp (sellerid,bidderid,prodname,oprice,bprice)values('$bseller','$id','$bprod','$oprice','$bprice')");
	if($bid)
	{
		echo '<script>alert("Bidding success");</script>';
	}
	else
	{
		echo '<script>alert("Error");</script>';
		
	}
	}
	else
	{
			echo '<script>alert("Bidding price must be greater than original price");</script>';
	}
	
	
}
?>

</body>
</html>