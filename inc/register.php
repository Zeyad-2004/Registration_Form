<?php include"validation.php"?>
<?php include"db.php";?>

<?php
    if(isset($_POST['btn'])){

        $username = santString($_POST['username']);
        $fullname = santString($_POST['full_name']);
        $email = santEmail($_POST['email']);
        $phonenumber = $_POST['number'];
        $password = $_POST['password'];
        $gender = $_POST['radioGroup'];
        
        if(!(requiredInput($username) && minInput($username, 5))){
            $failed = "Invaid Fullname";
        }
        else{

            if(!(requiredInput($fullname) && minInput($fullname, 5))){
                $failed = "Invalid Username";
            }
            else{
            
                if(!requiredInput($email)){
                    $failed = "Invalid Email";
                }
                else{
            
                    if(!(minInput($phonenumber, 8) && maxInput($phonenumber, 12))){
                        $failed = "Phone number Must be between 8 to 12 Number";
                    }
                    else{
            
                        if(!(minInput($password, 8) && maxInput($password, 20))){
                            $failed = "Password Must be between 8 to 20 character";
                        }
                        else {
            
                            if($_POST['password'] != $_POST['confpassword']){
                                $failed = "Not Matched Passwords";
                            }
                            else{
                                $password = hashedPass($password);

                                $sql = "INSERT INTO `registration_form`(`user_name`, `full_name`, `email`, `phone_number`, `password`, `gender`)
                                        VALUES ('$username','$fullname','$email','$phonenumber','$password','$gender')";

                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    $success = "Regsitration Done Successfully";
                                }
                                else {
                                    $failed = "Not Completed Registration";
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>