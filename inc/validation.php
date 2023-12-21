<?php
    function requiredInput($value){
        $str = trim($value);
        if(strlen($str) > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function santString($str){
        return filter_var($str, FILTER_SANITIZE_STRING);
    }

    function santEmail($email){
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }
    function hashedPass($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }

    function minInput($value, $min){
        return (strlen($value) >= $min)? true: false;
    }
    
    function maxInput($value, $max){
        return (strlen($value) <= $max)? true: false;
    }
?>