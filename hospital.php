<?php
    session_start();
    include 'connect.php';
    if(isset($_SESSION['login'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<style>
    /* div {
        border: 1px solid black;
    } */
    .big {
        margin-top: 100px;
    }
    .category{
        width: 300px;
        height: 350px;
        background-color: white;
    }

    @media screen and (max-width: 1500px) {
        .container {
            width: 100%;
        }

        .res {
            width: 100%;
        }
    }
</style>
<nav>
    <div class="d-flex flex-row-reverse bd-highlight mt-3 me-4">
        <form action="insert.php" method="POST">
            <button class="logout fs-5" type="submit" name="logout">Logout</button>
        </form>
    </div>
</nav>
<body style="background-color:#F1E6E3;">
<div class="row">
    <div class="col-3 mt-5">
        <div class="container big category">
            <p class="card-title text-center lead text-gray-800 my-5 fs-3">Category Legend:</p>
            <ul>
                <li class="mb-2 fs-5">assymptomatic</li>
                <li class="mb-2 fs-5">mild</li>
                <li class="mb-2 fs-5">severe</li>
                <li class="mb-2 fs-5">critical</li>
                <li class="mb-2 fs-5">dead</li>
            </ul>
        </div>
    </div>

    <div class="col-9">
        <div class="container big">
            <div class="card text-center">
                <div class="card-header" style="background-color:#F9DCD4;">
                    <nav class="nav nav-tabs card-header-tabs">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
                            <button class="nav-link" id="nav-hospital-tab" data-bs-toggle="tab" data-bs-target="#nav-hospital" type="button" role="tab" aria-controls="nav-hospital" aria-selected="false">Your List</button>
                        </div>
                    </nav>
                </div>
                <div class="card-body text-start">
                    <div class="tab-content" id="nav-tabContent">

                        <!-- YOUR Home -->
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row mb-2">
                                <div class="col pb-4">
                                    <div class="card">
                                        <div class="card-body text-start">
                                            <p class="card-title text-center lead text-gray-800 my-5 fs-1">WELCOME TO SOVA!</p>
                                            <p class="card-text text-center lead text-gray-800 fs-3">Systematic Observation for Verification and Assessment</p>
                                            <p class="card-text text-center lead text-gray-800 fs-5">An easy-to-use system that provides aid in the process of contract tracing in various communities.<br>
                                            This system allows you to easily handle and update a patient's covid status<br>
                                            That automatically reflects unto the patients's information<br>
                                            And notify them their current health status</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Hospital List -->
                        <div class="tab-pane fade" id="nav-hospital" role="tabpanel" aria-labelledby="nav-hospital-tab">
                        <div class="card">
                            <div class="card-header"><p class="text-center lead text-gray-800 my-2">Covid Swab Record</p></div>
                            <div class="card-body">
                                <?php
                                $user_id = $_SESSION['user_id'];
                                $sql = "SELECT * FROM `swab_history` LEFT JOIN `user` ON `user`.`User ID` = `swab_history`.`user_id`
                                        WHERE `hospital_id` = '$user_id' ";

                                $query = mysqli_query($conn, $sql);
                                ?>
                                <?php if ($query) {
                                    if( mysqli_num_rows($query) > 0) { ?>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="table-light">
                                                    <td> Patient Name </td>
                                                    <td> Birthdate </td>
                                                    <td> Age </td>
                                                    <td> Cellphone no. </td>
                                                    <td> Email </td>
                                                    <td> Status </td>
                                                    <td> Category </td>
                                                    <td> </td>
                                                </thead>
                                            <?php while($items = mysqli_fetch_assoc($query)){ ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $items['FName']." ".$items['LName']?></a></td>
                                                        <td><?php echo $items['Birthdate'] ?></td>
                                                        <td><?php echo $items['Age'] ?></td>
                                                        <td><?php echo $items['PhoneNumber'] ?></td>
                                                        <td><?php echo $items['EmailAddress'] ?></td>
                                                        <form action="insert.php" method="post">
                                                            <td><input type="text" class="form-control text-center" name="status" value="<?php echo $items['status']?>"/></td>
                                                            <td><input type="text" class="form-control text-center" name="category" value="<?php echo $items['category']?>"/></td>
                                                        <td><button type="submit" class="btn btn-primary" name="h_update" value="<?php echo $items['user_id'] ?>" >Update</button></td>
                                                    </tr>
                                                </tbody>
                                            <?php } ?>
                                            </table>
                                        </div>
                                    <?php } ?>
                                <?php } else { ?>
                                    <p class="text-center">SOVA currently has no users</p>
                                <?php } ?>
                            </div>
                                    </form>
                                    <!-- Button trigger modal -->
                                <div class="container d-flex justify-content-center mb-3">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</button>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!---------Module for Adding---------->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <?php
           $select = "SELECT * FROM `user`"; 
           $query = mysqli_query($conn, $select);

           if($query){
               if(mysqli_num_rows($query)>0){
                   ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <td> </td>
                                <td> Name </td>
                                <td> Birthdate </td>
                                <td> Age </td>
                                <td> Cellphone no. </td>
                                <td> Email </td>
                            </thead>
                   <?php
                   while($row=mysqli_fetch_assoc($query)){
                    ?>
                         <tbody>
                             <form action="insert.php" method="post">
                            <tr>
                                <td><div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" value="<?php echo $row['User ID'] ?>" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1"></label>
                                    </div></td>
                                <td><?php echo $row['FName']." ".$row['LName']?></a></td>
                                <td><?php echo $row['Birthdate'] ?></td>
                                <td><?php echo $row['Age'] ?></td>
                                <td><?php echo $row['PhoneNumber'] ?></td>
                                <td><?php echo $row['EmailAddress'] ?></td>
                            </tr>
                        </tbody>
                    <?php 
                   }
                   ?>
                        </table>
                   </div>
                   <?php
               }
           }
           ?>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="add">Add</button>
            </form>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
    
    <!---------Category STatus---------->
 
    <script>
        var triggerTabList = [].slice.call(document.querySelectorAll('#nav-tab button'))
        triggerTabList.forEach(function(triggerEl) {
            var tabTrigger = new bootstrap.Tab(triggerEl)

            triggerEl.addEventListener('click', function(event) {
                event.preventDefault()
                tabTrigger.show()
            })
        })
    </script>
    <!-----------------script for the modal---S----------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
    </script>

</body>
    </div>
</body>
</html>
<?php } ?>