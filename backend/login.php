<?php
require "db_v2.php";
$main_conn = new Db("/database.db");
$main_conn->start([
    "teachers" => ["name" => "TEXT NOT NULL", "surname" => "TEXT NOT NULL", "patronymic" => "TEXT NOT NULL",
                "email" => "TEXT NOT NULL", "password" => "TEXT NOT NULL", "phone_number" => "INTEGER NOT NULL",
                "birth_day" => "TEXT NOT NULL", "subject" => "TEXT NOT NULL"],
    "parents" => ["name" => "TEXT NOT NULL", "surname" => "TEXT NOT NULL", "patronymic" => "TEXT NOT NULL",
                "email" => "TEXT NOT NULL", "password" => "TEXT NOT NULL", "phone_number" => "INTEGER NOT NULL",
                "birth_day" => "TEXT NOT NULL"]
], true);

$result;
echo "start\n";
if (isset($_POST["email"]) && isset($_POST["password"])) {
    echo "ert\n";
    global $result;
    $email = addslashes(trim(htmlspecialchars($_POST["email"])));
    $password = addslashes(trim(htmlspecialchars($_POST["password"])));
    $is_exist_email = $main_conn->get("parents", ["email"], ["email" => $email]);
    $is_exist_passwd = $main_conn->get("parents", ["password"], ["password" => $password]);
    if ($email === "" && $password === "") {
        $result = "Введите значения!";
        header("Location: ../come_in.php");
    } else if ((count($is_exist_email) == 0 && count($is_exist_passwd) == 0)
        || ($is_exist_email === false && $is_exist_passwd === false)
    ) {
        $result = 'Нет такой записи';
        header("Location: ../come_in.php");
    } else {
        $user = $main_conn->get("parents", ["password"], ["email" => $email]);
        if ($user[0][0] == $password) {
            $result = "Успешно!";
            setcookie('is_auth', 'yes', time() + (86400 * 30), '/hackathon');
            header("Location: ../firspage.php");
        } else {
            $result = "Неверный пароль!";
            header("Location: ../come_in.php");
        }
    }
    setcookie('is_auth', 'no', time() + (86400 * 30), '/hackathon');
    setcookie("sign_in_res", $result, time() + 360, "/hackathon");
    echo $result;
}
echo "end";