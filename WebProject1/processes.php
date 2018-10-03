<?php
$mysqli = new mysqli('localhost', 'root','','student') or die(mysqli_error(mysqli));

if(isset($_POST['submit'])){
    if($idrequired || $snrequired || $fnrequired || $grequired || $pnrequired || $dobrequired || $emrequired || $prrequired || $lerequired){
        $reply = '<div class="alert alert-danger center" role="alert">FILL ALL THE REQUIRED FIELDS!</div>';
    }else{
        $mysqli->query("INSERT INTO details(SURNAME,FIRST_NAME,OTHER_NAMES,ID,LEVEL_,DOB,HALL,PROGRAMME,PHONE_NO,E_MAIL,ADDRESS_,GUARDIAN_NAME,GUARDIAN_CONTACT,MARITAL_STATUS,GENDER,IMAGE_) VALUES('$surname','$firstname','$othername','$id','$level','$dob','$hall','$programme','$phonenum','$email','$address','$gname','$gcontact','$marital','$gender','$img')") or die($mysqli->error);
        //$conn->exec($sql);
        $reply = '<div class="alert alert-success" role="alert">NEW STUDENT SUCCESSFULLY ADDED!</div>';
    }
} 
