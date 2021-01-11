<?php

abstract class Model
{

  private static $pdo;
  //! mis en static pour etre accessible patr toues les class fille
  private static function setBdd()
  {

    self::$pdo = new PDO("mysql:host=localhost;dbname=bibli;charset=utf8", 'root', '');
    self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  }

  protected function getBdd()
  {
    if (self::$pdo === null) {
      self::setBdd();
    }
    return self::$pdo;
  }
}
