<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include("$root/php/connection.php"); // coonection db
session_start();

if (isset($_POST['start_sql_request'])) {
    $numeral_id_user = $_SESSION['id'];
}

?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/php/css/container.css">

    <title>Numeral</title>
  </head>

  <style media="screen">
    .sql_request {
    height: 100px;
    width: : 100px;
    }
  </style>

  <body>

  <?php include("$root/php/container.php"); ?>
<div class="inted">


    <p>Please write SQL request to return</p>
      <p>SELECT * FROM `skyeng_numeral` WHERE `numeral_name`='<?php
       $i = rand(0, 100);
          $numeral_tb = mysqli_query($link, "SELECT * FROM `skyeng_numeral` WHERE `numeral`='$i' ");
          $numeral_fetch_tb = mysqli_fetch_assoc($numeral_tb);
            $numeral_name = $numeral_fetch_tb[numeral_name];
            echo $numeral_name; ?>'; <br> OR <br>
            SELECT * FROM `skyeng_numeral` WHERE `numeral`='<?php
              $_SESSION['id'] = $numeral_fetch_tb[id];
                  echo $i;  ?>';</p>
<form class="" action="lesson_three_numeral.php" method="post">
  <textarea name="sql_request" rows="8" cols="80"></textarea>
  <input type="submit" name="start_sql_request" value="Start Sql Request">
</form>
<?php

  if (isset($_POST['start_sql_request'])) {
      $user_sql_request = $_POST['sql_request'];
      $user_sql_request = mysqli_query($link, "$user_sql_request");
      $numeral_name_user = mysqli_fetch_assoc($user_sql_request);
      $numeral_id = $numeral_name_user[id];

      echo "<br> You return: ";

      print_r($numeral_name_user);

      if ($numeral_id_user == $numeral_id) {
          echo "<br> sql request right";
      } else {
          echo "<br> sql request incorrect";
      }
  }

 ?>
 </div>

  </body>
  <script src="/js/script.js"></script>
</html>
