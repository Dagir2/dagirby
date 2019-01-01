<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
?>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Work Time</title>
</head>

<body>
  <style media="screen">
    .forma {
      text-align: center;
    }
  </style>

<?php

if (!empty($_GET['v']) and is_numeric($_GET['v'])) {
    $v=$_GET['v'];
} else {
    echo 'Error';
    exit;
}

        include("$root/connection.php"); // coonection db

$user_tb = mysqli_query($link, "SELECT * FROM `user`");
$i=false;
$user = null;
$bd = null;
while (($user[id] != $v) && ($bd = mysqli_fetch_assoc($user_tb))) {
    $user[id]= $bd[id];
    if ($user[id] == $v) {
        $i=true;
    }
}

$user = $bd;
   if ($i == false) {
       echo 'Пльзователь ненайден ';
       exit;
   }
 $i='';
$bd = null;
?>


  <div class="forma">

   <?php
   $first_time = date("H:i:s");
   echo '<h1> Привет '. $user[user_name] .'!</h1>';
   echo '<p>Сегодня <b>'. date("d.F.y").'</b></p>';
   echo '<p>Время: <h2><b>'. date("G.i").'</b></h2></p>';

   ?>
   <form  method="POST"action="confirm.php?v=<?php echo $_GET['v'] ?>">
      <input type="password" placeholder="Пароль"  name='password'>
      <br><br>
      <input type="submit" name='come' value="Прийти">
      <input type="submit" name='care' value="Уйти">
    </form>


  </div>

<?php
mysqli_close($link);?>
</body>

</html>
