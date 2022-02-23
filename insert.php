<?php
session_start();
include_once 'connect.php';

//-------------------------------LOGGING IN AS USER-----------------------------------//
if(isset($_POST["login_user"])){

    $inputemail = $_POST["email"]; //catching the elements
    $inputpassword = $_POST["password"];

    $compare = "SELECT * FROM user WHERE `EmailAddress`= '$inputemail' AND `Password`= '$inputpassword'"; //db
    $query = mysqli_query($conn, $compare);

    if($query){
        if(mysqli_num_rows($query)>0){
            $_SESSION['user_id'];
            $_SESSION['scan_cnt'];
            $_SESSION['exposure_cnt'];
            $_SESSION['positive'];

            if($row = mysqli_fetch_assoc($query)){
                $_SESSION['user_id']=$row['User ID'];
                $_SESSION['login'] = true;
                $id = $row['User ID'];
                
                $u_positive = "SELECT `status` FROM `swab_history` WHERE `user_id` = '$id'";
                $u_query = mysqli_query($conn, $u_positive);

                if($row1 = mysqli_fetch_assoc($u_query)){
                    if($row1['status'] == "positive"){
                        $_SESSION['positive'] = true;

                    }else{
                        $e_count = "SELECT `exposure_cnt` FROM `user` WHERE `User ID` = '$id'";
                        $e_query = mysqli_query($conn, $e_count);
                        if($row2 = mysqli_fetch_assoc($e_query)){
                            $_SESSION['exposure_cnt'] = $row2['exposure_cnt'];
                        }
                        
                        $h_count = "SELECT COUNT(*) AS `history` FROM scan_history WHERE `userID`='$id'";
                        $h_query = mysqli_query($conn, $h_count);
                        if(mysqli_num_rows($h_query)>0){
                            if($row3 = mysqli_fetch_assoc($h_query)){
                                $_SESSION['scan_cnt'] = $row3['history'];
                                $word=$_SESSION['scan_cnt'];
                            }
                        }
                    }
                    
                } else{
                    $e_count = "SELECT `exposure_cnt` FROM `user` WHERE `User ID` = '$id'";
                    $e_query = mysqli_query($conn, $e_count);
                    if($row2 = mysqli_fetch_assoc($e_query)){
                        $_SESSION['exposure_cnt'] = $row2['exposure_cnt'];
                    }
                    
                    $h_count = "SELECT COUNT(*) AS `history` FROM scan_history WHERE `userID`='$id'";
                    $h_query = mysqli_query($conn, $h_count);
                    if(mysqli_num_rows($h_query)>0){
                        if($row3 = mysqli_fetch_assoc($h_query)){
                            $_SESSION['scan_cnt'] = $row3['history'];
                            $word=$_SESSION['scan_cnt'];
                        }
                    }
                }
            }
        }
        
    }else{
        $_SESSION['fail']=true;
    }
    header("Location: login.php");
}
//-------------------------------LOGGING IN HOSPITAL-----------------------------------//

if(isset($_POST['login_hospital'])){
    $inputemail = $_POST["email"]; //catching the elements
    $inputpassword = $_POST["password"];

    $compare = "SELECT * FROM `hospital` WHERE `email`= '$inputemail' AND `h_password`= '$inputpassword'"; //db
    $query = mysqli_query($conn, $compare);

    if($query){
    
        if(mysqli_num_rows($query)>0){
            $_SESSION['user_id'];
        
            if($row = mysqli_fetch_assoc($query)){
                $_SESSION['user_id'] = $row['h_id'];
                $_SESSION['user_id'];
            }
            $_SESSION['login'] = true;
            header("Location: hospital.php");
        }else{
            $_SESSION['fail']= true;
            header("Location: login.php");
        }
    }else{
        $_SESSION['fail']= true;
        header("Location: login.php");
    }
   
}

//----------------------------LOGGING IN ESTABLISHMENT---------------------------//

if(isset($_POST['login_shop'])){
    $inputemail = $_POST["email"]; //catching the elements
    $inputpassword = $_POST["password"];

    $compare = "SELECT * FROM place WHERE `c_email`= '$inputemail' AND `c_password`= '$inputpassword'"; //db
    $query = mysqli_query($conn, $compare);

    if($query){
        if(mysqli_num_rows($query)>0){
            $_SESSION['user_id'];

            if($row = mysqli_fetch_assoc($query)){
                $_SESSION['user_id'] = $row['company_id'];
                $id = $row['company_id'];

                $h_count = "SELECT COUNT(*) AS `history` FROM scan_history WHERE `placeID`='$id'";
                $h_query = mysqli_query($conn, $h_count);
                if($row2 = mysqli_fetch_assoc($h_query)){
                    $_SESSION['scan_cnt'] = $row2['history'];
                }

                $e_count = "SELECT `exposure_cnt` FROM `place` WHERE `company_id` = '$id'";
                        $e_query = mysqli_query($conn, $e_count);
                        if($row3 = mysqli_fetch_assoc($e_query)){
                            $_SESSION['exposure_cnt'] = $row3['exposure_cnt'];
                        }
            }
        }
        $_SESSION['login'] = true;
        header("Location: place.php");
    }else{
        $_SESSION['fail']=true;
        header("Location: login.php");
    }
}

