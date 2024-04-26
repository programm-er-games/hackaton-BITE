<?php
require "db_v2.php";
$main_conn = new Db("/database.db");
$main_conn->start([
    "teachers" => ["name" => "TEXT NOT NULL", "surname" => "TEXT NOT NULL", "patronymic" => "TEXT NOT NULL",
                "email" => "TEXT NOT NULL", "password" => "TEXT NOT NULL", "phone_number" => "TEXT NOT NULL",
                "birth_day" => "TEXT NOT NULL", "subject" => "TEXT NOT NULL"], 
    "parents" => ["name" => "TEXT NOT NULL", "surname" => "TEXT NOT NULL", "patronymic" => "TEXT NOT NULL",
                "email" => "TEXT NOT NULL", "password" => "TEXT NOT NULL", "phone_number" => "TEXT NOT NULL",
                "birth_day" => "TEXT NOT NULL"]
], true);

$result;
if (!isset($_COOKIE['is_auth'])) setcookie('is_auth', 'no', time() + (86400 * 30), '/hackathon');
if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['patronymic']) 
    && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['password'])
    && isset($_POST['confirm_password']) && isset($_POST['birthday'])) {
    global $result;
    $name = addslashes(trim(htmlspecialchars($_POST['name'])));
    $surname = addslashes(trim(htmlspecialchars($_POST['surname'])));
    $phone = addslashes(trim(htmlspecialchars($_POST['phone'])));
    $patronymic = addslashes(trim(htmlspecialchars($_POST['patronymic'])));
    $rq_password = addslashes(trim(htmlspecialchars($_POST['confirm_password'])));
    $email = addslashes(trim(htmlspecialchars($_POST['email'])));
    $birth = addslashes(trim(htmlspecialchars($_POST['birthday'])));
    $password = addslashes(trim(htmlspecialchars($_POST['password'])));

    $is_exist = $main_conn->get("parents", 
                                ["name", "surname", "patronymic", "email", "password", "birth_day"], 
                                ["name" => $name, "surname" => $surname, "patronymic" => $patronymic,
                                "email" => $email, "password" => $password, "birth_day" => $birth, "phone_number" => $phone]);
    var_dump($name, $surname, $patronymic, $email, $password, $birth, $is_exist);
    if ((count($is_exist) == 0 || $is_exist === false) && $password == $rq_password) {
        $main_conn->insert("parents", ["name" => $name, "surname" => $surname, "patronymic" => $patronymic, 
                           "email" => $email, "password" => $password, "birth_day" => $birth, "phone_number" => $phone]);
        $result = "Вы успешно зарегистрировались!";
        header("Location: come_in.php");
    } 
    else if ($name === "" || $surname === "" || $email === "" || $password === ""
                || $phone == "" || $birth == "" || $rq_password == "")
        $result = "Заполните все значения!";
    else $result = "Учётная запись с этими данными уже существует. Не хотите ли вы авторизоваться?";
    header("Location: ../index.php");
    setcookie("sign_up_res", $result, time() + 360, "/hackathon");
    // echo $result;
}
