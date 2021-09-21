<?php
//データベースへ登録
ini_set('display_errors', 1);
error_reporting(E_ALL);


function initPdo(): PDO 
{
    // データベース名、ユーザー名、パスワード
    $dsn = 'mysql:dbname=pages;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'root';

    // MSQLのデータベース接続
    return new PDO($dsn, $user, $password);
}