<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Task for WMF ltd.</title>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
</head>
<body>

  <?php
    include_once('logCheck.php');
    $checkedLogin = $_POST;
    if ($validCheck == 'Logged') { //если логин Ок - выполняем условия - вывод профиля
      $login1 = $checkedLogin['login'];
      $query = mysqli_query($connect,'SELECT * FROM `accounts-wmf` WHERE `login`="'.$login1.'"');
      $checkedLogin2 = mysqli_fetch_assoc($query);
      echo '
        <div class="panel panel-default">
          <div class="panel-heading" style="font-weight: bolder;">Hello, '.$checkedLogin2['name'].'</div>
					<div class="pull-left">
	          <div class="panel-body">
	          Login (e-mail): '.$checkedLogin2['login'].'
	          </div>
	          <div class="panel-body">
	          Password: '.$checkedLogin2['password'].'
	          </div>
	          <div class="panel-body">
	          Age: '.$checkedLogin2['age'].'
	          </div>
	          <div class="panel-body">
	            Phone: '.$checkedLogin2['phone'].'
	          </div>
					</div>
          <div class="pull-left panel-body">
            <img style="width: 200px; height: 200px;" src="'.$checkedLogin2['avatar'].'">
          </div>
        </div>
				<div style="width: 100%; height: 1px; clear: both;"></div>
				<br><input style="margin-left: 10px" class="btn btn-warning" value="LogOut" type="button" onclick="location.href=`../main.php`"
      ';

    } else {
      if ($checkedLogin['password1'] !='') { //проверяем, чтобы страница небыла загружена с пустой информацией - предотвращение создания пустых полей в таблице
        include_once('../../php/settings.php');
        $connect = mysqli_connect(HOST, NAME, PASSWORD, DB);
        $query1 = mysqli_query($connect,'SELECT * FROM `accounts-wmf` WHERE `login`="'.$checkedLogin['login'].'"');
        $checkedLogin1 = mysqli_fetch_assoc($query1);
        if ($checkedLogin1['login'] == $checkedLogin['login']) {
          echo "<div styles='margin: 5px' class='alert alert-danger'>Profile alresdy exist!</div><br>";
          header('Refresh: 2; url=http://mak.ho.ua/wmf/main.php');
        } else {//входим и рендерим вновь созданную страницу
          echo "<div styles='margin: 5px' class='alert alert-success'>You created New Profile!</div><br>";

					//запись файла на сервер
					copy($_FILES['fileSrc']['tmp_name'],"../avatars/".basename($_FILES['fileSrc']['name']));
					//обозначение пути к файлу для записи в БД и дальнейшего вывода на стнарице пользователя
					$checkedLogin['fileSrc'] = 'http://www.mak.ho.ua/wmf/avatars/'.$_FILES['fileSrc']['name'];
					//запись новых учетных данных в БД
					mysqli_query($connect,'INSERT INTO `accounts-wmf` VALUE("", "'.$checkedLogin['login'].'", "'.$checkedLogin['password1'].'", "'.$checkedLogin['newName'].'", "'.$checkedLogin['age'].'", "'.$checkedLogin['phone'].'", "'.$checkedLogin['fileSrc'].'")');

          include_once('../../php/settings.php');
          $connect = mysqli_connect(HOST, NAME, PASSWORD, DB);
          $query1 = mysqli_query($connect,'SELECT * FROM `accounts-wmf` WHERE `login`="'.$checkedLogin['login'].'"');
          $checkedLogin1 = mysqli_fetch_assoc($query1);
          echo '
            <div class="panel panel-default">
              <div class="panel-heading" style="font-weight: bolder;">Hello, '.$checkedLogin1['name'].'</div>
							<div class="pull-left">
	              <div class="panel-body">
	              Login (e-mail): '.$checkedLogin1['login'].'
	              </div>
	              <div class="panel-body">
	              Password: '.$checkedLogin1['password'].'
	              </div>
	              <div class="panel-body">
	              Age: '.$checkedLogin1['age'].'
	              </div>
	              <div class="panel-body">
	                Phone: '.$checkedLogin1['phone'].'
	              </div>
							</div>
              <div class="pull-left panel-body">
                <img style="width: 200px; height: 200px;" src="'.$checkedLogin1['avatar'].'">
              </div>
            </div>
						<div style="width: 100%; height: 1px; clear: both;"></div>
						<br><input style="margin-left: 10px" class="btn btn-warning" value="LogOut" type="button" onclick="location.href=`../main.php`"
          ';
        }
      } else {
        echo "ERROR: No data to save! Redirecting...";
        header('Refresh: 2; url=http://mak.ho.ua/wmf/main.php');
      }
    }
   ?>

</body>
  <script src="../js/script.js"></script>
</html>
