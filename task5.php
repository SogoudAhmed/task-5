<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}

</style>
</head>
<body>  

<?php

$nameErr = $emailErr = $genderErr = $LinkedInErr = $addressErr = $FileErr ="";
$name = $email = $LinkedIn = $address = $gender  = $File = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
    // 
      if (empty($_POST["LinkedIn"])) {
        $LinkedInErr = "LinkedIn is required";
      } else {
        $LinkedIn = test_input($_POST["LinkedIn"]);
      }
    
  if (empty($_POST["address"])) {
    $addressErr = "Email is required";
  } else {
    $address = test_input($_POST["address"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  // if (empty($_POST["File"])) {
  //   $FileErr = "file is required";
  // } else {
  //   $File = test_input($_POST["File"]);
  // }

  // if($_SERVER['REQUEST_METHOD'] == "POST"){

  if(!empty($_FILES['File']['name'])){

    $FileTmp   =  $_FILES['File']['tmp_name'];
    $FileName  =  $_FILES['File']['name'];
    $FileSize  =  $_FILES['File']['size'];
    $FileType  =  $_FILES['File']['type'];    
    
     $allowdEx  = ['pdf'];

     $TypeArray = explode('/',$FileType);

      if(in_array($TypeArray[1],$allowdEx)){
         // code 
      $FinalName = rand(1,100).time().'.'.$TypeArray[1];

      $disPath = './uploads/'.$FilalName;

        if(move_uploaded_file($FileTmp,$disPath)){
            echo 'File Uploaded';
        }else{
            echo 'Error Try Again';
        }         


      }else{
          echo 'Not Allowed Extension';
      }
    
      }else{

         echo 'CV  file Required';
      }
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Registration form</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  LinkedIn: <input type="text" name="LinkedIn">
  <span class="error">* <?php echo $LinkedInErr;?></span>
  <br><br>  
  address: <input type="text" name="address">
  <span class="error">* <?php echo $addressErr;?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>
  <br>  <br>

  <div class="container">
  < action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-da 
   <div class="form-group">
       <label for="exampleInputPassword1">file</label>
       <input type="file" name="File">
   </div>
   <br>
  <input type="submit" name="submit" value="Submit">  
  </form>


<?php
echo "<h2>Review Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $LinkedIn;
echo "<br>";
echo $address;
echo "<br>";
echo $gender;
echo "<br>";
echo $File;

$file = fopen("file.txt", "w") or die("Unable to open file!");
$txt = "Welcome You\n";
fwrite($file, $txt);
fclose($file);


?>

</body>
</html>