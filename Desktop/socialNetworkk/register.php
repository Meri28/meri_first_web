<?php

require_once 'core/init.php';
if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'FName' => array(
                'required' => true,
                'unique' => 'users',
            ),

            'MName' => array(
                'required' => true,
            ),
            'LName' => array(
                'required' => true,
            ),
            'email' => array(
                'required' => true,
                'unique' => 'users',
            ),
            'password' => array(
                'required' => true,
                'min' => 6,

            ),
            'gender' => array(
                'required' => true,

            )
        ));
        if ($validation->passed()) {
            $user = new User();
            $salt = Hash::salt(32);
            try {
                $user->create(array(
                    'email' => Input::get('email'),
                    'password' => Hash::make(Input::get('password'), $salt),
                    'salt' => $salt,
                    'FName' => Input::get('FName'),
                    'LName' => Input::get('LName'),
                    'joined' => date('Y-m-d  H:i:s')
                ));
                Session::flash('home', "You have been registered and can now log in!");
                Redirect::to(404);
            } catch
            (Exception $e) {
                die($e->getMessage());
            }
        } else {
            foreach ($validation->errors() as $error) {
                echo $error, '<br>';
            }
        }
    }
}
?>

<form method="post" action=" ">
    <div class="container">

        <h2>Signup Form</h2>
        <label><b>First Name</b></label>
        <br>
        <input type="text" placeholder="Enter First Name" name="FName" id="FName"
               value="<?php echo escape(Input::get('FName')); ?>">

        <label><b>Middle Name</b></label>
        <br>
        <input type="text" placeholder="Enter Middle Name" name="MName" id="MName">
        <br><br>

        <label><b>Last Name</b></label>
        <br>
        <input type="text" placeholder="Enter Last Name" name="LName" id="LName"
               value="<?php echo escape(Input::get('LName')); ?>">
        <br><br>

        <label><b>Email</b></label>
        <br>
        <input type="text" placeholder="Enter Email" name="email" id="email"
               value="<?php echo escape(Input::get('email')); ?>">
        <br><br>
        <label><b>Password</b></label>
        <br>
        <input type="password" placeholder="Enter Password" name="password" id="password">
        <br><br>

        <label><b>Choose one of the following</b></label>
        <br>

        <label for="male">Male</label>
        <input type="radio" name="gender" id="male" value="male">
        <label for="female">Female</label>
        <input type="radio" name="gender" id="female" value="female">
        <label for="other">Other</label>
        <input type="radio" name="gender" id="other" value="other">
        <br><br>
        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

        <div class="clearfix">
            <button type="button" class="cancelbtn">Cancel</button>
            <button type="submit" class="signupbtn">Sign Up</button>
        </div>
</form>

</html>
</body>
