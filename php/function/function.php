<?php
function erroruser()
{
    ?>
    <div class="forma">
      <p><strong>Пользователь не найде</strong></p>
      <p>Попробуйте найти:</p>
      <form class="POST" action="time.php" method="post">
        <input type="text" name="username" placehol="Логин">
        <br>
        <input type="submit" name="openuser" value="Найти">
      </form>

    </div>
  <?php
  exit;
}

 ?>
