
<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include("$root/php/connection.php"); // coonection db?>
<link rel="stylesheet" href="css/container.css">

<div class="container">
  <div class="scope">

    <img src="/php/img/0.png" alt="0" class="butcon " OnClick="butcon1()">
  </div>




  </div>
<div id="butcon" class="container_1">



  <?php

$i = 0;
  while (true == true) {
      $link_dagir = mysqli_query($link, "SELECT * FROM `link` WHERE `id_headline` = '$i'");
      $row = mysqli_num_rows($link_dagir);

      if ($row == 0) {
          break;
      }
      $links = mysqli_fetch_assoc($link_dagir);

      echo "<strong> ".$links['headline']." </strong><br>";
      echo "<ul>";
      echo '<li><a href ="'.$links['link'].'">'.$links['title'].'</a></li>';
      while ($links = mysqli_fetch_assoc($link_dagir)) {
          echo '<a href ="'.$links['link'].'">'.$links['title'].'</a></li>';
      }
      echo "</ul>";
      $i++;
  }



     ?>

</div>
<?php   ?>

<script src="/php/js/script.js"></script>
