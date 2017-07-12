<!DOCTYPE html>
<html>
<style>
form {
    border: 1px solid gray;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 15px 25px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color:green;
    color: white;
    padding: 15px 25px;
    margin: 10px 0;
    border: none;
    cursor: pointer;
    width: 50%;
}


.container {
    padding: 16px;
}

 .error {color: #FF0000;}   
}
</style>
<body>
<?php
$unameErr = $pswErr =  "";
$uname = $psw = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["uname"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["psw"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
    
 }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<h2>Login Form</h2>


  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <span class="error">* <?php echo $unameErr;?></span>
  <br><br>
    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>   
    <span class="error">* <?php echo $pswErr;?></span>
  <br><br>
    <input type="checkbox" checked="checked"> Remember me <br> 
    <button type="submit">Login</button>
   
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>

</body>
</html>
