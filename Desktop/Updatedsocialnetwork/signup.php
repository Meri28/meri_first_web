<!DOCTYPE html>
<html>
<head>
</head>
<style>
input [type=text], input[text=password] {
	width:100%
        padding: 15px 25px;
        margin: 10px 0;
	display:inline block;
	border: 1px solid gray;
	box-sizing: border-box;
}

.cancelbtn {
	background-color: red;
	color:white;
	padding: 10px 20px;
	margin: 10px 0;
	border:none;
	cursor:pointer;
 	width:50%;
	
}

.signupbtn {

	background-color: green;
        color:white;
	padding: 10px 20px;
	margin: 10px 0;
	border:none;
	cursor:pointer;
 	width:50%;
}

.cancelbtn,.signupbtn {
    float: left;
    width: 50%;
}

.container {
    padding: 16px;
}

.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

</style>
<body>
<?php
$FNameErr = $MNameErr =$LNameErr = $emailErr = $pswErr = $bdayErr = $genderErr = "";
$FName = $MName = $LName = $email = $psw = $bday = $gender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["FName"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["FName"]);
  }
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["MName"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["MName"]);
  }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["LName"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["LName"]);
  }
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
    
  if (empty($_POST["psw"])) {
    $website = "";
  } else {
    $website = test_input($_POST["psw"]);
  }

  if (empty($_POST["bday"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["bday"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Signup Form</h2> 
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<div class="container">
	
	<label><b>First Name</b></label> 
 <br>
    	<input type="text" placeholder="Enter First Name" name="FName" required>
          <span class="error">* <?php echo $FNameErr;?></span>
  <br><br>
     
	<label><b>Middle Name</b></label> 
 <br>
    <input type="text" placeholder="Enter Middle Name" name="MName">
  <span class="error">* <?php echo $MNameErr;?></span>
  <br><br>

	<label><b>Last Name</b></label> 
 <br>
    <input type="text" placeholder="Enter Last Name" name="LName">
   <span class="error">* <?php echo $LNameErr;?></span>
  <br><br>

    <label><b>Email</b></label> 
 <br>
    <input type="text" placeholder="Enter Email" name="email" required>
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
     <label><b>Password</b></label>
 <br>
    <input type="password" placeholder="Enter Password" name="psw" required>
  <span class="error">* <?php echo $pswErr;?></span>
  <br><br>
     <label><b>Birthday</b></label>
 <br>
    <input type="Day" placeholder="Enter Day" name="bday" required>
    <input type="Month" placeholder="Enter Month" name="bday" required> 
    <input type="Year" placeholder="Enter Year" name="bday" required>
  <span class="error">* <?php echo $bdayErr;?></span>
  <br><br>
   
<label><b>Choose one of the following</b></label>
<br>  

  <label for="male">Male</label>
  <input type="radio" name="gender" id="male" value="male">
  <label for="female">Female</label>
  <input type="radio" name="gender" id="female" value="female">
  <label for="other">Other</label>
  <input type="radio" name="gender" id="other" value="other">
   <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
 
<p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
</div>
</form>

</html>
</body>
