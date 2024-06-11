<?php 
	include 'connection.php';

	if(isset($_POST['submit'])){
		extract($_POST);

		$q="SELECT * FROM `tbl_login` WHERE `username`='$username' ";
		$res=select($q);
		// print_r($res);
		if(sizeof($res)>0){
		
			alert('Username already taken!');
		
	}
	else{
		$qw="INSERT INTO `tbl_login` VALUES ('$username','$password','staff','1')";
		insert($qw);
		$qs="INSERT INTO `tbl_staff` VALUES (null,'$username','$s_fname','$s_lname','$s_gender','$s_dob','$password',
		'$s_phone','$s_hno','$s_street','$s_district','$s_pin','1')";
		insert($qs);
}
}

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

if (isset($_GET['upid'])) {
	extract($_GET);

	$q2="select * from tbl_staff where staff_id='$upid'";
	$res=select($q2);
}
if (isset($_POST['update'])) {
	extract($_POST);

	echo $q="update tbl_staff set s_fname='$s_fname',s_lname='$s_lname',s_gender='$s_gender',s_dob='$s_dob',s_phone='$s_phone', s_hno='$s_hno', s_street='$s_street', s_district='$s_district', s_pin='$s_pin'where staff_id='$upid'";
	update($q);
}

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Dog Shop| staff_reg</title>
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
							<p><span class="glyphicon glyphicon-earphone"></span> +91 9074772635 </p>
						</li>
						<li><a class="sign" href="home.php" ><i class="fa fa-sign-in" aria-hidden="true"></i> Sign Out</a>							</li>
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
								<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span data-letters="Pages">Add</span><span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="staff_add.php">Staff</a></li>
										<li><a href="dog.php">Dog</a></li>
									    <li><a href="vendor_add.php">Vendor</a></li>
									</ul>
								</li>
								<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span data-letters="Pages">Veiw</span><span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="staff_det.php">Staff</a></li>
										<li><a href="dog.php">Dog</a></li>
										<li><a href="Vendor_det.php">Vendor</a></li>
										<li><a href="Cust_det.php">Customer</a></li>

									</ul>
								</li>
								<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span data-letters="Pages">Report</span><span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="staff_det.php">Staff</a></li>
										<li><a href="purchase.php">Purchase</a></li>
										<li><a href="sales.php">Sales</a></li>
									</ul>
								</li>
							</ul>
						</div>
						
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<!-- //navigation -->
		</div>
	</div>
	<div class="container">
			<h3 class="agileits-title">Add Staff </h3>
			<div class="contact-agileinfo">
				<div class="col-md-7 contact-right">

	

			<form method="POST">
				<?php if (isset($_GET['upid'])) { ?>
				<table border="2" class="table" style="width: 600px">
					<!-- <tr> 
						<th>STAFF ID</th>
						<td><input type="text" required="" name="Staff_ID"></td>
					 </tr> -->
					<tr>
						<th>FIRST NAME</th>
						<td><input type="text" required=""  value="<?php echo $res[0]['s_fname'] ?>" name="s_fname"></td>
					</tr>
					<tr>
						<th>LAST NAME</th>
						<td><input type="text" required="" value="<?php echo $res[0]['s_lname'] ?>" name="s_lname"></td>
					</tr>
					<tr>
						<th>GENDER</th>
						<td><input type="radio" name="s_gender" value="female">Female<input type="radio" name="s_gender" value="male">Male</td>
					</tr>
					<tr>
						<th>DATE OF BIRTH</th>
						<td><input type="date" required="" value="<?php echo $res[0]['s_dob'] ?>" name="s_dob"></td>
					</tr>
					
		            <tr>
						<th>PHONE NUMBER</th>
						<td><input type="number" value="<?php echo $res[0]['s_phone'] ?>" name="s_phone" min="0"></td>
					</tr>
					<tr>
						<th>HOUSE NUMBER</th>
						<td><input type="text" value="<?php echo $res[0]['s_hno'] ?>" name="s_hno"></td>
					</tr>
					<tr>
						<th>STREET NAME</th>
						<td><input type="text" value="<?php echo $res[0]['s_street'] ?>" name="s_street"></td>
					</tr>
					<tr>
					    <th>DISTRICT</th>
					    <td>
					    	<select name="s_district">
					    		<option value="TVM">TVM</option>
					    		<option value="ALA">ALA</option>
					    		<option value="ERN">ERN</option>
					    		<option value="IDU">IDU</option>
					    		<option value="KAN">KAN</option>
					    		<option value="KOZ">KOZ</option>
					    		<option value="KOL">KOL</option>
                                <option value="KOT">KOT</option>
					    		<option value="KAS">KAS</option>
					    		<option value="MAL">MAL</option>
					    		<option value="PAT">PAT</option>
					    		<option value="PAL">PAL</option>
					    		<option value="THR">THR</option>
					    		<option value="WAY">WAY</option>
					        </select></td>
                    
						</tr>
					<tr>
						<th>PINCODE</th>
						<td><input type="number" value="<?php echo $res[0]['s_pin'] ?>" name="s_pin"></td>
					</tr>
				<tr>
				        <td colspan="2"><input type="submit" name="update" value="SAVE" align="center">
				 </td>
				</tr>
			</table>
		<?php }else{?>
			<table border="2" class="table" style="width: 600px">
					<!-- <tr> 
						<th>STAFF ID</th>
						<td><input type="text" required="" name="Staff_ID"></td>
					 </tr> -->
					<tr>
						<th>FIRST NAME</th>
						<td><input type="text" required="" name="s_fname"></td>
					</tr>
					<tr>
						<th>LAST NAME</th>
						<td><input type="text" required="" name="s_lname"></td>
					</tr>
					<tr>
						<th>GENDER</th>
						<td><input type="radio" name="s_gender" value="female">Female<input type="radio" name="s_gender" value="male">Male</td>
					</tr>
					<tr>
						<th>DATE OF BIRTH</th>
						<td><input type="date" required="" name="s_dob"></td>
					</tr>
					<tr>
						<th>EMAIL</th>
						<td><input type="email" name="username"></td>
					</tr>
					<tr>
						<th>PASSWORD</th>
						<td><input type="password" name="password" required=""></td>
					</tr>
					<tr>
						<th> CONFIRM PASSWORD</th>
						<td><input type="password" name=" confirm password" required=""></td>
					</tr>
					
				    <tr>
						<th>DATE OF JOINING</th>
						<td><input type="date" required="" name="s_join"></td>
					</tr>
						<th>PHONE NUMBER</th>
						<td><input type="number" name="s_phone" min="0"></td>
					</tr>
					<tr>
						<th>HOUSE NUMBER</th>
						<td><input type="text" name="s_hno"></td>
					</tr>
					<tr>
						<th>STREET NAME</th>
						<td><input type="text" name="s_street"></td>
					</tr>
					<tr>
					    <th>DISTRICT</th>
					    <td>
					    	<select name="s_district">
					    		<option value="TVM">TVM</option>
					    		<option value="ALA">ALA</option>
					    		<option value="ERN">ERN</option>
					    		<option value="IDU">IDU</option>
					    		<option value="KAN">KAN</option>
					    		<option value="KOZ">KOZ</option>
					    		<option value="KOL">KOL</option>
                                <option value="KOT">KOT</option>
					    		<option value="KAS">KAS</option>
					    		<option value="MAL">MAL</option>
					    		<option value="PAT">PAT</option>
					    		<option value="PAL">PAL</option>
					    		<option value="THR">THR</option>
					    		<option value="WAY">WAY</option>
					        </select></td>
                    
						</tr>
					<tr>
						<th>PINCODE</th>
						<td><input type="number" name="s_pin"></td>
					</tr>
				<tr>
				        <td colspan="2"><input type="submit" name="submit" value="SAVE" align="center">
				        <input type="reset" name="" value="RESET" align="center"></td>
				</tr>
			</table>
		<?php } ?>
			</form>
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
<h3 class="agileits-title">Upadte Staff</h3>
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
                      <td><a href="?upid=<?php echo $key['staff_id']?>" class="btn btn-success btn-sm">Update</a></td>

	</tr>
<?php
}

?>
</table>

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