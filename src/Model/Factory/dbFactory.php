<?php

namespace Rediite\Model\Factory;

class dbFactory {

  function createService() {
    return new \PDO('pgsql:dbname=ipw_bilel_chater;host=pgsql;port=5432', 'bilel.chater', 'bilel123');
  }
}
