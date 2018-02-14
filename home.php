<?php
    include 'db.php';
    include "config.php";
    session_start();
    if(!isset($_SESSION['first_name']))
        header('Location:login.php');
    // $query  = "SELECT books_249.name, books_249.auther, books_249.image, genre_book_249.genre_id
    // FROM 'books_249' INNER JOIN 'genre_book_249'
    // ON a.id=b.book_id;";
    // $query  = "SELECT name, auther, image
    // FROM 'books_249' ;";
    // INNER JOIN 'genre_book_249' AS
    // p ON u.id = p.book_id
    $query  = "SELECT u.name,u.id, u.auther, u.image, p.genre_id
    FROM `books_249` AS u INNER JOIN `genre_book_249` AS
    p ON p.book_id = u.id
    ORDER BY p.genre_id;";

    $model = mysqli_query($connection, $query);
    if(!$model) {
        die("DB query failed.");
    }


    // Adding the books by relevant genre
    $genre1 = "<article class='book_list'>";
    $genre2= "<article class='book_list'>";
    while($row = mysqli_fetch_assoc($model)) {

      switch ($row["genre_id"]) {
        case "2":
          $genre1.="<article><img src='".$row["image"]."'>"
          ."<a href='book.php?id=" . $row["id"] . "'><h3>"
          . $row["name"] . "/</h3><h4>".$row["auther"]."</h4></a>"
            . "</article>";
          break;
        case "18":
          $genre2.="<article><img src='".$row["image"]."'>"
          ."<a href='book.php?id=" . $row["id"] . "'><h3>"
          . $row["name"] . "/</h3><h4>".$row["auther"]."</h4></a>"
          . "</article>";
          break;
      }
    }
    $genre1.="</article>";
    $genre2.="</article>";

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
          <nav id="nav_bar">
            <ul>
              <li><a href="#" alt="User Details"><span>View<br>User Details</span></a></li>
              <li><a href="#" alt="Manage Waiting List"><span>Manage<br>Waiting List</span></a></li>
              <li><a href="#" alt="View Book Status"><span>View<br>Book Status</span></a></li>
              <li><a href="#" alt="Manage Books"><span>Manage<br>Books</span></a></li>
              <li><a href="#" alt="Settings"><span>Settings</span></a></li>
              <div id="clear"></div>
            </ul>
          </nav>
          <section class="display_none">
            <h1>Home</h1>
            <img id='menu_tap' src='images/menu.png' alt='Menu Logo'>
          </section>
          <section id="profile_img_section">
            <img id="profile_img" src=     <?php echo $_SESSION['profile_img'];?>      >
            <span> Hi <?php echo $_SESSION['first_name'];?>! </span>
          </section>
        </header>
        <main>
          <article id="main_desktop">
            <ul class="breadcrumb">
              <li><a href="home.php">Home</a></li>
            </ul>
            <section>
              <h2>Today's activity</h2>
              <ul>
                <li>Number of borrows: <span>11 </span> <a href="#">All Borrows</a></li>
                <li>Number of returns: <span>6 </span> <a href="#">All Returns</a></li>
                <li><span>35</span> Books are NOT AVAILABLE!</li>
                <li><span>2</span> New books have been added!</li>
                <li><a href="#">New Books</a></li>
              </ul>
            </section>
            <section>
              <h2>Statistics</h2>
              <img src="images/statistic.png" alt="Today's Statistics">
              <a href="#">Learn More</a>
            </section>
          </article>
          <article id="main_mobile">
            <h2>Recommended books:</h2>
            <section class="section_mobile" ><image src="images/i_drama.png" alt="Drama">Drama</section>
              <?php echo $genre1; ?>
            <section class="section_mobile"><image src="images/i_computer_science.png" alt="Computer Science">Computer Science</section>
              <?php echo $genre2; ?>
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
