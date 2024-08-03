<?php

namespace App\Core;

use PDOException;
use PDO;

class Database {
    private static ?PDO $instance = null;
    private static string $dbDir;

    public static function init(string $db = 'db.sqlite') {
        if(self::$instance === null) {
            self::$dbDir = realpath(__DIR__ . '/../data') .'/';
    
            self::connect($db);
        }
    }

    private static function connect(string $db) {
        $dbPath = 'sqlite:'. self::$dbDir . $db;

        try {
            self::$instance = new PDO($dbPath);
            // Set error mode to exceptions
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new \Exception('Connection failed: ' . $e->getMessage());
        }
    }

    public static function query(string $sql, array $params = [])
    {
        $stmt = self::$instance->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public static function execute(string $sql, array $params = [])
    {
        $stmt = self::$instance->prepare($sql);
        return $stmt->execute($params);
    }
}