<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
					<li><a href="view.php" class="active" >View Vehicle</a></li>
					<li><a href="bid.php" >Bid</a></li>
					<li><a href="status.php" >View Bidding status</a></li>
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
						<h3 class="panel-title" style="font-family: Times New Roman">Vehicle for You<marquee scrollamount="2" width="100%" direction="down" height="50px" style="padding-left: 300px ; 
						color: white ; font-size: 20px ; font-family: Times New Roman Bold"> !!! VEHICLE ARE MORE RICH !!!</marquee></h3>
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
								<th>Vehicle id</th>
								<th>Vehicle name</th>
								<th>Seller name</th>
								<th>Seller contact</th>
								<th>Seller location & KM</th>
								<th>Description</th>
								<th>Type of Vehicle</th>
								<th>Image</th>
                                <th>Price</th>
                                
							</tr>
						</thead>
						<tbody>
						
						 <?php 
                                $con = mysqli_connect("localhost","root","","ebidding");

                                $sort_option = "";
                                if(isset($_GET['sort_numeric']))
                                {
                                    if($_GET['sort_numeric'] == "low-high"){
                                        $sort_option = "ASC";
                                    }elseif($_GET['sort_numeric'] == "high-low"){
                                        $sort_option = "DESC";
                                    }
                                }
                                
                                $query = "SELECT * FROM product ORDER BY price $sort_option";
                                $query_run = mysqli_query($con, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $row)
                                    {
                                        ?>
                                            <tr>
                                                <td><?= $row['prodid']; ?></td>
                                                <td><?= $row['prodname']; ?></td>
                                                <td><?= $row['fname']; ?></td>
                                                <td><?= $row['fno']; ?></td>
                                                <td>Near by <a href="https://maps.app.goo.gl/5r731jeZmETpGRJW7"><u>location</u></a><br>&<b style="color: red"><?= $row['km']; ?> </b>KM</td>
                                                <td><?= $row['description']; ?></td>
                                                <td><?= $row['type']; ?></td>
												<td><img src="images/<?= $row['photo']; ?>" class="img-thumbnail" width="100px"></td>
												<td style="color: red"><b>Rs. <?= $row['price']; ?>.00</b></td>
                                            </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <tr>
                                        <td colspan="3">No Record Found</td>
                                    </tr>
                                    <?php
                                }
                            ?>
						</tbody>
						
						 <form action="" method="GET">
                            <div class="row">
							<div class="panel panel-primary">
							
                                <div class="col-md-12" style="padding-left: 900px">
                                    <div class="input-group mb-12"><br>
                                        <select name="sort_numeric" class="form-control">
                                            <option value="">--Select Option--</option>
                                            <option value="low-high" <?php if(isset($_GET['sort_numeric']) && $_GET['sort_numeric'] == "low-high") { echo "selected"; } ?> > Low - High</option>
                                            <option value="high-low" <?php if(isset($_GET['sort_numeric']) && $_GET['sort_numeric'] == "high-low") { echo "selected"; } ?> > High - Low</option>
                                        </select>
                                        <button type="submit" class="input-group-text btn btn-primary" style="background-color: #1dbab4" id="basic-addon2">
                                            Filter
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <table class="table table-bordered">
                           
                            <tbody style="background-color: white">
                            <?php 
                                $con = mysqli_connect("localhost","root","","ebidding");

                                $sort_option = "";
                                if(isset($_GET['sort_numeric']))
                                {
                                    if($_GET['sort_numeric'] == "low-high"){
                                        $sort_option = "ASC";
                                    }elseif($_GET['sort_numeric'] == "high-low"){
                                        $sort_option = "DESC";
                                    }
                                }
                                
                                $query = "SELECT * FROM product ORDER BY price $sort_option";
                                $query_run = mysqli_query($con, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $row)
                                    {
                                        ?>
                                           
										   
										   
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <tr>
                                        <td colspan="3">No Record Found</td>
                                    </tr>
                                    <?php
                                }
                            ?>
                            </tbody>
                        </table>
						</div>
                    </div>
                </div>
            </div>
        </div>
						
						
					</table>
					
				</div>
			</div>
		</div>
	</div>
</body>
</html>