<?php

declare(strict_types=1);


require_once __DIR__ .'/../../vendor/autoload.php';

 function dbConnect(){

        try {
            $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
            $dotenv->load();


                         $host = $_ENV['DB_HOST'];
                         $user = $_ENV['DB_USER'];
                         $pass = $_ENV['DB_PASS'];
                         $dbname = $_ENV['DB_NAME'];

                        $dsn = "mysql:host=${host};dbname=${dbname};charset=utf8mb4";

                        $dbh = new PDO($dsn,$user,$pass,[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_EMULATE_PREPARES=>false,]);


        } catch (PDOException $e) {
                echo '接続失敗' . $e->getMessage() .  "\n";
                exit();
        }
        return $dbh;
    }











?>
