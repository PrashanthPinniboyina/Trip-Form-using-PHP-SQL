<?php
$insert=false;

if(isset($_POST['name'])){

$servernName="localhost";
$userName="root";
$passWord="";

$connection=mysqli_connect($serverName,$userName,$passWord);
if(!$connection){
    die("connection to this database is failed due to ".mysqli_connect_error());
}
else{
    //echo "connection was successful";
}

$name=$_POST['name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$other=$_POST['other'];

$sql="INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp())";
//echo $sql;

if($connection->query($sql)==true){
   //echo "successfully inserted";
   $insert=true;
}
else{
    echo "ERROR: $sql <br> $connection->error";
}

$connection->close();

}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to Kashmir Trip Form</h1>
        <p>--- Enter  your  details  below  and  submit  this  form  to  confirm  your  Participation  in  trip ---</p>
        <?php
        if($insert==true){
        echo "<p class='submitMsg'><i>Thanks for submitting your form. we are happy to see you joining us for the US Kashmir trip.</i></p>";
        } 
        ?>
        <form action="index.php" method="post">
            Name : <br><input type="text" name="name" id="name" placeholder="Enter your name"><br>
            Age : <br><input type="number" name="age" id="age" placeholder="Enter your age"><br>
            Gender : <br><input type="text" name="gender" id="gender" placeholder="Enter your gender"><br>
            Email : <br><input type="email" name="email" id="email" placeholder="Enter your email"><br>
            Mobile No. : <br><input type="number" name="phone" id="phone" placeholder="Enter your phone number"><br>
            <textarea name="other" id="other" cols="30" rows="10" placeholder="enter any additional information here!"></textarea><br>
            <button class="btn">Submit</button>
             
        </form>
    </div>
    
    

    <script src="script.js"></script>
    
</body>
</html>