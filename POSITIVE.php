<?php
  session_start();
  include 'connect.php';
  include 'navibar.php';
  if(isset($_SESSION['login'])){
    
?>

<!DOCTYPE html>
<html>

<head>
    <title>Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript" src="instascan.min.js"></script>
</head>

<style>
    /* div {
            border: 1px solid black;
        } */
    .big-container {
        width: 500px;
        height: 950px;
        margin: auto;
        background-color: white;
    }

    .row {
        background-color: #F1E6E3;
        width: 450px;
    }

    .col {
        background-color: white;
    }

    body {
        background-color: #F1E6E3;
    }
</style>

<body>
    <!------------- if positive ----------------->

    <?php if(isset($_SESSION['positive'])){ ?>
        <div class="big-container ">
        <div class="d-flex justify-content-center">
            <p class="fs-4 mt-2 fw-bold">YOUR COVID STATUS</p>
        </div>
        <div class="d-flex justify-content-center">
            <div class="row g-0 justify-content-evenly">
                <div class="col-4 my-2"><a class="btn btn-outline-danger">I AM COVID-19 <b>POSITIVE</b></a>
                </div>
            </div>
        </div>


        <center>
            <div class="my-1"><a href=""><img src="assets/pospos.jpeg" alt="Positive"></a></div>
        </center>
        <div class="container">
            <div class="row justify-content-evenly ms-2">
                <div class="col mt-4">
                <div class="card text-center">
                    <div class="card-header">
                        
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">What to do if you have COVID-19?</h5>
                        <p class="card-text">click the button below for more content</p>
                        <a href="remind.php" class="btn btn-primary">Click Here</a>
                    </div>
                    <div class="card-footer">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop5">
                            More Info
                        </button>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-------------------------------------------->
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop5" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <img src="assets/covidinfo1.jpg" class="d-block w-100" alt="covid1">
                                </div>
                                <div class="carousel-item">
                                <img src="assets/covidinfo2.jpg" class="d-block w-100" alt="covid2">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!------------------------------------------>
    <?php }else{ ?>

    <!------------- if negative ------------------>

    <div class="big-container ">
        <div class="d-flex justify-content-center">
            <p class="fs-4 mt-2 fw-bold">YOUR COVID STATUS</p>
        </div>
        <div class="d-flex justify-content-center">
            <div class="row g-0 justify-content-evenly">
                <div class="col-4 my-2"><a class="btn btn-outline-success">I AM COVID-19 <b>NEGATIVE</b></a>
                </div>
            </div>
        </div>


        <center>
            <div class="my-1"><a href=""><img src="assets/pos.png" alt="Negative"></a></div>
        </center>
        <center><a href="remind.php"><button class="rounded-pill p-2 px-5 my-4" >TAKE A SWAB TEST</button></a></center>
        <div class="container">
            <div class="row justify-content-evenly ms-2">
                <div class="col-4 my-1 p-2 px-3">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop1"><b> SCAN QR CODE</b></button>
                </div>
                <div class="col-4 my-1 p-2 px-3">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop2"><b>GENERATE QR CODE</b></button>
                </div>
            </div>
            <!----------Exposure Count---------->
            <div class="row d-flex justify-content-evenly my-1 ms-2">
                <div class="col-5 my-2 p-1">
                    <p><b>Your Potential Exposures</b> in the last days</p>
                </div>
                <div class="col-1 my-4 p-1">
                    <h3><b><?php 
                         print ($_SESSION['exposure_cnt']); 
                   ?></b></h3>
                </div>

                <div class="col-2 my-3 p-1"><a href="remind.php"><img src="assets/Group.png"></a></div>
            </div>

            <!----------History Count---------->
            <div class="row  d-flex justify-content-evenly my-1 ms-2">
                <div class="col-5 my-2 p-1">
                    <p><b>Your Location History</b> in the last days &nbsp;&nbsp;&nbsp;&nbsp;</p>
                </div>
                <div class="col-1 my-4 p-1">
                    <h3><b><?php
                        echo $_SESSION['scan_cnt']?></b></h3>
                </div>
                <div class="col-2 my-3 p-1"><a href="history.php"><img src="assets/history-svgrepo-com_2.png"></a></div>
            </div>
        </div>

    </div>
</body>

<!-- Modal -->
<!-----Scanning QRCode------>
<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <form action="insert.php" method="POST" id="forQRscanner">
                    <h5 class="modal-title" id="scanQRcodeLabel">QR Code Scanner</h5>
                    <input type="text" name="qrscanned" id="qrscanned" readonly="" class="form-control qr">
                </form>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <video id="preview" style="width: 465px;"></video>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--------Displaying QRCode--------->
<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                Your QR Code
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center">
                <?php $id = $_SESSION['user_id'];
                    $displayqr = "SELECT * FROM user WHERE `User ID` = '$id'";
                    $query = mysqli_query($conn, $displayqr);
                    if($query){
                        if(mysqli_num_rows($query)>0){
                            if($row = mysqli_fetch_assoc($query)){
                                $output=$row['qr-code'];
                            }
                        }
                    }
                ?>
                <img src="<?php echo $output?>" alt="QR Code">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<?php 
    }
?>

<!-----------------script for the modal-------------------->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function() {
    myInput.focus()
})
</script>


<!-----------------script for the scanner----------------->
<script type="text/javascript">
let scanner = new Instascan.Scanner({
    video: document.getElementById('preview')
});
Instascan.Camera.getCameras().then(function(cameras) {
    if (cameras.length > 0) {
        scanner.start(cameras[0]);
    } else {
        alert('no camera found');
    }
}).catch(function(e) {
    console.error(e);
});
scanner.addListener('scan', function(c) {
    document.getElementById('qrscanned').value = c;
    console.log(c);
    document.getElementById('forQRscanner').submit();
});
</script>


</html>
<?php } ?>