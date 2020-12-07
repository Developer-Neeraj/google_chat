<?php 
    include "../dbconnect.php";
    session_start(); 
    if(isset($_SESSION['mail'])) { 
        $mail = $_SESSION['mail']; 
    } else {
        header("Location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/custom.css">
    <link rel="stylesheet" href="../style/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-dark dashboard">
                <?php 
                    $sql = "SELECT `name`, `image` FROM registeration WHERE email = '$mail'";
                    $query = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($query)) {
                        $name = $row['name'];
                        $img = $row['image'];
                ?>
                <div class="dash_img">
                    <img src="../dbimage/<?php echo $img; ?>" alt="">
                </div>
                <h3 class="text-center"><?php echo $name; ?></h3>
                <?php 
                    }
                ?>
                <ul>
                    <li><a href="chat.php">Chats</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="change_profile.php">Change Profile</a></li>
                </ul>
            </div>
            <div class="col-md-10 dashboard1">
                <h6 class="text-white text-right"><a href="logout.php" class="text-white"><abbr title="Logout">
                    <?php if(isset($mail)) { echo $mail; } ?>
                </abbr></a></h6>