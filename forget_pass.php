<?php 
    include "include/header.php"; 
    include "dbconnect.php";

?>
    <div class="body">
        <div class="containr">
            <h3 class="text-center text-primary">Password Reset</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control" name="pass" id="pass">
                </div>
                <div class="form-group">
                    <label for="confirmPass">Confirm Password</label>
                    <input type="password" class="form-control" name="confirmPass" id="confirmPass">
                </div>
                <input class="btn btn-primary btn-sm" name="submit" type="submit" value="Reset">
            </form>
            <div class="mt-2">
                <span class="float-right"><a href="index.php">Back To Login</a></span>
            </div>
        </div>
    </div>

<?php 
    include("include/footer.php");
?>
