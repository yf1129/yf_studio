<?php
/**
 * Created by PhpStorm.
 * User: 媛飞工作室
 * Date: 2018/6/23
 * Time: 11:01
 */

$dsn = "mysql:host=localhost;dbname=demo;port=3306";
$user = "root";
$pass = "";
$pdo = new PDO($dsn, $user, $pass);
if (!empty($_POST)) {
    $username = trim($_POST['username']);
    $password = md5(trim($_POST['password']));
    $sql = "select * from users where iphone={$username}";
    $res = $pdo->query($sql);
    $result = $res->fetch(PDO::FETCH_OBJ);
    if (isset($result)) {
        if ($result->password == $password) {
            echo "登陆成功";
        } else {
            echo "密码不正确";
        }
    } else {
        echo "账户不对";
    }
}