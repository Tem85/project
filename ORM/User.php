<?php
namespace ORM;

require_once 'ORM.php';

class User extends ORM
{
    public function __construct()
    {
        parent::__construct();
        $this->setTable('user');
    }
}
