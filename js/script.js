$(function() {
  //переключаем между LogIn и SignIn
  $('#signInButton').on('click',function () {
    $('#SignInTable').slideDown();
    $('#signInButton').addClass('active');
    $('#logInButton').removeClass('active');
    $('#passwordField1').attr('required','required');
    $('#passwordField1').addClass('required');
  });
  $('#logInButton').on('click',function () {
    $('#SignInTable').slideUp();
    $('#signInButton').removeClass('active');
    $('#logInButton').addClass('active');
    $('#passwordField1').removeAttr('required');
    $('#passwordField1').removeClass('required');
  });

//предотвращаем отправку синхронного запроса по сабмиту формы
$('#goButton').on('click',function (event) {
  event.preventDefault();

  if ($('#logInButton').hasClass('active')) {
    //проверка - авторизация
    $.ajax({
      method: 'post',
      url: 'php/logCheck.php',
      data: $('#logInForm').serialize(),
      success: function (data) {
        if (data == '<span id="err1">errorLogIn</span>') {
          if ($('div').is('#modWindow')) {
            $('#modWindow').remove();
            $('#logInForm').append('<div id="modWindow" class="alert alert-danger col-sm-10 pull-right" style="margin-top: 10px;">Incorrect name or password!<br>Неверное имя или пароль!</div>')
          } else {
            $('#logInForm').append('<div id="modWindow" class="alert alert-danger col-sm-10 pull-right" style="margin-top: 10px;">Incorrect name or password!<br>Неверное имя или пароль!</div>')
          }
        } else {
          $('#logInForm').submit();
        }
      }
    })

  } else {  //проверка заполнения полей при регистрации нового пользователя и регистрация
    $('.required').each(function(i) {
      if ($(this).val() =='') {
        checkFields = 'Fill in required forms!<br>Заполните необходимые поля';
      } else {
        checkFields = 'Ok'
      }
        });
    if (checkFields == 'Ok') {
      if ($('#passwordField').val() == $('#passwordField1').val()) {
        $('#logInForm').submit();
      } else {
        if ($('div').is('#modWindow')) {
          $('#modWindow').remove();
          $('#logInForm').append('<div id="modWindow" class="alert alert-danger col-sm-10 pull-right" style="margin-top: 10px;">Password confirmation error! Please check!<br>Ошибка подтверждения пароля! Проверьте!</div>')
        } else {
          $('#logInForm').append('<div id="modWindow" class="alert alert-danger col-sm-10 pull-right" style="margin-top: 10px;">Password confirmation error! Please check!<br>Ошибка подтверждения пароля! Проверьте!</div>')
        }
        }
    } else {
      if ($('div').is('#modWindow')) {
        $('#modWindow').remove();
        $('#logInForm').append('<div id="modWindow" class="alert alert-danger col-sm-10 pull-right" style="margin-top: 10px;">'+checkFields+'</div>')
      } else {
        $('#logInForm').append('<div id="modWindow" class="alert alert-danger col-sm-10 pull-right" style="margin-top: 10px;">'+checkFields+'</div>')
      }
    }
  }

})

//удаляем административную информацию
$('#err1').remove();


//управление языком в панели
function langSwitch() {
  if ($('#l1').text() == 'Login*') {
    $('#logInButton').text('Войти');
    $('#signInButton').text('Регистрация');
    $('#l1').text('Логин*');
    $('#loginField').attr('placeholder','Введите е-мейл');
    $('#l2').text('Пароль*');
    $('#passwordField').attr('placeholder','Введите пароль');
    $('#l3').text('Пароль*');
    $('#passwordField1').attr('placeholder','Подтвердите пароль');
    $('#l4').text('Имя');
    $('#newNameField').attr('placeholder','Введите Имя');
    $('#l5').text('Возраст');
    $('#ageField').attr('placeholder','Введите Ваш возраст');
    $('#l6').text('Телефон');
    $('#phoneField').attr('placeholder','Введите телефон (пример: +380501234567)');
    $('#l7').text('Аватар(2Mb)');
    $('#goButton').text('Вперед');
    $('#l8').text('* - обязательное поле');
  } else {
    $('#logInButton').text('Log In');
    $('#signInButton').text('Sign In');
    $('#l1').text('Login*');
    $('#loginField').attr('placeholder','Enter e-mail');
    $('#l2').text('Password*');
    $('#passwordField').attr('placeholder','Enter password');
    $('#l3').text('Confirm*');
    $('#passwordField1').attr('placeholder','Confirm password');
    $('#l4').text('Name');
    $('#newNameField').attr('placeholder','Enter your Name');
    $('#l5').text('Age');
    $('#ageField').attr('placeholder','Enter your age');
    $('#l6').text('Phone');
    $('#phoneField').attr('placeholder','Enter phone number (example: +380501234567)');
    $('#l7').text('Avatar(2Mb)');
    $('#goButton').text('Go On');
    $('#l8').text('* - required field');
  }
}

$('#ru').on('click', function (event) {
  event.preventDefault();
  langSwitch();
})
  event.preventDefault();
  langSwitch();
});
