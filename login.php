<?php
      include 'db.php';
      include "config.php";

      session_start();
      if(!empty($_POST["email"])){
        $query="SELECT * FROM wise_library_users_249 WHERE email='"
        .$_POST["email"]
        ."' and password='"
        .$_POST["password"]
        ."'";

        $result = mysqli_query($connection , $query);
         $row = mysqli_fetch_array($result);

         if(is_array($row)) {
           $_SESSION['first_name']=$row['first_name'];
           $_SESSION['user_id']=$row['id'];
           $_SESSION['profile_img']=$row['profile_img'];
           header('Location: http://localhost/~Tal/WiseLibrary/home.php');
        } else {
         $message="Invalid UserName or Password!";
         }
      }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Wise Library</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,
    initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Alef" rel="stylesheet">
    <link rel="stylesheet" href="includes/style.css">

  </head>
  <body>
    <div id="wrapper_login">
      <section>
        <header>
          <a href="index.html" id="logo"></a>
        </header>
        <main>
          <form action="#" method="post" >
            <article>
              <span><?php if(isset($message)){echo $message;} ?></span>
              <span>Email address:</span>
              <input type="text" placeholder="Enter Email address" name="email" id="email" required>
              <span>Password:</span>
              <input type="password" placeholder="Enter Password" name="password" id="password" required>
            </article>
            <input type="submit" value="login" id="login_btn">
          </form>
        </main>
      </section>
      <footer>
      </footer>
    </div>
  </body>
</html>
<?php
//close DB connection
mysqli_close($connection);
?>
