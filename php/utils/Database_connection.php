<?php
class DatabaseConnection {
    private static $url = 'mysql:host=localhost;dbname=registerDB';
    private static $user = 'safidison';
    private static $password = 'Mnbvcxz~123';

    public static function getConnection() {
        try {
            $conn = new PDO(self::$url, self::$user, self::$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            throw new Exception("Erreur de connexion à la base de données: " . $e->getMessage());
        }
    }
}
?>
