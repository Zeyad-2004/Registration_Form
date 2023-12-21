<?php include "inc/header.php"?>
<?php include "inc/validation.php"?>

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
                        $failed = "Invalid Phone Number";
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

<section id="registration">
    <h1>Registration</h1>
    <section class="form">
        <form method="post">
            <div class="row">
                <div class="col-md-6">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Enter your name" required>
                </div>
                    <div class="col-md-6">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                </div>
                    <div class="col-md-6">
                    <label for="number" class="form-label">Phone Number</label>
                    <input type="number" class="form-control" name="number" id="number" placeholder="Enter your number" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                </div>
                    <div class="col-md-6">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confpassword" id="confirm_password" placeholder="Confirm your password" required>
                </div>
            </div>

            <section class="row gender">
                <h3>Gender</h3>
                <div class="form-check col-md-4 choose">
                    <input class="form-check-input" type="radio" name="radioGroup" value ="male" required>
                    <label class="form-check-label" for="flexRadioDefault1">Male</label>
                </div>
                <div class="form-check col-md-4 choose">
                    <input class="form-check-input" type="radio" name="radioGroup" value="female" required>
                    <label class="form-check-label" for="flexRadioDefault2">Female</label>
                </div>
                <div class="form-check col-md-4 choose">
                    <input class="form-check-input" type="radio" name="radioGroup" value="not_say" required>
                    <label class="form-check-label" for="flexRadioDefault2">Prefer not to say</label>
                </div>
            </section>

            <input type="submit" value="Register" name="btn">
            <?php if(isset($success)):?>
                <div class="alert alert-success text-center" role="alert">
                    <?php echo $success;?>
                </div>
            <?php endif; ?>

            <?php if(isset($failed)):?>
                <div class="alert alert-danger text-center" role="alert">
                    <?php echo $failed;?>
                </div>
            <?php endif; ?>
        </form>
    </section>
</section>


<button type="button" class="btn btn-light" style="position: absolute; left: 0; top: 0; margin: 20px;">
    <a href="users_table.php" style="text-decoration: none; color: #9b59b6 ; font-weight: 600">See Users</a>
</button>





<?php include "inc/footer.php"?>
