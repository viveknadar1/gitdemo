
<!DOCTYPE HTML>

<html>
<head>
	<title>Aakash Lab</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<link rel="stylesheet" type="text/css" href="css/ivory.css" media="all">
	
	<!-- For Date picker only -->
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<script>
	  $(document).ready(function() {
	    $("#datepicker1").datepicker();
		$("#datepicker2").datepicker();
	  });

$(
    function(){
     
        $('#time').click(function(){
                  var time = new Date();                
                  $('#time-holder').val(time.toDateString());  
        });
        
    }
);

	</script>
	<!-- For Date picker only -->
	
	<style>
		.content{width: 100%; height: auto; background-color: #EBEAE8; padding: 30px 12px;}
	.note {
		background-color: #ffffff; 
		padding: 10px 0; 
		color: #333333; 
				border-radius:5px; 
		   -moz-border-radius:5px; 
		-webkit-border-radius:5px;
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.2);
	       -moz-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.2);
		-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.2);
	}


	</style>


	
</head>
<body>
	<div class="row">
		<h1 class="text-center">Aakash Lab Attendance</h1>
	</div>
	<div class="content">
	<div class="grid">
		<div class="row space-top space-bot">
		<!--	<h3 class="text-center">LAb attendacne</h3> -->
		</div>
 
		<div class="row space-bot">

			<!--<div class="c12">
				<p class="note text-center">Click the below button for Today's Attendance</p>
		
<input type="text" name="" id="time-holder" placeholder="Displays Today's Date" />
			</div> -->

<button type="submit" class ="magenta" value ="time" name= "timer" id="time">Click me ! </button>
<!-- <input type="text" name="" id="time-holder" placeholder="Displays Today's Date" /> -->
<input type="text" name="" id="datepicker2" placeholder="mm/dd/yyyy" />

		</div>

		
		<hr>
		
<?php
$con=mysqli_connect("localhost","root","root","db_attendance");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();

  }
$i=1;
$result = mysqli_query($con,"SELECT * FROM tb_timings WHERE curDate = curDate()");
?>
<h4 class="text-center">Status</h4>
<?php

?>

<table>
<tr>
<th class="text-center">Sr No </th><th>Name</th><th>Date</th><th>Time</th><th>Status</th>
</tr>

<?php

while($row = mysqli_fetch_array($result))
  {

?>

<tr class = "even">
<td class="text-center"><?php echo $i ?></td>
    <td class="text-center"><?php echo $row['name']; ?> </td>
<td class="text-center"><?php echo $row['curDate']; ?></td>
<td class="text-center"><?php echo $row['curTime']; ?></td>
<!-- <td><?php echo $row['status']; ?></td> -->
	<?php 
		if($row['status'] == 0)
			{ ?>
				<td ><?php echo "IN" ?></td>
			<?php
			}else {  
				?>  <td class="text-center"><?php echo "OUT" ?> </td> <?php } ?>
</tr>
  <?php
$i++;

  }?>
</table>

<?php
mysqli_close($con);
?> 
 			
		
		<!--

		
			-->
		<hr>
		<div class="row space-bot">
			<div class="c6 first">
				<p>Developed at <a href="www.it.iitb.ac.in">IIT-Bombay</a><a href="http://www.iitb.ac.in"></a></p>
			</div>
			<div class="c6 last text-right">
				<!--<p>Free to use Under License GPLv2<p> -->
			</div>				
		</div>
	</div><!-- grid -->
</body>
</html>
