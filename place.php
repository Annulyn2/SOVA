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
        width: 550px;
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
    <div class="big-container">
        <div class="d-flex justify-content-center">
            <p class="fs-4 mt-2 fw-bold">Welcome to SOVA</p>
        </div>
        
        <center>
            <div class="my-1"><a href=""><img src="assets/sovalogo-negative.png" alt="Positive"></a></div>
        </center>
        <div class="container mt-4 ms-4">
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
            <div class="row  d-flex justify-content-evenly my-1 ms-2">
                <div class="col-5 my-2 p-1">
                    <p><b>Your Scan History</b> in the last days &nbsp;&nbsp;&nbsp;&nbsp;</p>
                </div>
                <div class="col-1 my-4 p-1">
                    <h3><b><?php echo $_SESSION['scan_cnt']; ?></b></h3>
                </div>
                <div class="col-2 my-3 p-1"><a href="history2.php"><img src="assets/history-svgrepo-com_2.png"></a></div>
            </div>
            <!----------History Count---------->
            <div class="row  d-flex justify-content-evenly my-1 ms-2">
                    <div class="col-5 my-2 p-1">
                        <p><b>Possible Exposure</b> in the last days &nbsp;&nbsp;&nbsp;&nbsp;</p>
                    </div>
                    <div class="col-1 my-4 p-1">
                        <h3><b><?php echo $_SESSION['exposure_cnt']; ?></b></h3>
                    </div>
                    <div class="col-2 my-3 p-1"><a href="history3.php"><img src="assets/history-svgrepo-com_2.png"></a></div>
                </div>
            </div>
        </div>
        

<!-- Modal -->
<!-----Scanning QRCode------>
<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <form action="insert.php" method="POST" id="forQRscan">
                    <h5 class="modal-title" id="scanQRcodeLabel">QR Code Scanner</h5>
                    <input type="text" name="qrscan" id="qrscan" readonly="" class="form-control qr">
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
                    $displayqr = "SELECT * FROM place WHERE `company_id` = '$id'";
                    $query = mysqli_query($conn, $displayqr);
                    if($query){
                        if(mysqli_num_rows($query)>0){
                            if($row = mysqli_fetch_assoc($query)){
                                $output=$row['c_qrcode'];
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
<!-----------------script for the modal---S----------------->
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
    document.getElementById('qrscan').value = c;
    console.log(c);
    document.getElementById('forQRscan').submit();
});
</script>


</html>

<?php } ?>