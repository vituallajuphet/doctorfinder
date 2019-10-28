<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class UserModule {

    
        public function isAuth()
        {
            if(isset($_SESSION["user_id"]))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
       
    }

?>