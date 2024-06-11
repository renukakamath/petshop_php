<?php
include 'connection.php';
if(isset($_GET['id']))
{
    extract($_GET);
    echo $q="update tbl_staff set s_status='0' where staff_id='$id'";
    update($q);
    // return redirect('staff_view.php');
}

if(isset($_GET['uid']))
{
    extract($_GET);
    echo $q="update tbl_staff set s_status='1' where staff_id='$uid'";
    update($q);
    // return redirect('staff_view.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Dog Shop | View_Pets</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Pets Care Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Custom Theme files -->
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- font-awesome icons -->
	<!-- //Custom Theme files -->
	<!-- js -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- //js -->
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Limelight" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
	    rel='stylesheet' type='text/css'>
	<!-- //web-fonts -->
</head>

<body>
	<!-- banner -->
	<div class="agileits-banner about-w3banner">
		<div class="bnr-agileinfo">
			<div class="banner-top w3layouts">
				<div class="container">
					<ul class="agile_top_section">
						<li>
						</li>
						<li>
							<p><span class="glyphicon glyphicon-earphone"></span> +91  </p>
						</li>
						<li><a class="sign" href="home.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign Out</a>							</li>
					</ul>
				</div>
			</div>
			<div class="banner-w3text w3layouts">


				<h2>Woofs</h2>
			</div>
			<!-- navigation -->
			<div class="top-nav w3-agiletop">
				<div class="agile_inner_nav_w3ls">
					<div class="navbar-header w3llogo">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>

						</button>
						<h1><a href="index.html">Woofs</a></h1>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<div class="w3menu navbar-left">
							<ul class="nav navbar">
								<li><a href="home.php">Home</a></li>
								<li><a href="about.php">About</a></li>
								<li><a href="gallery.php">Gallery</a></li>
								<li><a href="contact.php" class="active">Contact</a></li>
							</ul>
						</div>
						
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<!-- //navigation -->
		</div>
	</div>

<div class="contact">
		<div class="container">
			<h3 class="agileits-title">View Staff</h3>
			<div class="contact-agileinfo">
				<div class="col-md-7 contact-right">
					
<form method="POST">
<table border=1  class="table" style="width: 600px">
<tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Gender</th>
    <th>Date Of Birth</th>
    <th>Phone Number</th>
    <th>Email</th>
    <th>House Number</th>
    <th>Street Name</th>
    <th>District</th>
    <th>Pincode</th>
    <th>Status</th>
                <th>Action</th>
</tr>
<?php
$q="SELECT * FROM tbl_staff";
$res=select($q);
foreach ($res as $key ) 
	{
		?>
		<tr>
	<td><?php echo $key['s_fname']?></td>
	<td><?php echo $key['s_lname']?></td>
	<td><?php echo $key['s_gender']?></td>
	<!-- <td><img src="<?php echo $key['image']?>" width="70px" height="70px"></td> -->
	<td><?php echo $key['s_dob']?></td>
	<td><?php echo $key['s_phone']?></td>
	<td><?php echo $key['username']?></td>
	<td><?php echo $key['s_hno']?></td>
	<td><?php echo $key['s_street']?></td>
	<td><?php echo $key['s_district']?></td>
	<td><?php echo $key['s_pin']?></td>
	<td><?php echo $key['s_status']?></td>

	<?php 
                        if($key['s_status']=='1')
                            { ?>
                            <td><a href="?id=<?php echo $key['staff_id']?>" class="btn btn-danger btn-sm">De-activate</a></td>
                    <?php   }
                    else if($key['s_status']=='0'){  ?>
                        <td><a href="?uid=<?php echo $key['staff_id']?>" class="btn btn-success btn-sm">Activate</a></td>
                <?php    }



                     ?>
                     

	</tr>
<?php
}

?>
</table>   
    </form>
				
				
					
				
	<!-- //contact -->
	<!-- password-script -->
	<script type="text/javascript">
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->

<script src="js/SmoothScroll.min.js"></script>
	<!-- start-smooth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->
	<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="js/bootstrap.js"></script>
</body>
</html>