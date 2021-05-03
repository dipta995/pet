<?php
    class  Session{
        public static function init(){
            session_start();
        }
        public static function set($key, $val){
            $_SESSION[$key] = $val;

        }
        public static function get($key){
            if (isset($_SESSION[$key])) {
                return $_SESSION[$key];
            } else {
                return false;
            }
        }
        public static function checkSession(){
            self::init();
            
            
        }
        public static function checkSessionind($previous_link){
               // self::init();
                if (self::get("login")==false) {
             /*       self::destroy();*/
                    echo "<script> window.location = 'login.php?re_link=$previous_link';</script>";
                }
            }
             public static function checkSessionadmin(){
               self::init();
                if (self::get("login")==false) {
                   self::destroy(); 
                    echo "<script> window.location = 'login.php';</script>";
                }
            }
            
    public static function checkSession_auth(){
               
                if (self::get("login")==false) {
                    self::destroy();
                    header("Location:login.php");
                }
            }

 


        public static function checkLogin(){
            self::init();
            
          
            if (self::get("login")==true) {
               self::destroy();
                header("Location:index.php");
            }
            
        }


         public static function destroy(){
            session_destroy();
             
            echo "<script> window.location = 'login.php';</script>";
        }
    }
    
?>