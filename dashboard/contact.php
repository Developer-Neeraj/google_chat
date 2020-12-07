<?php 
    include "das_Include/header.php";
    if(isset($_SESSION['mail'])) {
        $sql = "SELECT * FROM registeration";
        $query = mysqli_query($conn, $sql);
    }
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 m-auto">
        <h4 class="bg-primary my-3 py-1 text-white text-center">OUR CONTACT</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">City</th>
                        <th scope="col">Join Date</th>
                        <th scope="col">details</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    while($row = mysqli_fetch_assoc($query)) {
                ?>
                    <tr>
                        <th scope='row'><?php echo $row['name']; ?></th>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['date_time']; ?></td>
                        <td><a href="#">....</a></td>
                    </tr>
                <?php 
                    } 
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 
    include "das_Include/footer.php";
?>