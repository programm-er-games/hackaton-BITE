<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Личная страница</title>
  <link rel="stylesheet" type="text/css" href="css/firspage.css">
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





  <form class="file-upload-form">
    <label for="file" class="file-upload-label">
      <div class="file-upload-design">
        <svg viewBox="0 0 640 512" height="1em">
          <path d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z">
          </path>
        </svg>
        <p>Загрузите фото</p>
      </div>
      <input id="file" type="file" />
    </label>
  </form>

  <div class="bozS">
    <div class="textInputWrapper">
      <input placeholder="ФИО" type="text" class="textInput">
    </div>
  </div>



  <main class="table" id="customers_table">
    <section class="table__header">
      <h1> Сводная таблица</h1>


    </section>
    <section class="table__body">
      <table>
        <thead>
          <tr>
            <th> ID </th>
            <th> Предмет </th>
            <th> ученик </th>
            <th> Замечание</th>
            <th> дата </th>
            <th> оценка </th>
          </tr>
        </thead>
        <tbody>
          <?php
          require "backend/db_v2.php";
          $main_conn = new Db("backend/database.db");
          $main_conn->start(["grades" => [
            "student_id" => "TEXT NOT NULL", "teacher_id" => "TEXT NOT NULL", "grade" => "TEXT NOT NULL",
            "absence" => "TEXT", "subject_id" => "TEXT NOT NULL"
          ]], true);
          $id = 0;
          $status_list = [
            "5" => "status delivered",
            "2" => "status cancelled",
            "3" => "status cancelled",
            "4" => "status shipped"
          ];
          $datetime = new DateTime(timezone: new DateTimeZone("+0300"));
          $data = $main_conn->get("grades");
          foreach ($data as $row) {
            $status = $status_list[$row["grade"]];
            echo
            '
              <tr>
                  <td>' . $id++ . '</td>
                  <td><img src="images/user.png" alt="">' . $row["subject_id"] . '</td>
                  <td>' . $row["student_id"] . '</td>
                  <td>' . $row["absence"] . '</td>
                  <td>' . $row["datetime"] . '</td>
                  <td>
                      <p class="' . $status . '">' . $row["grade"] . '</p>
                  </td>
              </tr>
              ';
          }
          ?>
        </tbody>
      </table>
    </section>
  </main>

</body>

</html>