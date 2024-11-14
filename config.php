<?php
$dbUser = "h3579076";
$dbPw = "56125612";
// $dbPw = "ExgpFRlu";
$dbHost = "sophia.cs.hku.hk";
// $dbHost = "127.0.0.1";
$dbDb = "h3579076";

// session_save_path("/student/21/ext/h3579076/temp_session_save_folder");
function connectDb(){
	global $dbHost, $dbUser, $dbPw, $dbDb;
	$connect= mysqli_connect($dbHost, $dbUser, $dbPw, $dbDb);
	mysqli_set_charset($connect, "utf8");
	return $connect;
};