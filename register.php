<?php
/**
 * Created by PhpStorm.
 * User: 媛飞工作室
 * Date: 2018/6/23
 * Time: 11:01
 */


$username = trim($_POST['username']);
$password = md5(trim($_POST['password']));

var_dump(1111);

$sex = $_POST['sex'];
$link = mysqli_connect('localhost', 'root', '', 'demo', 3306);
$sql = "select * from users where iphone={$username}";
$result = mysqli_query($link, $sql);
$arr = mysqli_fetch_assoc($result);
if (!empty($arr)) {
	echo "用户名存在!";
	return false;
} else {
	$query = "insert users values (null, {$username}, '{$password}', {$sex})";
	$suc = mysqli_query($link, $query);
	return $suc ? "YES" : "NO";
}