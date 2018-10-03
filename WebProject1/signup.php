<?php
    try{
        /*$conn = new PDO("mysql:host=$servername; dbname=$db", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);*/
        $mysqli = new mysqli('localhost','root','','student') or die(mysqli_error(mysqli));
        
        $usrname = $name = $password = $email = '';
        $usrequired = $namerequired = $passrequired = $erequired = '';
        
        if(empty($_POST["usrname"])){
            $usrequired = "This field is required";
        }
        else{
            $usrname = $_POST["usrname"];
        }
        
        if(empty($_POST["name"])){
            $namerequired = "This field is required";
        }
        else{
            $name = $_POST["name"];
        }
        
        if(empty($_POST["password"])){
            $passrequired = "This field is required";
        }
        else{
            $password = $_POST["password"];
        }
        
        if(empty($_POST["email"])){
            $erequired = "";
        }
        else{
            $email =$_POST["email"];
        }
        
        if(isset($_POST['submit'])){            
            if(empty($usrname) || empty($password) || empty($name)){
                $reply = '<div class="alert alert-danger center" role="alert">FILL ALL THE REQUIRED FIELDS!</div>';
            }
            else{
                $mysqli = "INSERT INTO signup (USERNAME, NAME_, PASSWORD_, E_MAIL) VALUES ('$usrname', '$name', '$password', '$email')";
                #$conn->exec($sql);
                $reply = '<div class="alert alert-success" role="alert">ACCOUNT SUCCESSFULLY CREATED!</div>';

                header('location: index.php');
            }           
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
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
        <section class="col-lg-8 right wksp">
            <?php
                if(isset($reply)){
                    echo $reply;
                }
            ?>
            <div class='container'>            
            <div class="jumbotron center display-4">SignUp Form</div>
            <h5 class="center">Complete Form To Create An Admin Account.</h5><br/>
            <div class="col-lg-9 formspace">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <label for="usrname"><b>Username:</b><span class="red">*<?php echo $usrequired;?></span></label>
                    <input value="Username" type="text"  name="usrname" class="form-control"><br/>
                    <label for="name"><b>Name:</b><span class="red">*<?php echo $namerequired;?></span></label>
                    <input value="Name" type="text" name="name" class="form-control"><br/>
                    <label for="password"><b>Password:</b><span class="red">*<?php echo $passrequired;?></span></label>
                    <input value="Password" type="password" name="password" class="form-control"><br/>
                    <label for="email"><b>Email:</b><span class="red"><?php echo $erequired;?></span></label>
                    <input value="someone@example.com" type="email" name="email" class="form-control"><br/>
                    <input type="submit" name="submit" value="SignUp" class="btn btn-primary right">
                </form>
            <p>Already have an account? <a href="home.php" class="logout">Login Here.</a></p>
            </div>
            </div>
        </section>
        <div class="col-lg-8 bkg"></div>
    </body>
</html>