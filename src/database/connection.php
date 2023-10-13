<?php

class Database extends SQLite3
{
  function __construct()
  {
    $this->open('database/app.db');
  }
}
