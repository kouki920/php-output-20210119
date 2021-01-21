<?php

declare(strict_types=1);

namespace App;
use PDO;
use PDOException;

require_once __DIR__ . '/db/Dbconnect.php';

class Update{
    public function updateSql($dbh,$memo,$id){

        try {
            $updateSql = 'UPDATE todolist SET memo=:memo WHERE id=:id';
            $stmt = $dbh->prepare($updateSql);
            $stmt->bindValue(':memo',$memo,PDO::PARAM_STR);
            $stmt->bindValue(':id',$id,PDO::PARAM_STR);
            $stmt->execute();
            header('Location:../app/IndexColumns.php');
        }
        catch (PDOException $e) {
            echo '更新失敗' . $e->getMessage() . "\n";
        }
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $memo = $_POST['memo'];
    $id = $_POST['id'];

    $dbh = dbConnect();
    $update = new Update;
    $update->updateSql($dbh,$memo,$id);
}
