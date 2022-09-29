<?php
function emptyValidation($studentid,$name,$surname,$studentemail,$cellnumber,$usertype,$address,$psd) //Form validation
    {
        $flag = true;
        if(empty($studentid) || empty($name) || empty($surname) || empty($studentemail) || empty($cellnumber) || empty($usertype)|| empty($address) || empty($psd)){
            echo "<script>alert('Please fill in all fields!')</script>";
            global $count;
            $count++;
        }
        else{
            $flag = false;
        }
        return $flag;
    }

function emptyBookValidation($bookid,$title,$author,$year,$bookCondition,$price,$userid) //Form validation
    {
        $flag = true;
        if(empty($bookid) || empty($title) || empty($author) || empty($year)|| empty($price) || empty($userid)){
            echo "<script>alert('Please fill in all fields!')</script>";
            global $count;
            $count++;
        }
        else{
            $flag = false;
        }
        return $flag;
    }

function yearVal($year)
{
    global $year;
    $flag = true;
    if(empty($year)){
        echo "";
    }else{
        if(!preg_match('/^[0-9]{4}+$/', $year)){
            echo "<script>alert('You have entered an invalid year, try again!')</script>";
            global $count;
            $count++;
        }
        else{
            $flag = false;
        }
    }
        return $flag;
}

function priceVal($price)
{
    global $price;
    $flag = true;
    if(empty($price)){
        echo "";
    }else{
        if(!preg_match('/^[0-9]+$/', $price)){
            echo "<script>alert('You have entered an invalid price, try again!')</script>";
            global $count;
            $count++;
        }
        else{
            $flag = false;
        }
    }
        return $flag;
}

function studentIDexists($studentid) //Checking if the student id already exists or not
    {
        global $result;
        $flag = true;
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('You have entered a student number that already exists, try again!')</script>";
            global $count;
            $count++;
        }
        else{
            $flag = false;
        }
        return $flag;
    } 

function bookIDexists($bookid) //Checking if the student id already exists or not
    {
        global $result;
        $flag = true;
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('You have entered a book that already exists, try again!')</script>";
            global $count;
            $count++;
        }
        else{
            $flag = false;
        }
        return $flag;
    }     

function studentIDvalidation($studentid) //Checking if the student ID entered is valid or not
    {
        global $studentid;
        $flag = true;
        if(empty($studentid)){
        echo "";
        }else{
        if(!preg_match("/NWU1011/", $studentid) || strlen($studentid) !== 10){
            echo "<script>alert('You have entered an invalid student ID, try again!')</script>";
            global $count;
            $count++;
        }
        else{
            $flag = false;
        }
    }
        return $flag;
    } 

function emailValidation($studentemail) //Checking if the email entered is valid or not
    
        {
        global $studentemail;
        $flag = true;
        if(empty($studentemail)){
            echo "";
        }else{
            if(!preg_match("/@northwestu.ac.za/", $studentemail)){
                echo "<script>alert('You have entered an invalid email address, try again!')</script>";
                global $count;
                $count++;
            }
            else{
                $flag = false;
            }
        }
            return $flag;
        }
    
function userType($usertype) //Checking if the user is a buyer or a seller
    {
        global $usertype;
        $flag = true;
        if(empty($usertype)){
            echo "";
        }else{
            if($usertype === "Buyer" || $usertype === "Seller"){
                $flag = false;
            }
            else{
                echo "<script>alert('You have entered an invalid user type, try again!')</script>";
                global $count;
                $count++;
            }
        }
            return $flag;
    }
    
    

function cellValidation($cellnumber) //Checking if the cellphone number entered is valid or not
        {
            global $cellnumber;
            $flag = true;
            if(empty($cellnumber)){
                echo "";
            }else{
            if(!preg_match('/^[0-9]{10}+$/', $cellnumber)){
                echo "<script>alert('You have entered an invalid cell phone number, try again!')</script>";
                global $count;
                $count++;
            }
            else{
                $flag = false;
            }
            return $flag;
        }
    }



function passwordValidation($psd) //Checking if the password entered is valid or not
    {
        global $psd;
        $flag = true;
        if(empty($psd)){
            echo "";
        }else{
        if(strlen(trim($psd)) < 6){
            echo "<script>alert('You have entered an invalid password, must be longer than 6 characters, try again!')</script>";
            global $count;
            $count++;
        }
        else{
            $flag = false;
        }
        return $flag;
    }
}
    
?>