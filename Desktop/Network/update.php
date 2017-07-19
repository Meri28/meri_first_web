<?php

require_once 'core/init.php';


$user = new User();

if (!$user->isLoggedIn()) {
    Redirect::to('index.php');
}

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'FName' => array(
                'required' => true,
            ),
            'LName' => array(
                'required' => true,
            )
        ));
        if ($validation->passed()) {
            try {
                $user->update(array(
                    'FName' => Input::get('FName'),
                    'LName' => Input::get('LName')
                ));

                Session::flash('home', 'Your details hav been updated!');
                Redirect::to('index.php');
            } catch (Exception $e) {
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
<form action="" method="post">
    <div class="field">
        <label><b>FName</b></label>
        <input type="text" placeholder="Enter FName" name="FName" id="FName"
               value="<?php echo escape($user->data()->FName); ?>">
        <input type="submit" value="Update">
        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    </div>


    <div class="field">
        <label><b>FName</b></label>
        <input type="text" placeholder="Enter LName" name="LName" id="LName"
               value="<?php echo escape($user->data()->LName); ?>">
        <input type="submit" value="Update">
        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    </div>
</form>
