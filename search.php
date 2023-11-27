<?php
  session_start();
  include("database.php");
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
  <title>Search a blog</title>
</head>
<body>
  <header>
    <div class="container">
      <h1>your blog</h1>
      <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <input type="submit" value="Go Back" name="goback" id="search2">
     
    </div>
  </header>
  <?php
    if(isset($_POST["goback"])){
      header("location: blog_home.php");
    }
  ?>

  <div class="container">
    <main role="main">
      <div class="container-content wrapper">
        <?php
          function conLow($array) {
            return array_map('strtolower', $array);
          }

          $search_result = explode(" ", $_SESSION["search"]);
          $search_result = conLow($search_result);


          function hasCommonValue($array1, $array2){
            $commonValue = array_intersect($array1, $array2);
            return !empty($commonValue);
          }
          
          $is_found = false;
          $sql_second = "SELECT * FROM `blog`";
          $result = mysqli_query($conn, $sql_second);
            
              while($row = mysqli_fetch_assoc($result)){
                $imagedb = $row["image"];
                $datedb = $row["publication_date"];
                $date_array = explode("-", $datedb);
                $namedb = $row["publisher_name"];
                $publisher_array = explode(" ", $namedb);
                $publisher_array = conLow($publisher_array);

                $titledb = $row["blog_title"];
                $contentdb = $row["content"];
                $jsonArray = json_decode( $row["keywords"], true);
                $jsonArray = conLow($jsonArray);
                $content_separate = explode(" ", $contentdb);
                $content_separate = conLow($content_separate);
                $concat_keywords = array_merge($jsonArray, $content_separate, $publisher_array, $date_array);
                 if(hasCommonValue($search_result, $concat_keywords)){
                  $is_found = true;
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

              }

              if(!$is_found){
                echo "<h1 style=\" color: red;\"> Data is not found.</h1> <br>";
              }
        ?>

      </div>
    </main>
  </div>

  <footer>
      <div class="bottom-footer">
        <h3>your blog</h3>
        <h5>&#169; copyright - Biruk Lemma</h5>
      </div>
  </footer>

</body>
</html>
<?php
  session_destroy();
?>
