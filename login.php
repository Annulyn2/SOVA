<?php
    session_start();
    include_once('connect.php');

    if(isset($_SESSION['login'])){
        header("Location: POSITIVE.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
    
    <title>Login</title>

</head>
<style>
    .body-login{
        background-color: #F1E6E3;
    }
    .big{
        width: 500px;
        height: 800px;
        background-color: #F1E6E3;
    }
    a{
        text-decoration: none;
    } /*we can put it in css file*/
    /* div {
        border: 1px solid black;
    } */
    .img{
        width: 500px;
        height: 500px;
    }

    .word {
        color: #D69461;
    }
</style>

<body class="body-login"  style="background-color:#F1E6E3;">
<div class="container big mt-4">
    
    <?php if(isset($_SESSION['created_acc'])){ ?>
        <div class="alert alert-success d-flex align-items-center" role="alert">
        <div>You have succesfully created your account. Please login to access your account.</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

   <?php } 
  
    if(isset($_SESSION['fail'])){ ?>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
        <div>Sorry, something went wrong, please try again</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

   <?php } ?>

    <div class="row d-flex justify-content-center">
    <img class="img" src="assets/SOVAnewcover.png" alt="SOVA logo">
    </div>
    <form action="insert.php"  method="POST">
        <div class="my-3">
            <input type="text" class="form-control" name="email" placeholder="Email address" required>
        </div>
        <div class="my-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
    <?php
        if(isset($_POST['submit'])){ 
            $user = $_POST['flexRadioDefault'];
            if($user == 1){
            ?>
            <div class="my-3">
            <button class="btn btn-danger col-sm-12" type="submit" name="login_user">Login</button>
            <hr>
            </div>
    <?php   } else if($user == 2){ ?>
            <div class="my-3">
            <button class="btn btn-warning col-sm-12" type="submit" name="login_shop">Login</button>
            <hr>
            </div>
    <?php } else { 
    ?>
        <div class="my-3">
            <button class="btn btn-success col-sm-12" type="submit" name="login_hospital">Login</button>
            <hr>
        </div>
    <?php }
        }else{ ?>
        <div class="my-3">
            <button class="btn btn-danger col-sm-12" type="submit" name="login_user">Login</button>
            <hr>
        <?php } ?>
        <div class = "text-center">
        Don't have an account? 
        <a href="form.php">Sign up</a>
        <br>
        </div>
        <div class = "text-center mt-2">
            Different type of user? Click the button below
        </div>
        <div class="container mt-4 d-flex justify-content-center">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop1">Click here</button>
            </div>
        </div>
        </div>
    </form>

    </div>

    <!----------modal for the different user category--------->
    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    User Category
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="" method="POST">
                    <p class="card-text text-center lead text-gray-800 fs-5">choose between the three bellow: </p>
                    <div class="container d-flex justify-content-center">
                        <div class="row mt-3">
                            <div class="col mx-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" value="1" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        <span class="iconify mt-2" data-icon="clarity:assign-user-line" style="color: #d69461;" data-width="40" data-height="40" ></span>
                                        <p class="card-text text-center lead text-gray-800 fs-6 mt-3">general user</p>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col mx-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" value="2" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        <span class="iconify btn" data-icon="fluent:building-shop-24-regular" style="color: #d69461;" data-width="68" data-height="68" ></span>
                                        <p class="card-text text-center lead text-gray-800 fs-6">establishment</p>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col mx-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" value="3" id="flexRadioDefault3">
                                    <label class="form-check-label" for="flexRadioDefault3">
                                        <span class="iconify btn" data-icon="iconoir:home-hospital" style="color: #d69461;" data-width="68" data-height="68"></span></span>
                                        <p class="card-text text-center lead text-gray-800 fs-6">hospital</p>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php if(isset($_POST['submit'])){ unset($_POST['submit']); } ?>
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal" name="submit">Submit</button>
                </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-----------------script for the modal------------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
    </script>

</body>
<script>

    var alertList = document.querySelectorAll('.alert')
    var alerts =  [].slice.call(alertList).map(function (element) {
    return new bootstrap.Alert(element)
    })
</script>
</html>