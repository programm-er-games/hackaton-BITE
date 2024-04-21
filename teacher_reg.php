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
      <a href="come_in.php" class="link" style="text-decoration: none; color: white;">Вход/Выход</a>
    </button>
    <button class="value">
      <a href="firspage.php" class="link" style="text-decoration: none; color: white;">Дневник</a>
    </button>
    <button class="value">
      <a href="support.html" class="link" style="text-decoration: none; color: white;">Поддержка</a>
    </button>
    <button class="value">
      <a href="letters.html" class="link" style="text-decoration: none; color: white;">Почта</a>
    </button>
    <button class="value">
      <a href="settings.html" class="link" style="text-decoration: none; color: white;">ADMIN</a>
      <div class="circl"></div>
    </button>
  </div>






  <form class="form" action="backend/register.php" method="post">
    <p class="title">Внесение оценок и посещения</p>
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
      <input class="input" type="text" name="email" placeholder="" required="">
      <span>Класс</span>
    </label>
    <label>
      <input class="input" type="number" name="phone" placeholder="" required="">
      <span>Оценка</span>
    </label>
    <label>
      <input class="input" type="date" name="birthday" placeholder="" required="">
      <span>Дата получения</span>
    </label>
    <label>
      <input class="input" type="text" name="password" placeholder="" required="">
      <span>Предмет</span>
    </label>
    <label>
      <select name="status" id="status">
        <option value="exist">П</option>
        <option value="not_exist">Н</option>
        <option value="late">О</option>
        <option value="sick">У</option>
      </select>
      <span>: П - присутствует, Н - не присутствует, О - опоздание, У - уважительная</span>
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