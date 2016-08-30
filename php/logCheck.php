<?php

//подключение к БД
include_once('../../php/settings.php');
$connect = mysqli_connect(HOST, NAME, PASSWORD, DB);

//снимаем имя из БД если есть
$login = $_POST['login'];
$query = mysqli_query($connect,'SELECT * FROM `accounts-wmf` WHERE `login`="'.$login.'"');
$checkedLogin = mysqli_fetch_assoc($query);

//в зависимости от наличия или отсуствия имени (плюс проверка корректности пароля) - возвращаем ответ
if ($checkedLogin == '') {
  echo ('<span id="err1">errorLogIn</span>');
} else {
  if ($checkedLogin['password'] == $_POST['password']) {
    $validCheck = 'Logged';
  } else {
    echo ('<span id="err1">errorLogIn</span>');
  }
}


?>
