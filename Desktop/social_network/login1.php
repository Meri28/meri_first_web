
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

$file = fopen('password.txt', 'r') or die ('Unable to open file.');
$passwords =[];

while(!feof($file)) {
    $row = fgets($file);
    $words = explode(' ',$row);
    $passwords[$words[0]] = $words[1];
}



$unameErr = $pswErr =  "";
$username = $password = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["uname"])) {
        $nameErr = "Name is required";
    } else {
      $username = test_input($_POST['uname']);

    }

    if (empty($_POST["psw"])) {
        $pswErr = "Password is required";
    } else {
        $password = test_input($_POST['psw']);
    }

    if($unameErr === "" && $pswErr === "") {
        echo "{$username} - {$password}";
        echo "hash - {$passwords[$username]}";
        if (key_exists($username,$passwords)) {
            if (password_verify($password,$passwords[$username])) {
                session_start();
                  $SESSION ['login_test'] = 'old'; 
                echo "////////////////////////////////////////Loged in";
                header("Location:profile.php");
                exit;
            } else {
                echo "Invalid Password";
            }
        } else {
            echo "Invalid User/Password";
        }
    }

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
