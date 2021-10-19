<!DOCTYPE html>
<html>
<head>
  
  <title>:: 404 || Page Not Found ::</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
<style type="text/css">
	
/*======================
    404 page
=======================*/

.page_404{ padding:40px 0; background:#fff; font-family: 'Rockwell', serif;
}

.page_404  img{ width:100%;}

.four_zero_four_bg{
 
 background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
    height: 500px;
    background-size: center;
    background-repeat: no-repeat;
 }
 
 
 .four_zero_four_bg h1{
 	font-size:80px;
 }

.four_zero_four_bg h3{
	font-size:80px;
}
			 
.link_404{		

	color: #fff!important;
	padding: 10px 20px;
	background: #39ac31;
	margin: 20px 0;
	display: inline-block;
}

.contant_box_404{ 
	margin-top:-50px;
}

</style>
</head>
<body>
<section class="page_404">
	<div class="container">
		<div class="row">	
		<div class="col-sm-12 ">
		<div class="col-sm-10 col-sm-offset-1  text-center">
		<div class="four_zero_four_bg">
		<h3 class="text-center ">OOPS !!! 404 </h3> 
			<h4 style="color:grey;">Result search?=<?php echo $_SERVER['REQUEST_URI']; ?> does not exist. </h4>
			<hr style="width: 100%;" />
		</div>
		<div class="contant_box_404">
		<h3 class="h2">
		Look like you're lost
		</h3>
		<p>the page you are looking for not avaible!</p>
		<hr style="width: 100%;" />
		<a href="<?php echo base_url(); ?>" class="link_404">Go to Home</a>
	    </div>
		</div>
		</div>
		</div>
	</div>
</section>
</body>
</html>
