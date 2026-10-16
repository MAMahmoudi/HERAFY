<?php

namespace app\core;

use PDO;

// Holds the single PDO connection shared by every model,
// and knows how to create the schema (and demo data) for SQLite or MySQL.
class Database
{
    private static $Connection = null;

    public static function Connection()
    {
        if (self::$Connection === null) {
            self::$Connection = self::Connect();
        }
        return self::$Connection;
    }

    // Used by the tests to plug an in-memory database
    public static function Set_Connection($Connection)
    {
        self::$Connection = $Connection;
    }

    public static function Disconnect()
    {
        self::$Connection = null;
    }

    private static function Connect()
    {
        $Options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        if (My_DataBase_Driver === 'sqlite') {
            $Is_New = My_SQLite_Path === ':memory:' || !file_exists(My_SQLite_Path);
            if (My_SQLite_Path !== ':memory:' && !is_dir(dirname(My_SQLite_Path))) {
                mkdir(dirname(My_SQLite_Path), 0775, true);
            }
            $Connection = new PDO('sqlite:' . My_SQLite_Path, null, null, $Options);
            $Connection->exec('PRAGMA foreign_keys = ON');
            if ($Is_New) {
                self::Install($Connection, My_Seed_Demo_Data);
            }
            return $Connection;
        }

        $Properties = "mysql:host=" . My_Server_Name . ";port=" . My_DataBase_Port
            . ";dbname=" . My_DataBase_Name . ";charset=utf8mb4";
        return new PDO($Properties, My_DataBase_Connection_User, My_DataBase_Connection_PassWord, $Options);
    }

    public static function Driver($Connection)
    {
        return $Connection->getAttribute(PDO::ATTR_DRIVER_NAME);
    }

    // Creates every table, then optionally fills them with demo data
    public static function Install($Connection, $With_Demo_Data = false)
    {
        foreach (self::Schema(self::Driver($Connection)) as $Statement) {
            $Connection->exec($Statement);
        }
        $Count = (int)$Connection->query('select count(*) from services')->fetchColumn();
        if ($Count === 0) {
            $Seed = require(My_Root_Path . '/database/seed.php');
            self::Insert_Rows($Connection, 'services', $Seed['services']);
            if ($With_Demo_Data) {
                self::Seed_Demo($Connection, $Seed);
            }
        }
    }

    public static function Schema($Driver)
    {
        if ($Driver === 'mysql') {
            $Primary_Key = 'INT UNSIGNED AUTO_INCREMENT PRIMARY KEY';
            $Foreign_Key = 'INT UNSIGNED';
            $Suffix = ' ENGINE=InnoDB DEFAULT CHARSET=utf8mb4';
        } else {
            $Primary_Key = 'INTEGER PRIMARY KEY AUTOINCREMENT';
            $Foreign_Key = 'INTEGER';
            $Suffix = '';
        }

        return [
            "CREATE TABLE IF NOT EXISTS services (
                id $Primary_Key,
                name VARCHAR(80) NOT NULL,
                slug VARCHAR(80) NOT NULL UNIQUE,
                image VARCHAR(255) NULL,
                search_count INT NOT NULL DEFAULT 0
            )$Suffix",

            "CREATE TABLE IF NOT EXISTS account_users (
                id $Primary_Key,
                first_name VARCHAR(80) NOT NULL,
                last_name VARCHAR(80) NOT NULL,
                email VARCHAR(190) NOT NULL UNIQUE,
                password_hash VARCHAR(255) NOT NULL,
                service_id $Foreign_Key NULL,
                city VARCHAR(80) NULL,
                phone VARCHAR(30) NULL,
                bio TEXT NULL,
                avatar VARCHAR(255) NULL,
                cover VARCHAR(255) NULL,
                profile_views INT NOT NULL DEFAULT 0,
                created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (service_id) REFERENCES services(id) ON DELETE SET NULL
            )$Suffix",

            "CREATE TABLE IF NOT EXISTS company_users (
                id $Primary_Key,
                name VARCHAR(120) NOT NULL,
                email VARCHAR(190) NOT NULL UNIQUE,
                password_hash VARCHAR(255) NOT NULL,
                city VARCHAR(80) NULL,
                phone VARCHAR(30) NULL,
                website VARCHAR(255) NULL,
                description TEXT NULL,
                logo VARCHAR(255) NULL,
                cover VARCHAR(255) NULL,
                created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
            )$Suffix",

            "CREATE TABLE IF NOT EXISTS posts (
                id $Primary_Key,
                author_type VARCHAR(10) NOT NULL,
                author_id $Foreign_Key NOT NULL,
                body TEXT NOT NULL,
                image VARCHAR(255) NULL,
                created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
            )$Suffix",

            "CREATE TABLE IF NOT EXISTS products (
                id $Primary_Key,
                company_id $Foreign_Key NOT NULL,
                name VARCHAR(120) NOT NULL,
                description TEXT NULL,
                price DECIMAL(10,2) NULL,
                image VARCHAR(255) NULL,
                created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (company_id) REFERENCES company_users(id) ON DELETE CASCADE
            )$Suffix",

            "CREATE TABLE IF NOT EXISTS sponsorships (
                id $Primary_Key,
                company_id $Foreign_Key NOT NULL,
                account_id $Foreign_Key NOT NULL,
                created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                UNIQUE (company_id, account_id),
                FOREIGN KEY (company_id) REFERENCES company_users(id) ON DELETE CASCADE,
                FOREIGN KEY (account_id) REFERENCES account_users(id) ON DELETE CASCADE
            )$Suffix",

            "CREATE TABLE IF NOT EXISTS contact_messages (
                id $Primary_Key,
                name VARCHAR(120) NOT NULL,
                email VARCHAR(190) NOT NULL,
                subject VARCHAR(190) NOT NULL,
                message TEXT NOT NULL,
                created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
            )$Suffix",
        ];
    }

    private static function Insert_Rows($Connection, $Table, $Rows)
    {
        foreach ($Rows as $Row) {
            $Columns = array_keys($Row);
            $Statement = $Connection->prepare("insert into $Table (" . implode(',', $Columns)
                . ") values (:" . implode(',:', $Columns) . ")");
            $Statement->execute($Row);
        }
    }

    private static function Seed_Demo($Connection, $Seed)
    {
        // Every demo account uses the password "herafy123"
        $Password = password_hash('herafy123', PASSWORD_DEFAULT);
        $Service_Ids = $Connection->query('select slug, id from services')->fetchAll(PDO::FETCH_KEY_PAIR);

        $Craftsmen = [];
        foreach ($Seed['craftsmen'] as $Craftsman) {
            $Craftsman['service_id'] = $Service_Ids[$Craftsman['service']];
            unset($Craftsman['service']);
            $Craftsman['password_hash'] = $Password;
            $Craftsmen[] = $Craftsman;
        }
        self::Insert_Rows($Connection, 'account_users', $Craftsmen);

        $Companies = [];
        foreach ($Seed['companies'] as $Company) {
            $Company['password_hash'] = $Password;
            $Companies[] = $Company;
        }
        self::Insert_Rows($Connection, 'company_users', $Companies);
        self::Insert_Rows($Connection, 'products', $Seed['products']);

        $Posts = [];
        foreach ($Seed['posts'] as $Post) {
            $Post['created_at'] = date('Y-m-d H:i:s', strtotime($Post['created_at']));
            $Posts[] = $Post;
        }
        self::Insert_Rows($Connection, 'posts', $Posts);
        self::Insert_Rows($Connection, 'sponsorships', $Seed['sponsorships']);
    }
}
