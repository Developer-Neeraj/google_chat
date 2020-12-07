<?php 
    include "das_Include/header.php";
    if(isset($_SESSION['mail']) && isset($_SESSION['name'])) {
        $mail = $_SESSION['mail'];
        $name = $_SESSION['name'];
        if(isset($_REQUEST['send'])) {
            if($_REQUEST['Message'] != "") {
                $mess = $_REQUEST['Message'];
                $sql = "INSERT INTO `message`(`name`, `email`, `mess`, `time`) VALUES('$name', '$mail', '$mess', CURRENT_TIMESTAMP())";
                $query = mysqli_query($conn, $sql);
            }
        }
    }
?>

<div class="container">
    <div class="row chat1">
    <h4 class="text-center bg-primary text-white my-3">CHATS</h4>
        <div class="col-md-8 mx-auto border chat">
            <?php 
                if(isset($_SESSION['mail'])) {
                    $mail = $_SESSION['mail'];
                    $SQL = "SELECT * FROM message WHERE NOT email = '$mail'";
                    $QUERY = mysqli_query($conn, $SQL);
                    while($row = mysqli_fetch_assoc($QUERY)) {   
                        $mail = $row['email'];  
                        $name = $row['name'];           
                        $mess = $row['mess'];           
            ?>
                <div class="mess">
                    <span>
                        <?php 
                            echo "<span class='font-weight-bold text-warning'>".$name."</span>". "<span class='text-white'>".$mess."</span>";
                        ?>
                    </span>
                </div> 
            <?php
                    }
                }
            ?>
            
            <?php 
                if(isset($_SESSION['mail'])) {
                    $mail = $_SESSION['mail'];
                    $SQL = "SELECT * FROM message WHERE email = '$mail'";
                    $QUERY = mysqli_query($conn, $SQL);
                    if(mysqli_num_rows($QUERY) > 0) {
                        while($row = mysqli_fetch_assoc($QUERY)) {
            ?>
                <div class="mess1"><span><?php echo $row['mess']; ?></span></div> <br>
            <?php
                        }
                    }
                }
            ?>
        </div>
        <div class="chat2">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
                <input type="text" name="Message" id="" placeholder="Message">
                <button name="send" class="btn btn-sm  btn-primary">SEND</button>
            </form>
        </div>
    </div>
</div>

<?php 
    include "das_Include/footer.php";
?>