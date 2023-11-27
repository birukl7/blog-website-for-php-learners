<?php
  echo "You couldn't Connect."
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reload</title>
</head>
<body>
  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <input type="submit" value="Reload" name="reload">
  </form>
</body>
</html>

<?php
  if(isset($_POST["reload"])){
    header("location: ../blog_home.php");
  }
?>