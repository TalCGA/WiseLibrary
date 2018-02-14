<?php
    include 'db.php';
    include "config.php";
    session_start();
    if(!isset($_SESSION['first_name']))
        header('Location:login.php');

    $query  = "SELECT u.name,u.id, u.auther, u.image, i.genre_name
    FROM `books_249` AS u INNER JOIN `genre_book_249` AS p
    ON u.id=p.book_id
    INNER JOIN `book_genre_249` AS i
    ON p.genre_id=i.id;";

    $model = mysqli_query($connection, $query);
    if(!$model) {
        die("DB query failed.");
    }


    // Adding the books randomly and Adding the genre to combolist
    $books = "<article class='book_list'>";
    while($row = mysqli_fetch_assoc($model)) {
          $books.="<article><img src='".$row["image"]."'>"
          ."<a href='book.php?id=" . $row["id"] . "'><h3>"
          . $row["name"] . "/</h3><h4>".$row["auther"]."</h4></a>"
          . "</article>";
          $geners.="<option value='".$row["genre_name"]."' value='book_category'>";
    }
    $books.="</article>";


    $_SESSION['book_category']=$_POST['browsers'];
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Wise Library</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,
    initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Alef" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Allerta" rel="stylesheet">
    <link rel="stylesheet" href="includes/style.css">

  </head>
  <body>
    <section id="device_background">
      <div id="wrapper_home">
        <header id="header_append">
          <a href="index.html" id="logo"></a>
          <nav id="nav_bar"></nav>
          <section id="profile_img_section">
            <img id="profile_img" src=     <?php echo $_SESSION['profile_img'];?>      >
            <span> Hi <?php echo $_SESSION['first_name'];?>! </span>
          </section>
        </header>
        <main  id="borrow_page">
          <article id="main_mobile">
            <section>
              <form action="borrow1.php" method="POST">
                <input type="text" name="by_name" placeholder="Search by book name">
                <input type="text" name="by_auther" placeholder="Search by an auther">
                <input list="browsers" name="by_category" placeholder="Search by an category">
                  <datalist id="browsers" name="browsers">
                    <?php echo $geners; ?>
                  </datalist>
              <input type="submit" value="">
            </form>
            </section>
            <?php echo $books; ?>
          </article>
        </main>
        <footer>
          <h3>WISE LIBRARY.<br>BORROW DIFFERENT.</h3>
          <br>
          <span>© 2018 Wise Library</span>
        </footer>
      </div>
  </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="includes/scripts.js"></script>
  </body>
</html>
<?php mysqli_free_result($model);?>
