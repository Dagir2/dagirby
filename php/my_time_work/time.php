<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
include("$root/php/function/function.php");
?>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/php/css/time.css">
  <link rel="stylesheet" href="/php/css/container.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Work Time</title>
</head>

<body>
<div class="inted">
<?php
include("$root/php/container.php");

if (isset($_POST['openuser'])) {
    $username = $_POST['username'];

    $user_tb = mysqli_query($link, "SELECT * FROM `user` WHERE user_name = '$username'");
    if (mysqli_num_rows($user_tb) == 0) {
        erroruser();
    } else {
        $userid = mysqli_fetch_assoc($user_tb);
        $_GET['v'] = $userid['id'];
    }
}
if (!empty($_GET['v']) and is_numeric($_GET['v'])) {
    $v=$_GET['v'];
    $user_tb = mysqli_query($link, "SELECT * FROM `user` WHERE id = '$v'");
} else {
    $ero = false;
}


if ((mysqli_num_rows($user_tb) == 0) && ($ero == false)) {
    erroruser();
} else {
    $user = mysqli_fetch_assoc($user_tb); ?>

<div class="inted">
  <div class="forma">

   <?php
   $first_time = date("H:i:s");
    echo '<h1> Привет '. $user[user_name] .'!</h1>';
    echo '<p>Сегодня <b>'. date("d.F.y").'</b></p>';
    echo '<p>Время: <h2><b>'. date("G.i").'</b></h2></p>'; ?>
   <form  method="POST"action="confirm.php?v=<?php echo $_GET['v'] ?>">
      <input type="password" placeholder="Пароль"  name='password'>
      <br><br>
      <input type="submit" name='come' value="Прийти">
      <input type="submit" name='care' value="Уйти">
    </form>


  </div>
</div>
<?php
mysqli_close($link);
}?>
</body>

</html>
