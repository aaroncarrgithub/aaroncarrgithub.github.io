<?php

/**
 * Description of database
 *
 * @author ACarr date:2/12/2021 - Initial implementation
 */
class Database {
    private static $dsn = 'mysql:host=localhost;dbname=kidco';
    private static $username = 'ac_user';
    private static $password = 'MSPress#1';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                //include('../errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }
}
