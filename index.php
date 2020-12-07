<?php 
    include "include/header.php"; 
    include "dbconnect.php";
    session_start();
    if(isset($_POST['submit'])) {
        if(($_POST['email'] == "") || ($_POST['password'] == "")) {
            $message = "Fill this field";
        } else {
            $mail = mysqli_real_escape_string($conn, $_POST['email']);
            $pass = mysqli_real_escape_string($conn, $_POST['password']);
            $sql = "SELECT * FROM `registeration` WHERE `email` = '$mail' AND `password` = '$pass'";
            $query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($query)!=0) {
                while($row = mysqli_fetch_assoc($query)) {
                    $name = $row['name'];
                    $email = $row['email'];
                    $password = $row['password'];
                }
                if(($email == $mail) && ($password == $pass)) {
                    if(isset($_POST['remember'])) {
                        setcookie('email', $mail, time() + 60*60, "/", "", 0);
                        setcookie('pass', $pass, time() + 60*60, "/", "", 0);
                        header("Location: dashboard/chat.php");
                    }
                    $_SESSION['mail'] = $mail;
                    $_SESSION['pass'] = $pass;
                    $_SESSION['name'] = $name;
                    header("Location: dashboard/chat.php");        
                }
            } else {
                echo "<script>alert('Password or Email Incorrect');</script>";
            }
        }
    }   
?>
<div class="body">
    <div class="containr text-center">
        <h3 class="text-center text-primary">Login to DASHBOARD</h3>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group form-box row">
                <label for="email" class="col-md-1"><i class="fas fa-envelope"></i></label>
                <input type="email" class="col-md-11" value="<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email']; ?>" name="email" id="email">
                <span class="text-danger col-md-12">
                    <?php if(isset($message)) { echo $message; } ?>
                </span>
            </div>
            <div class="form-group form-box row">
                <label for="password" class="col-md-1"><i class="fas fa-key"></i></label>
                <input type="password" class="col-md-11" value="<?php if(isset($_COOKIE['pass'])) echo $_COOKIE['pass']; ?>" name="password" id="password">
                <span class="text-danger col-md-12">
                    <?php if(isset($message)) { echo $message; } ?>
                </span>
            </div>
            <div class="text-left mt-2">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label>
            </div>
            <input class="btn btn-primary btn-sm my-1" name="submit" type="submit" value="Sign in">
        </form>
        <div class="d-flex flex-content">
            <span><a href="forget_pass.php">Forget Password</a></span>
            <span><a href="registration.php">Registration</a></span>
        </div>
    </div>
</div>

<?php include"include/footer.php"; ?>