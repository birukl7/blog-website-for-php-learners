<?php
  include("database.php");
  session_start();
?>

<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["post"])){
      if(!empty($_POST["username"]) && !empty($_POST["title"]) && !empty($_POST["content"])){

        $username = $_POST["username"];
        $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');

        $title = $_POST["title"];
        $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');

        $content = $_POST["content"];
        $content = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');

        $keyWord = explode(" ", $title);
        $jsonKeyword = json_encode($keyWord);

        
          $imageToUpload = $_FILES["filetoupload"];
          $imageName = $imageToUpload["name"];
          $imageTemp = $imageToUpload['tmp_name'];
          

          $imageToUpload_separate = explode('.', $imageName);
          $imageExtension = strtolower(end($imageToUpload_separate));
          $target_folder = 'images/'.$imageName; 
          $extension = array('jpg', 'jpeg', 'png', 'svg', 'avif', 'webp', 'gif');
            if(in_array($imageExtension, $extension)){
              
              move_uploaded_file($imageTemp, $target_folder);
            }else {
              header("location: ../php-pages/image-validation.php");
            }

          $sql = "INSERT INTO `blog` (blog_title, content, image, keywords, publisher_name) VALUES('$title', '$content', '$target_folder', '$jsonKeyword', '$username')";
          mysqli_query($conn, $sql);
        
        
      }
    }
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/ee4b6626a1.js" crossorigin="anonymous"></script>
 
  <link rel="stylesheet" href="styles/general.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Itim&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,300;1,500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles/blog_home.css">
  <title>simple blog site</title>
</head>
<body>

  <header>
    <div class="container">
      <h1>your blog</h1>
      <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="get">
        <input type="search" name="search" id="search1" placeholder="search a blog">
        <input type="submit" value="search" name="search-btn" id="search2">
      </form>
    </div>
  </header>

  <?php
  if(isset($_GET["search-btn"])){
    $_SESSION["search"] = $_GET["search"];
    header("location: search.php");
  }
   
  ?>

  <div class="container">
    <main role="main">
      <div class="container-content wrapper">
        <?php

          $sql_second = "SELECT * FROM `blog`";
          $result = mysqli_query($conn, $sql_second);
          while($row = mysqli_fetch_assoc($result)){
            $imagedb = $row["image"];
            $datedb = $row["publication_date"];
            $namedb = $row["publisher_name"];
            $titledb = $row["blog_title"];
            $contentdb = $row["content"];
            echo '
            <div class="content-card">
            <div class="img-container">
              <img src='.$imagedb.' alt="">
              <div class="all-things-container">
                <div class="bottom-container">
                  <h3 class="title">'.$titledb.'</h3>
                  <div class="date">'.$datedb.' <strong>&#183;</strong> <span>'.$namedb.'</span> </div>
  
                  <article class="article-container">
                 '.$contentdb.'
                  </article>
                </div>
              </div>
            </div>
            
            <div class="interaction">
              <i class="fa-regular fa-thumbs-up" style="color: #000000"></i><span>3</span>
              <i class="fa-regular fa-thumbs-down" style="color: #000000;"></i><span>2</span>
              
            </div>
          </div>

                  ';
          }

        ?>

      </div>
    </main>
  </div>


    <footer>
      <div class="container">
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" id="first" enctype="multipart/form-data">
          <fieldset>
            <legend><h2>wanna blog something? </h2></legend>
            <label for="username">your name</label>
            <input type="text" name="username" id="username" required>
            <label for="title">write your title here</label>
            <input type="text" name="title" id="title" class="title-input" required>
            <label for="content1">your post's content</label>
            <textarea name="content" id="content1" cols="50" rows="10" required></textarea>
            <label for="file1">*optional* upload an image</label>
            <input type="file" name="filetoupload" id="file1">
           <input type="submit" value="post" name="post">

          </fieldset>

        </form>
      </div>

      <div class="bottom-footer">
        <h3>your blog</h3>
        <h5>&#169; copyright - Biruk Lemma</h5>
      </div>
    </footer>  
</body>
</html>

