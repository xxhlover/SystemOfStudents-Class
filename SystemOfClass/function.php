<?php 
    function stripstr($str){
        $str = addslashes($str);
        $str = htmlspecialchars($str);
        $str = strip_tags($str);
        return $str;
    }

    
