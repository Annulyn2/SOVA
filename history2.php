<?php
session_start();
include 'connect.php';
include 'navibar.php';
if(isset($_SESSION['login'])){

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
    <title>History</title>
</head>
<style>
    /*div {
        border: 1px solid black;
    }*/

    .container {
        width: 800px;
        height: 800px;
    }

    @media screen and (max-width: 800px) {
        .container {
            width: 100%;
        }
    }
</style>

<body style="background-color:#F1E6E3;">
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-center" style="background-color:#F9DCD4;">
                Your History
            </div>
            <div class="card-body">
            <?php
                    $user_id = $_SESSION['user_id'];
                    $history = "SELECT * FROM `scan_history` JOIN `user` ON `scan_history`.`userID`=`user`.`User ID` WHERE `placeID` = '$user_id' ORDER BY `date` ASC";
                    $query = mysqli_query($conn, $history);

                    if($query){
                        if( mysqli_num_rows($query) > 0){ ?>
                            <div class="table-responsive">
                                    <table class="table">
                                        <thead class="table-light">
                                            <td> Date </td>
                                            <td> Name </td>
                                            <td> Age </td>
                                            <td> Phone# </td>
                                            <td> Email </td>
                                            <td> Time </td>
                                        </thead>
                                        <tbody>
                        <?php
                            while($items = mysqli_fetch_assoc($query)){ 
                                ?>
                                 
                                    <tr>
                                        <td><?php echo date("D, M d Y", strtotime($items['date'])); ?> </td>
                                        <td><?php echo $items['FName']." ".$items['LName']?></td>
                                        <td><?php echo $items['Age']; ?> </td>
                                        <td><?php echo $items['PhoneNumber']; ?> </td>
                                        <td><?php echo $items['EmailAddress']; ?> </td>
                                        <td><?php echo date("h:i A",  strtotime($items['time'])); ?> </td>
                                    </tr>
                            <?php 
                                }
                            }
                        ?>
                                </tbody>
                            </table>
                        </div>

                    <?php } else { ?>
                        <p class="text-center lead text-gray-800 my-5">There has been no customers yet!</p>
                    <?php } ?>
                <div>

                </div>
            </div>
        </div>
    </div>
    <div class="conatiner d-flex justify-content-center mt-5">
	<form>
		<span class="iconify" data-icon="bi:arrow-left-circle" data-width="50" data-height="50" type="button" value="Go back!" onclick="history.back()">
		</span>
	</form>
	</div>
</body>

</html>
<?php } ?>