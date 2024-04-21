<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Админка/регистрация</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
  <div class="input1">
    <div class="value1">
      SBERDiary
    </div>
    <button class="value">
      <a href="come_in.php" class="link">Вход/Выход</a>
    </button>
    <button class="value">
      <a href="firspage.php" class="link">Дневник</a>
    </button>
    <button class="value">
      <a href="support.html" class="link">Поддержка</a>
    </button>
    <button class="value">
      <a href="letters.html" class="link">Почта</a>
    </button>
    <button class="value">
      <a href="settings.html" class="link">ADMIN</a>
      <div class="circl"></div>
    </button>
  </div>

  <form class="form" action="backend/register.php" method="post">
    <p class="title">Регистрация</p>
    <p class="message"></p>
    <div class="flex">
      <label>
        <input class="input" type="text" name="name" placeholder="" required="">
        <span>Имя</span>
      </label>

      <label>
        <input class="input" type="text" name="surname" placeholder="" required="">
        <span>Фамилия</span>
      </label>

      <label>
        <input class="input" type="text" name="patronymic" placeholder="" required="">
        <span>Отчество</span>
      </label>
    </div>

    <label>
      <input class="input" type="email" name="email" placeholder="" required="">
      <span>Почта</span>
    </label>
    <label>
      <input class="input" type="tel" name="phone" placeholder="" required="">
      <span>Телефон</span>
    </label>
    <label>
      <input class="input" type="date" name="birthday" placeholder="" required="">
      <span>Дата рождения</span>
    </label>
    <label>
      <input class="input" type="password" name="password" placeholder="" required="">
      <span>Пароль</span>
    </label>
    <label>
      <input class="input" type="password" name="confirm_password" placeholder="" required="">
      <span>Подтверждение пароля</span>
    </label>
    <p id="sign_up_message"><? echo $result; ?></p>
    <button class="submit" type="submit">Зарегистрироваться</button>
  </form>

  <div class="container"></div>
  <script>
    function getCookie(name) {
      let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
      ));
      return matches ? decodeURIComponent(matches[1]) : undefined;
    }
    let up_mes = getCookie("sign_up_res");
    document.getElementById("sign_up_message").textContent = up_mes === undefined ? "" : up_mes;
  </script>
</body>

</html>