//--------------------------------CREATING A USER-------------------------------//
if (isset($_POST["registerBtn"])){ 
		
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $birthdate = $_POST['birthdate'];
    $age = $_POST['age'];
    $cnum = $_POST['cnum'];
    $email = $_POST['email']; 
    $password = $_POST['password']; 
    $cpassword = $_POST['cpassword'];
    $width = "250";
    $height = "250";
    $id = $cnum/100;
    $url = "https://chart.googleapis.com/chart?cht=qr&chs={$width}x{$height}&chl={$id}";
    // make sure the two passwords match
    if ($password === $cpassword){
        $insert = "INSERT INTO `user` (`User ID`,`FName`, `LName`, `Birthdate`, `Age`, `PhoneNumber`, `EmailAddress`, `Password`, `qr-code`)
                    VALUE ('$id','$fname', '$lname', '$birthdate', '$age', '$cnum', '$email','$password', '$url')";
                    
        // verify the user's account was created       
        if(mysqli_query($conn, $insert)){
            $_SESSION['created_acc'] = "true";
            header('location: login.php');
        }else{
            $_SESSION['created_acc'] = "false";
            header('location: form.php');
        }
    }else{
        $_SESSION['created_acc'] = "false";
        header('location: form.php');
    }
}

//----------------------------------Logout----------------------------------------//
if(isset($_POST['logout'])){
    session_destroy();
    header("Location: login.php");
}

//-------------------------------QR CODE SCANNED FOR USER----------------------------------//

if(isset($_POST['qrscanned'])){
    $text = $_POST['qrscanned'];
    $c_id = $_SESSION['user_id'];

    $insert = "INSERT INTO `scan_history` (`userID`, `placeID`, `date`, `time`) VALUES ('$c_id', '$text', NOW(), NOW())";

    if(mysqli_query($conn, $insert)){
        $_SESSION['scan_cnt']++;
        header("Location: POSITIVE.php");            
    }
}

//-------------------------------QR CODE SCANNED FOR SHOPS----------------------------------//

if(isset($_POST['qrscan'])){
    $text = $_POST['qrscan'];
    $c_id = $_SESSION['user_id'];

    $insert = "INSERT INTO `scan_history` (`userID`, `placeID`, `date`, `time`) VALUES ('$text', '$c_id', NOW(), NOW())";
    
    if(mysqli_query($conn, $insert)){
        $_SESSION['scan_cnt']++;
        header("Location: place.php");            
    }
}
//---------------------------Updating Hospital List------------------------------//
if(isset($_POST['h_update'])){
    $id_update = $_POST['h_update'];
    $status = $_POST['status'];
    $category = $_POST['category'];

    $update = "UPDATE `swab_history` SET `status`='$status', `category`='$category' WHERE `user_id`='$id_update'";

    if(mysqli_query($conn, $update)){
        if($status === "positive"){
            //updating  user exposure cnt
            $loop="SELECT `placeID` FROM `scan_history` WHERE `userID`='$id_update'";
            $loop_query =  mysqli_query($conn, $loop);

            if($loop_query){
                if(mysqli_num_rows($loop_query)>0){
                   
                    while($row = mysqli_fetch_assoc($loop_query)){
                        $place_id = $row['placeID'];
                        // $place_date = $row['date'];
                        // $var = date("Y-m-d", strtotime('-14 days', strtotime($date)));

                        $select_cnt = "SELECT DISTINCT `userID`
                            FROM `scan_history`
                            WHERE `placeID` = '$place_id'
                            AND `date` >= DATE_SUB(NOW(), INTERVAL 14 DAY)
                            AND `userID` != $id_update
                            GROUP BY `userID`";

                        $result = mysqli_query($conn, $select_cnt);

                        if($result){
                            if(mysqli_num_rows($result)>0){
                                while($row_result = mysqli_fetch_assoc($result)){
                                    $exp_id = $row_result['userID'];


                                    $update_cnt = "UPDATE `user`
                                            SET `exposure_cnt` = `exposure_cnt`+1 
                                            WHERE `User ID` = '$exp_id'";
                                    $updated = mysqli_query($conn, $update_cnt);

                                    $update_cnt = "UPDATE `place`
                                    SET `exposure_cnt` = `exposure_cnt`+1 
                                    WHERE `company_id` = '$place_id'";
                                    $updated = mysqli_query($conn, $update_cnt);
                                }
                                if($updated){
                                    header("Location: hospital.php");
                                }else{
                                    echo mysqli_error($conn);
                                }
                            }
                        }else{
                            echo mysqli_error($conn);
                        }
                    }
                }else{
                    header("Location: hospital.php");
                }
            }
         

        }else{

            header("Location: hospital.php");
        }
    }     
}

//---------------------------Adds to the Hospital List-------------------------//

if(isset($_POST['add'])){
    $id = $_SESSION['user_id'];
    $checked = $_POST['flexRadioDefault'];
    $adding = "INSERT INTO `swab_history` (`hospital_id`, `user_id`, `date`) VALUES ('$id', '$checked', NOW())";

    if(mysqli_query($conn, $adding)){
        header("Location: hospital.php");            
    }
}

?>