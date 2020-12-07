<?php 
    include "das_Include/header.php";
    if(isset($_SESSION['mail'])) {
        $mail = $_SESSION['mail'];
        $sql = 'SELECT * FROM registeration WHERE email = "'.$mail.'"';
        $result = mysqli_query($conn, $sql) or die("query failed");
    }
    if(isset($_REQUEST['update'])) {
        // if(($_REQUEST['name'] == "") || ($_POST['last'] == "") || ($_POST['email'] == "") || ($_POST['address'] == "") 
        //      || ($_POST['city'] == "") || ($_POST['zip'] == "")) {
        //     $message = "Insert this Input field";
        // }
        $name = $_POST['name'];
        $last = $_POST['last'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $sql = "UPDATE registeration SET name = '$name', last_name = '$last', email = '$email', address = '$address', city = '$city', state = '$state', zip = '$zip' WHERE regist_id = 1";
        if(mysqli_query($conn, $sql)) {
            header("refresh: 0");
        }
    }
?>

<div class="row">
    <div class="col-md-8 m-auto">
    <h4 class="text-center py-1 bg-primary text-white my-4">Update details</h4>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <?php
            while($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Name</label>
                    <input name="name" type="text" value="<?php echo $row['name']; ?>" class="form-control" id="inputEmail4">
                    <span class='text-danger'>
                        <?php if(isset($message)) { echo $message; } ?>
                    </span>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Last Name</label>
                    <input type="text" name="last" class="form-control" value="<?php echo $row['last_name']; ?>" id="inputPassword4">
                    <span class='text-danger'>
                        <?php if(isset($message)) { echo $message; } ?>
                    </span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" id="inputEmail4">
                    <span class='text-danger'>
                        <?php if(isset($message)) { echo $message; } ?>
                    </span>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress">Address</label>
                    <input type="text" name="address" class="form-control" id="inputAddress" value="<?php echo $row['address']; ?>">                    
                    <span class='text-danger'>
                        <?php if(isset($message)) { echo $message; } ?>
                    </span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" name="city" class="form-control" id="inputCity" value="<?php echo $row['city']; ?>">
                    <span class='text-danger'>
                        <?php if(isset($message)) { echo $message; } ?>
                    </span>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select id="inputState" name="state" class="form-control">
                        <option selected><?php echo $row['state']; ?></option>
                        <option>Delhi</option>
                        <option>Punjab</option>
                        <option>Haryana</option>
                        <option>Chandigarh</option>
                        <option>Goa</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" name="zip" class="form-control" id="inputZip" value="<?php echo $row['zip']; ?>">
                    <span class='text-danger'>
                        <?php if(isset($message)) { echo $message; } ?>
                    </span>
                </div>
            </div>
            <?php }?>
            <div class="text-center">
                <button name="update" type="submit" class="btn btn-sm btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

<?php 
    include "das_Include/footer.php";
?>