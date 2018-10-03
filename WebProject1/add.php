
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <title>Add student</title>
    <link rel="stylesheet" href="css/regStyle.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">

    <style>
        .red{
            color: red;
            font-size: small;
        }
    </style>
    
</head>
<body>
<?php
    session_start();
    $mysqli = new mysqli('localhost', 'root','','student') or die(mysqli_error(mysqli));

    $id = $surname = $firstname = $othername = $gender = $phonenum = $dob = $email = $address = $img = $programme = $hall = $gname = $gcontact = $marital = $level = '';

    $idrequired = $snrequired = $fnrequired = $onrequired = $grequired = $pnrequired = $dobrequired = $emrequired = $adrequired = $imgrequired = $prrequired = $harequired = $gnrequired = $gcrequired = $marequired = $lerequired = '';

    try{
        if(empty($_POST["id"])){
            $idrequired = "This field is required";
        }else{
            $id = $_POST["id"];
        }

        if(empty($_POST["sname"])){
            $snrequired = "This field is required";
        }else{
            $surname =$_POST["sname"];
        }

        if(empty($_POST["fname"])){
            $fnrequired = "This field is required";
        }else{
            $firstname = $_POST["fname"];
        }

        if(empty($_POST["oname"])){
            $onrequired = "";
            $othername = "";
        }else{
            $othername = $_POST["oname"];
        }

        if(empty($_POST["gender"])){
            $grequired = "This field is required";
        }else{
            $gender = $_POST["gender"];
        }

        if(empty($_POST["phone"])){
            $pnrequired = "This field is required";
        }else{
            $phonenum = $_POST["phone"];
        }

        if(empty($_POST["dob"])){
            $dobrequired = "This field is required";
        }else{
            $dob = $_POST["dob"];
        }

        if(empty($_POST["email"])){
            $emrequired = "This field is required";
        }else{
            $email = $_POST["email"];
        }

        if(empty($_POST["address"])){
            $adrequired = "";
            $address = "";
        }else{
            $address = $_POST["address"];
        }

        if(empty($_POST["image"])){
            $imgrequired = "";
            $img = "";
        }else{
            $img = $_POST["image"];
        }

        if(empty($_POST["programme"])){
            $prrequired = "This field is required";
        }else{
            $programme = $_POST["programme"];
        }

        if(empty($_POST["hall"])){
            $harequired = "";
            $hall = "";
        }else{
            $hall = $_POST["hall"];
        }

        if(empty($_POST["gname"])){
            $gnrequired = "";
            $gname ="";
        }else{
            $gname = $_POST["gname"];
        }

        if(empty($_POST["gcontact"])){
            $gcrequired = "";
            $gcontact ="";
        }else{
             $gcontact= $_POST["gcontact"];
        }

        if(empty($_POST["marital"])){
            $marequired = "";
            $marital = "";
        }else{
            $marital = $_POST["marital"];
        }

        if(empty($_POST["level"])){
            $lerequired = "This field is required";
        }else{
            $level = $_POST["level"];
        }
        
        if(isset($_POST['submit'])){
            if($idrequired || $snrequired || $fnrequired || $grequired || $pnrequired || $dobrequired || $emrequired || $prrequired || $lerequired){
                $reply = '<div class="alert alert-danger center" role="alert">FILL ALL THE REQUIRED FIELDS!</div>';
            }else{
                $mysqli->query("INSERT INTO details(SURNAME,FIRST_NAME,OTHER_NAMES,ID,LEVEL_,DOB,HALL,PROGRAMME,PHONE_NO,E_MAIL,ADDRESS_,GUARDIAN_NAME,GUARDIAN_CONTACT,MARITAL_STATUS,GENDER,IMAGE_) VALUES('$surname','$firstname','$othername','$id','$level','$dob','$hall','$programme','$phonenum','$email','$address','$gname','$gcontact','$marital','$gender','$img')") or die($mysqli->error);
                //$conn->exec($sql);
                $reply = '<div class="alert alert-success" role="alert">NEW STUDENT SUCCESSFULLY ADDED!</div>';
                $_SESSION['message']="Record has been saved"; 
                $_SESSION['msg_type']="success";
            }
        } 

        if (isset($_GET['delete'])){
            $id = $_GET['delete'];
            $mysqli->query("DELETE FROM details where ID=$id") or die($mysqli->error());
        }        
    }
    catch(PDOException $e){
        echo $sql . "<br/>" . $e->getMessage();
    }
