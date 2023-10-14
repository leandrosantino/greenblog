<?php

const DATABASE_PATH = __DIR__."/app.db";

class Database {

  public static function connect(){
    $db = new PDO("sqlite:".DATABASE_PATH);
    return $db;
  }
}
