<?php
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
<?php
include("$root/connection.php"); // coonection db

    $password = $_POST[password];
    $v =$_GET['v'];
    $user = mysqli_query($link, "SELECT * FROM `user` WHERE `password` = '$password' AND `id` = '$v'");
    if (mysqli_num_rows($user) == 0) {
        echo $_POST['v'];
        echo 'Неверный пароль'; ?>
        <form  method="POST"action="time.php?v=<?php echo $_GET['v'] ?>">
      <br><br>
      <input type="submit"  value="Назад">
    </form>

        <?php
        exit;
    }

    $time_user = date("H:i:s");

    if (isset($_POST['come'])) {
        echo 'Вы успешно пришли на работу!';

        mysqli_query($link, " INSERT INTO Danil_time (user_id,first_time) VALUES ('$v','$time_user')");
    }
    if (isset($_POST['care'])) {
        echo 'Вы успешно ушли с работы!';

        mysqli_query($link, " INSERT INTO Danil_time (user_id,last_time) VALUES ('$v','$time_user')");
    }



    mysqli_close($link);
?>

</body>
</html>
