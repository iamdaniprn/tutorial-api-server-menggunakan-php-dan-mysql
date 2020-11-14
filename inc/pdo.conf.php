<?php
try{
  $dsn = 'mysql:host=localhost;port=3306;dbname=tutorial_api';
  $username = 'root';
  $password = '';
  $db = new PDO($dsn, $username, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}catch(PDOException $ex){
  echo $ex->getMessage();
}
?>
