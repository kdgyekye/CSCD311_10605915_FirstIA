
<?php 
    $mysqli = new mysqli('localhost','root','','student') or die(mysqli_error(mysqli));
    $show = $mysqli->query("SELECT * FROM details") or die($mysqli->error);

    if (isset($_GET['edit'])){
        $id = $_GET['id'];
        $result $mysqli->query('SELECT * FROM data WHERE ID=$id') or die($mysqli->error());
        if (count($result)=1){
            $row = $result->fetch_array();
            $sname= $row['SURNAME'];
            $fname=$row['FIRST_NAME'];
            $oname=$row['OTHER_NAMES'];
            $id=$row['ID'];
            $level=$row['LEVEL_'];
            $dob=$row['DOB'];
            $hall=$row['HALL'];
            $pgrn=$row['PROGRAMME'];
            $phonenum=$row['PHONE_NO'];
            $email=$row['E_MAIL'];
            $address=$row['ADDRESS_'];
            $gname=$row['GUARDIAN_NAME'];
            $gcontact=$row'GUARDIAN_CONTACT'];
            $marital=$row['MARITAL_STATUS'];
            $gender=$row['GENDER'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <title>View student</title>
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
        .pdn{
            padding: auto;
        }
        .blink{
            color: whitesmoke;
        }
        .blink:hover{
            color: orange;
        }
    </style>
    
</head>
<body>
    <div class="container">
        <div id="top" class="jumbotron col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <header>
                <h1>STUDENT REGISTRY</h1>
            </header>
        </div>
        <div class="row justify-content center">
            <table class="table">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Surname</th>
                    <th>First Name</th>
                    <th>Other Name(s)</th>
                    <th>ID</th>
                    <th>Level</th>
                    <th>Date Of Birth</th>
                    <th>Hall</th>
                    <th>Programme</th>
                    <th>Phone No</th>
                    <th>E-mail</th>
                    <th>Address</th>
                    <th>Guardian's Name</th>
                    <th>Guardian's Contact</th>
                    <th>Marital Status</th>
                    <th>Gender</th>
                </tr>
            </thead>
            <?php
            while($row = $show->fetch_assoc()):?>
            <tr>
                <td class='btn btn-group-sm'>
                    <a href="add.php"?edit="<?php echo $row['ID']; ?>" class="btn btn-primary">Edit</a>
                    <a href="delete.php" ?delete="<?php echo $row['ID'];?>" class="btn btn-danger">Delete</a>
                </td>
                <td><?php echo $row['SURNAME'];?></td>
                <td><?php echo $row['FIRST_NAME'];?></td>
                <td><?php echo $row['OTHER_NAMES'];?></td>
                <td><?php echo $row['ID'];?></td>
                <td><?php echo $row['LEVEL_'];?></td>
                <td><?php echo $row['DOB'];?></td>
                <td><?php echo $row['HALL'];?></td>
                <td><?php echo $row['PROGRAMME'];?></td>
                <td><?php echo $row['PHONE_NO'];?></td>
                <td><?php echo $row['E_MAIL'];?></td>
                <td><?php echo $row['ADDRESS_'];?></td>
                <td><?php echo $row['GUARDIAN_NAME'];?></td>
                <td><?php echo $row['GUARDIAN_CONTACT'];?></td>
                <td><?php echo $row['MARITAL_STATUS'];?></td>
                <td><?php echo $row['GENDER'];?></td>
            </tr>
            <?php endwhile;?>
            </table>
        </div><br><hr>
    <div class="btn-group-lg float-right">
        <button class="btn btn-primary btn-sm" type="button"><a href="index.php" class="blink">Go to Homepage</a></button>
        <button class="btn btn-danger btn-sm" type="button"><a href="add.php" class="blink">Go back to Add Student</a></button>
    </div>
    </div>
</body>
    <?php
    function preview($array){
        echo '<pre>';
        print_r($array);
        echo '<pre>';
    }
    ?> 
    

</html>

