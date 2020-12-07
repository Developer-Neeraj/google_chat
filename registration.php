<?php 
    include "include/header.php"; 
    include "dbconnect.php";
    if(isset($_REQUEST['signIn'])) {
        if(isset($_REQUEST['check'])) {
            if(($_POST['name'] == "") || ($_POST['last_name'] == "") || ($_POST['email'] == "") || ($_POST['password'] == "") ||
            ($_FILES['image']['name'] == "") || ($_POST['address'] == "") || ($_POST['city'] == "") || ($_POST['state'] == "") || ($_POST['zip'] == "")) {
                $error = "fill this input text";
            } else {
                $name = $_POST['name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                $password = mysqli_real_escape_string($conn, sha1($_POST['password']));
                $image = $_FILES['image']['name']; 
                $address = $_POST['address'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $zip = $_POST['zip'];
                $sql = "INSERT INTO `registeration` (`name`, `last_name`, `email`, `password`, `image`, `address`, `city`, `state`, `zip`, `date_time`)
                VALUES ('$name', '$last_name', '$email', '$password', '$image', '$address', '$city', '$state', '$zip', current_timestamp())" or die('sql Failed');
                $result = mysqli_query($conn, $sql);
                if($result == true) {
                    if(isset($_FILES['image'])) {
                        move_uploaded_file($_FILES['image']['tmp_name'], 'dbimage/'. $_FILES['image']['name']);
                    }
                    echo "<script> alert('Registration Successful'); </script>";
                } else {
                    echo "error". mysqli_error($conn);
                }
             }
        } else {
            echo "<script>alert('Please Click On Check Button')</script>";
        }
    }
?>
<div class="body">
    <div class="containr containr1">
        <h3 class="text-center text-primary text-underline">Registration</h3>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="require" for="inputEmail4">Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="name" id="inputEmail4">
                    <span class="text-danger"><?php if(isset($error)) { echo $error; } ?></span>
                </div>
                <div class="form-group col-md-6">
                    <label class="require" for="inputPassword4">Last Name</label>
                    <input type="text" class="form-control" placeholder="Last Name" name="last_name" id="inputPassword4">
                    <span class="text-danger"><?php if(isset($error)) { echo $error; } ?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="require" for="inputEmail4">Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="email" id="inputEmail4">
                    <span class="text-danger"><?php if(isset($error)) { echo $error; } ?></span>
                </div>
                <div class="form-group col-md-6">
                    <label class="require" for="inputPassword4">Password</label>
                    <input type="password" class="form-control" placeholder="**************" name="password"  id="inputPassword4">
                    <span class="text-danger"><?php if(isset($error)) { echo $error; } ?></span>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Upoad Image</label>
                <input type="file" name="image" class="form-control-file border" id="exampleFormControlFile1">
                <span class="text-danger"><?php if(isset($error)) { echo $error; } ?></span>
            </div>
            <div class="form-group">
                <label class="require" for="inputAddress">Address</label>
                <input type="text" class="form-control" name="address" id="inputAddress" placeholder="Address">
                <span class="text-danger"><?php if(isset($error)) { echo $error; } ?></span>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" name="city" placeholder="City" class="form-control" id="inputCity">
                    <span class="text-danger"><?php if(isset($error)) { echo $error; } ?></span>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select name="state" id="inputState" class="form-control">
                        <option selected>Choose...</option>
                        <option>Delhi</option>
                        <option>Punjab</option>
                        <option>Haryana</option>
                        <option>Chandigarh</option>
                        <option>Goa</option>
                    </select>
                    <span class="text-danger"><?php if(isset($error)) { echo $error; } ?></span>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" placeholder="Pin" name="zip" class="form-control" id="inputZip">
                    <span class="text-danger"><?php if(isset($error)) { echo $error; } ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" name="check" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
            </div>
            <button type="submit" name="signIn" class="btn btn-primary btn-sm">Sign in</button>
        </form>
        <a class="mt-2 text-right" href="index.php">Return to Login &#8594;</a>
    </div>
</div>

<?php include"include/footer.php"; ?>