?>
<?php 
    if (isset($_SESSION['message'])):?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
            echo $_SESSION['message'];
            unset ($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>
    <div class="container">
<div id="top" class="jumbotron col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <header>
        <h1>ADD STUDENT</h1>
    </header>
</div>

<div id="navigation" class="float-left nav-tabs col-lg-3 col-md-4 col-sm-8 col-xs-12">
        <table cellspacing="4">
            <thead id="head"><h4><b>Navigation</b></h4></thead>
            <tr>
                <td><a href="add.php">Add Student</a></td>
            </tr>
            <tr>
                <td><a href="edit.php">Edit Student Details</td>
            </tr>
            <tr>
                <td><a href="Delete.php">Delete Student Details</td>
            </tr>
            <tr>
                <td><a href="view.php">View All Students</td>
            </tr>
        </table>
    </div>

<div class="float-right tab-content col-lg-8"  id="regForm" role="form">
        <div class="form-row">
            <div class="col">
                <h4 class="modal-header" id="formHead">Enter Student Details Here</h4>
            </div>
        </div>
    <form id="add" method="post" action="add.php" class="form-group">
        <div class="form-row">
            <div class="col">
                <label for="sname"><b>Surname</b><span class="red">*<?php echo $snrequired;?></span></label>
                <input name="sname" id="sname" type="text" class="form-control col-lg-12" required>
            </div>
            <div class="col">
                <label for="fname"><b>First Name</b><span class="red">*<?php echo $fnrequired;?></span></label>
                <input name="fname" id="fname" type="text" class="form-control col-lg-12" required>
            </div>
            <div class="col">
                <label for="oname"><b>Other Name(s)</b><span class="red"><?php echo $onrequired;?></span></label>
                <input name="oname" id="oname" type="text" class="form-control col-lg-12">
            </div>
        </div><br>
        <div class="form-row">
            <div class="col">
                <label for="id"><b>ID</b><span class="red">*<?php echo $idrequired;?></span></label>
                <input name="id" id="id" type="text" class="form-control col-lg-12" required>
            </div>
            <div class="col">
                <label for="dob"><b>Date Of Birth</b><span class="red">*<?php echo $dobrequired;?></span></label>
                <input name="dob" id="dob" type="date" class="form-control col-lg-12" required>
            </div>
        </div><br>
        <div class="form-row">
            <div class="col">
                <label for="gender"><b>Gender</b><span class="red">*<?php echo $grequired;?></span></label>
                <select id="gender" name="gender" class="form-control col-lg-8" required>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="col">
                <label for="pgr"><b>Programme</b><span class="red">*<?php echo $prrequired;?></span></label>
                <input name="programme" id="pgr" type="text" class="form-control col-lg-12">
            </div>
        </div><br/>
        <div class="form-row">
            <div class="col">
                <label for="hall"><b>Hall Of Residence</b><span class="red"><?php echo $harequired;?></span></label>
                <input name="hall" id="hall" type="text" class="form-control col-lg-12">
            </div>
            <div class="col">
                <label for="level"><b>Level</b><span class="red">*<?php echo $lerequired;?></span></label>
                <select class="col-lg-8 form-control" id="level" name="level">
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="300">300</option>
                    <option value="400">400</option>
                    <option value="Postgraduate">Postgraduate</option>
                </select>
            </div>
        </div><br>
        <div class="form-row">
            <div class="col">
                <label for=email><b>E-mail</b><span class="red">*<?php echo $emrequired;?></span></label>
                <input name="email" id="email" type="text" class="form-control col-lg-12">
            </div>
            <div class="col">
                <label for="phone"><b>Phone Number</b><span class="red">*<?php echo $pnrequired;?></span></label>
                <input name="phone" id="phone" type="text" class="form-control col-lg-12">
            </div>
        </div><br>
        <div class="form-row">
            <div class="col">
                <label for=gname><b>Guardian's Name</b><span class="red"><?php echo $gnrequired;?></span></label>
                <input name="gname" id="gname" type="text" class="form-control col-lg-12">
            </div>
            <div class="col">
                <label for=gcontact><b>Guardian's Contact</b><span class="red"><?php echo $gcrequired;?></span></label>
                <input name="gcontact" id="gcontact" type="text" class="form-control col-lg-12">
            </div>
        </div><br>
        <div class="form-row">
            <div class="col">
                <label for=marital><b>Marital Status</b><span class="red"><?php echo $marequired;?></span></label>
                <select class="col-lg-8 form-control" id="marital" name="marital">
                    <option value="married">Married</option>
                    <option value="single" selected>Single</option>
                </select>
            </div>
            <div class="col">
                <label for=address><b>Address</b><span class="red"><?php echo $adrequired;?></span></label>
                <input name="address" id="address" type="text" class="form-control col-lg-12">
            </div>
        </div><br>
        <div class="form-row">
            <div class="col">
                <label for="image"><b>Profile Image</b><span class="red"><?php echo $imgrequired;?></span></label>
                <input type="file" name="image" id="image" class="custom-file form-controlc col-lg-12">
            </div>
        </div><br>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary right">
        <hr>
    </form>
    </div>
    </div>
<script src="js/bootstrap.bundle.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>