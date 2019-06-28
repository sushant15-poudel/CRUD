<?php
$fullname=$permanentaddress=$temporaryaddress=$mobile=$phone=$email=$fathersname=$mothersname=$dob=$placeofbirth=$education=$job=$fullname_error=$permanentaddress_error=$temporaryaddress_error=$mobile_error=$phone_error=$email_error=$fathersname_error=$mothersname_error=$year_error=$month_error=$day_error=$zone_error=$district_error=$placeofbirth_error=$education_error=$job_error=$joborganization_error='';

$con=mysqli_connect('localhost', 'root', '', 'greenedge') or die(mysqli_error($con));

if(isset($_POST['register']))
{
	$fullname=$_POST['fullname'];
	$permanentaddress=$_POST['peraddress'];
	$temporaryaddress=$_POST['temaddress'];
	$mobile=$_POST['mobile'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$fathersname=$_POST['fathername'];
	$mothersname=$_POST['mothername'];
	$zone=$_POST['zone'];
	$district=$_POST['district'];
	$year=$_POST['year'];
	$month=$_POST['month'];
	$day=$_POST['day'];
	$education=$_POST['education'];
	$job=$_POST['job'];
	$joborganization=$_POST['joborganization'];

	if(fullname($fullname) || permanentaddress($permanentaddress) || temporaryaddress($temporaryaddress) || mobile($mobile) || phone($phone) || email($email) || fathername($fathersname) || mothername($mothersname) || year($year) || month($month) || day($day) || education($education) || job($job) || joborganization($joborganization) || zone($zone) || district($district))
	{
		$fullname_error=fullname($fullname);
		$permanentaddress_error=permanentaddress($permanentaddress);
		$temporaryaddress_error=temporaryaddress($temporaryaddress);
		$mobile_error=mobile($mobile);
		$phone_error=phone($phone);
		$email_error=email($email);
		$fathersname_error=fathername($fathersname);
		$mothersname_error=mothername($mothersname);
		$year_error=year($year);
		$month_error=month($month);
		$day_error=day($day);
		$zone_error=zone($zone);
		$district_error=district($district);
		$education_error=education($education);
		$job_error=job($job);
		$joborganization_error=joborganization($joborganization);
	
		$query=$con->query("INSERT INTO customer_information (fullname, peraddress, temaddress, mobile, phone, email, fathername, mothername,zone, district, year, month, day, education, job, joborganization) VALUES ('$fullname', '$permanentaddress', '$temporaryaddress', '$mobile', '$phone', '$email', '$fathersname', '$mothersname','$zone', '$district', '$year','$month','$day', '$education', '$job', '$joborganization')");
		if($query)
		{
			echo "connection successful";
		}
		else
		{
			echo"connection failed";
		}
	}
}

function zone($zone)
{
	if(empty($zone))
	{
		return "Zone is required";
	}
}

function district($district)
{
	if(empty($district))
	{
		return "District is required";
	}
}

function job($job)
{
	if(empty($job))
	{
		return "Job title is required";
	}
	elseif(strlen($job) < 5)
	{
		return "Job title must be of atleast 6 characters";
	}
}

function education($education)
{
	if(empty($education))
	{
		return "Education is required";
	}
	elseif(strlen($education) < 5)
	{
		return "Education must be of atleast";
	}
}

function year($year)
{
	if(empty($year))
	{
		return "Birth Year is required";
	}
}

function month($month)
{
	if(empty($month))
	{
		return "Birth of Month is required";
	}
}

function day($day)
{
	if(empty($day))
	{
		return "Birth day is required";
	}
}

function mothername($mothersname)
{
	if(empty($mothersname))
	{
		return "Mothers fullname is required";
	}
	elseif(!preg_match("/^[\p{L} ]+$/u", $mothersname))
	{
		return "Invalid Mothers Name";
	}
	elseif(strlen($mothersname) < 3)
	{
		return "Mothers Name must be of atleast 4 characters";
	}
}

function fathername($fathersname)
{
	if(empty($fathersname))
	{
		return "Father Fullname is required";
	}
	elseif(!preg_match("/^[\p{L} ]+$/u", $fathersname))
	{
		return "Invalid Fathers Name";
	}
	elseif(strlen($fathersname) < 3)
	{
		return "Fathers Name must be of atleast 4 characters";
	}
}

function email($email)
{
	if(empty($email))
	{
		return "Email is required";
	}
	elseif(!preg_match("/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,24})$/",$email))
	{
		if(!filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			return "Invalid Email";
		}
	}
}

function phone($phone)
{
	if(empty($phone))
	{
		return "Phone number is required";
	}
	elseif(!preg_match("/^(\+)([0-9]{1,5})(\s)(\d{4,25})$/", $phone))
	{
		return "Informat Phone Number";
	}
}

function mobile($mobile)
{
	if(empty($mobile))
	{
		return "Mobile number is required";
	}
	elseif(!preg_match("/^\+?([0-9]{1,5})\)?[-. ]?([0-9]{5,20})$/", $mobile))
	{
		return "Informat Mobile Number";
	}
}

function permanentaddress($peraddress)
{
	if(empty($peraddress))
	{
		return "Address is required";
	}
	elseif(!preg_match('/[a-zA-Za-z0-9\-\\,.]+/', $peraddress))
	{
		return "Invalid address";
	}
}

function temporaryaddress($tempaddress)
{
	if(empty($tempaddress))
	{
		return "Address is required";
	}
	elseif(!preg_match('/[a-zA-Za-z0-9\-\\,.]+/', $tempaddress))
	{
		return "Invalid address";
	}
}

function fullname($fullname)
{
	if(empty($fullname))
	{
		return "First name is required";
	}
	elseif(!preg_match("/^[\p{L} ]+$/u", $fullname))
	{
		return "Invalid First Name";
	}
	elseif((strlen($fullname) < 3) && strlen($fullname) > 20 )
	{
		return "First Name must be of atleast 5-19 characters";
	}
}

function joborganization($joborganization)
{
	if(empty($joborganization))
	{
		return "Joborganization is required";
	}
	elseif(!preg_match("/^[\p{L} ]+$/u", $joborganization))
	{
		return "Invalid Job Organization";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	
</head>

<body background="red">
<div class="container">
	<div class="login-box">
		<div class="row">
						
<h2 style="color:red">My Form Project</h2>
<link rel="stylesheet" type="text/css" href="http://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<link href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel = "stylesheet">


<form action="registration.php" method="POST">
	<div class="container">
		<div class="form-group">
	<span><?php echo $fullname_error; ?></span>
	<div>
	Full Name: <input type="text" name="fullname" placeholder="Your FullName"  class="form-control"/>
	</div>
</div>
	<div class="form-group">
	<span><?php echo $permanentaddress_error; ?></span>
	<div>
	Permanent Address: <input type="text" name="peraddress" placeholder="Your Permanent Address" class="form-control" />
	</div>
</div>
	<div class="form-group">
	<span><?php echo $temporaryaddress_error; ?></span>
	<div>
	Temporary Address: <input type="text" name="temaddress" placeholder="Your Temporary Address" class="form-control" />
	</div>
</div>
	<span><?php echo $mobile_error; ?></span>
	<div>
	Mobile Number: 
	<select required>
		<option></option>
		<?php $query="SELECT countryname FROM country ORDER BY countryname";
			  $result=mysqli_query($con,$query);
			  while($row=mysqli_fetch_array($result))
			  {
			  	echo "<option value=".$row['countryname'].">".$row['countryname']."</option>";
			  }
		?>
	</select>
	<div class="form-group">
	<input type="text" name="mobile" placeholder="Write your Mobile number along with your country code"  class="form-control"/></div>
	<span><?php echo $phone_error; ?></span>
	<div>
	</div>
	Phone Number: <select required>
		<option></option>
		<?php $query="SELECT countryname FROM country ORDER BY countryname";
			  $result=mysqli_query($con,$query);
			  while($row=mysqli_fetch_array($result))
			  {
			  	echo "<option value=".$row['countryname'].">".$row['countryname']."</option>";
			  }
		?>
	</select>
	<div class="form-group">
	<input type="text" name="phone" placeholder="Write your phone number along with the country code" class="form-control" /></div>
</div>
	<div class="form-group">
	<span><?php echo $email_error; ?></span>
	<div>
	Email: <input type="text" name="email" placeholder="Give me your email" class="form-control" /></div>
	<span><?php echo $fathersname_error; ?></span>
	<div>
	</div>
	<div class="form-group"> 
	Father's Name: <input type="text" name="fathername" placeholder="Provide your fathers name" class="form-control" /></div>
	<span><?php echo $mothersname_error; ?></span>
	<div>
	</div>
	<div class="form-group">
	Mother's Name: <input type="text" name="mothername" placeholder="Provide your mothersname"   class="form-control" /></div>
	<div>
	</div>
	
	Place Of Birth:
	<span><?php echo $year_error; ?></span><br>
	<select name="year" class="form-control">
		<option></option>
		<?php $query="SELECT year FROM year";
			  $result=mysqli_query($con,$query);
			  while($row=mysqli_fetch_array($result))
			  {
			  	echo "<option value=".$row['year'].">".$row['year']."</option>";
			  }
		?>

	</select>
	<span><?php echo $month_error; ?></span><br>
	<select name="month" class="form-control">
		<option></option>
		<?php 
		$query="SELECT month_name FROM month";
		$result=mysqli_query($con,$query);
		while($row=mysqli_fetch_array($result))
		{
			echo "<option value=".$row['month_name'].">".$row['month_name']."</option>";
		}
		?>
	</select>
	<span><?php echo $day_error; ?></span><br>
	<select name="day" class="form-control">
		<option></option>
		<?php 
		$query="SELECT daynumber FROM day";
		$result=mysqli_query($con,$query);
		while($row=mysqli_fetch_array($result))
		{
			echo "<option value=".$row['daynumber'].">".$row['daynumber']."</option>";
		}
		?>
	</select>
</div>
	<span><?php echo $zone_error; ?></span>
	<div>
		Zone: <br><select name="zone" class="form-control">
			<option></option>
			<?php $query="SELECT zone_name FROM zone ORDER BY zone_name";
				  $result=mysqli_query($con,$query);
				  while($row=mysqli_fetch_array($result))
				  {
				  	echo "<option value=".$row['zone_name'].">".$row['zone_name']."</option>";
				  }
				  		?>
		</select>
	</div>
	<br>
	<span><?php echo $district_error; ?></span>
	<div>
		District:<br> <select name="district" class="form-control">
				<option></option>
				<?php $query="SELECT district_name FROM district ORDER BY district_name";
				      $result=mysqli_query($con,$query);
				      while($row=mysqli_fetch_array($result))
				      {
				      	echo "<option value=".$row['district_name'].">".$row['district_name']."</option>";
				      }?>
		</select>
	</div>
	<span><?php echo $education_error; ?></span>
	<div>
	<div class="form-group">
	Education: <input type="text" name="education" placeholder="Which level of education along with subject" class="form-control" /></div>
</div>
	<span><?php echo $job_error; ?></span>
	<div>
		<div class="form-group">
	Job: <select name="job" class="form-control">
		<option></option>
		<option value="Student" class="btn btn-success">Student</option>
		<option value="Employee" class="btn btn-danger">Employee</option>
	</select></div>
</div>
	<?php echo $joborganization_error; ?>
	<div>
		<div class="form-group">
		Job Organization: <input type="text" name="joborganization" placeholder="Provide your Job title with Job Organization"  class="form-control"/>
	</div>
</div>
	<div class="form">
	<input type="submit" name="register" value="Register" class="btn btn-info btn-lg  btn-oval">
</div>
</div>
</form>
</div>
</div>
</div>
<style>
	body{background-color:blue;}
	.container{height: 400px; width: 400px;}
	.size{width:400px;}
	.form{
			text-align: center;

		 }






	}



	}
	</style>
</body>
</html>