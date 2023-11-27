<?php
  echo "<h1> Image extention is not supported. please upload JPEG, JPG, PNG, GIF, SVG, AVIF and WEBP extentions only.<h1>";
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
  <input type="submit" value="Go Back" name="goback">
</form>
</body>
</html>

<?php
  if(isset($_POST["goback"])){
    header("Location: ../blog_home.php");
  }
?>