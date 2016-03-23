<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 

<?php
include_once 'postClass.php';

session_start();
// define variables and set to empty values
$titleErr = $priceErr = $locationErr = $descriptionErr = "";
$title = $price = $location = $description = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["title"])) {
     $titleErr = "Title is required";
   } else {
     $title = test_input($_POST["title"]);
     // check if title only contains letters and whitespace
     // if (!preg_match("/^[a-zA-Z ]*$/",$title)) {
     //   $titleErr = "Only letters and white space allowed"; 
     // }
   }
   
   if (empty($_POST["price"])) {
     $priceErr = "Price is required";
   } else {
     $price = test_input($_POST["price"]);
     // check if e-mail address is well-formed
/*     if (!filter_var($price, FILTER_VALIDATE_PRICE)) {
       $priceErr = "Invalid price format"; 
     }*/
   }

   if (empty($_POST["location"])) {
     $locationErr = "Location is required";
   } else {
     $location = test_input($_POST["location"]);
   }
     
   if (empty($_POST["description"])) {
     $descriptionErr = "Description is required";
   } else {
     $description = test_input($_POST["description"]);
     // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
/*     if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$description)) {
       $descriptionErr = "Invalid URL"; */
     }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>New Post</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   Title: <input type="text" name="title" value="<?php echo $title;?>">
   <span class="error">* <?php echo $titleErr;?></span>
   <br><br>
   Price: <input type="text" name="price" value="<?php echo $price;?>">
   <span class="error">* <?php echo $priceErr;?></span>
   <br><br>
   Location: <input type="text" name="location" value="<?php echo $location;?>">
   <span class="error">* <?php echo $locationErr;?></span>
   <br><br>
   Description: <textarea name="description" rows="5" cols="40"><?php echo $description;?></textarea>
   <span class="error">* <?php echo $descriptionErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Create"> 
</form>

<?php
if (isset($_POST['submit']) && empty($titleErr) && empty($priceErr) && empty($locationErr) && empty($descriptionErr))
    {
    $newPost = new Post($_POST['title'], $_POST['price'], $_POST['location'], $_POST['description']);
    // if (empty($_SESSION["posts"])) {
    //   $_SESSION["posts"] = array($newPost);
    // }
    // else {
      array_unshift($_SESSION["posts"], $newPost);
    //}
    // echo "<h2>Your Input:</h2>";
    // echo $_SESSION["posts"][0]->getTitle();
    // echo "<br>";
    // echo $_SESSION["posts"][0]->getPrice();
    // echo "<br>";
    // echo $_SESSION["posts"][0]->getLocation();
    // echo "<br>";
    // echo $_SESSION["posts"][0]->getDescription();
    session_write_close();
    echo  
    '<script type="text/javascript">
      window.location = "loggedInMain.php";
    </script>';    
    exit();
    }
?>

<!-- echo "<h2>Your Input:</h2>";
echo $title;
echo "<br>";
echo $price;
echo "<br>";
echo $location;
echo "<br>";
echo $description; -->

</body>
</html>