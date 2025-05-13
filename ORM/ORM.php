<?php

namespace ORM;

use PDO;

class ORM
{
    protected static ?PDO $db = null;

    protected string $table;

    protected function __construct()
    {
        if (is_null(static::$db)) {
            self::$db = require_once 'config.php';
        }
        return self::$db;

    }

//    public static function connectDatabase()
//    {
//        if (self::$db === null) {
//            self::$db = new static();
//        }
//        return self::$db;
//    }

    public function setTable(string $table): void
    {
        $this->table = $table;
    }

    public function all(): array
    {
        $stmt = self::$db->prepare("SELECT * FROM " . $this->table);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC );
    }

    public function find(string $id): ?array
    {
        $stmt = self::$db->prepare("SELECT * FROM " . $this->table . " WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findEmail(string $email)
    {
        $stmt = self::$db->prepare("SELECT * FROM " . $this->table . " WHERE email =:email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool
    {
        $columns = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));
        $stmt = self::$db->prepare("INSERT INTO $this->table ($columns) VALUES ($values)");
        return $stmt->execute($data);
    }
}
