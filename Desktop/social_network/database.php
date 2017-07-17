<?php

	 
class database {
private $_siteKey;
public function __construct() {
 $this->siteKey = 'null';
}

public function readdatabase()
        {
           if(!isset($this->database)) {
           $file = fopen("password.txt", "r");
           while( ! feof($file))
            $line=fgets($file);  
            $words=explode(" ", line);
           if[$words[0]!== " ") {
            $this->database[$words[0]]=$words[1];
}
}
fclose($file);
}
}
           

private function randomString($length = 50)
	{
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
	    $string = '';   
	         
	    for ($p = 0; $p < $length; $p++) {
	        $string .= $characters[mt_rand(0, strlen($characters))];

	    }

	          return $string;

	}
protected function hashData($data)
           {

	        return hash_hmac('sha512', $data, $this->_siteKey);
	    }


	public function isAdmin()

	{      

	    //$selection being the array of the row returned from the database.

	    if($selection['is_admin'] == 1) {

	        return true;

	    }

	    return false;
	}


public function createUser($string, $is_admin = 0)

	{    $file = fopen("password.txt", "a");
              fwrite($file, $string);
              fclose($file);
}

>
