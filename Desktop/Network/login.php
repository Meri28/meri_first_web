<?php
require_once 'core/init.php';

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'email' => array('required' => true),
            'password' => array('required' => true)
        ));

        if ($validation->passes()) {
            $user = new User();

            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $user->login(Input::get('email'), Input::get('password'), $remember = false);
            if ($login) {
                Redirect::to('index.php');
            } else {
                echo '<p>Sorry, Logging in failed</p>';
            }
        } else {
            foreach ($validation->errors() as $error) {
                echo $error, '<br>';
            }
        }
    }
}
?>
<form action="" method="post">
    <div class="field">
        <label><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email"
               value="<?php echo escape(Input::get('email')); ?>">
    </div>

    <div class="field">
        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="password">
    </div>

    <div class="field">
        <label><b>Remember</b>
            <input type="checkbox" name="remember" id="remember">Remember me
        </label>
    </div>

    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" value="Log in">
</form>
