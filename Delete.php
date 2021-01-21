<?php

declare(strict_types=1);

namespace App;
use PDO;
use PDOException;

require_once __DIR__ . '/db/Dbconnect.php';

class Delete{
    public function deleteSqlData($dbh,$id){
        try {
            $deleteSql = 'DELETE FROM todolist WHERE id=:id';
            $stmt = $dbh->prepare($deleteSql);
            $stmt->bindValue(':id',$id,PDO::PARAM_INT);
            $stmt->execute();
            header('Location:../app/IndexColumns.php');
        }
        catch (PDOException $e) {
            echo '削除失敗' . $e->getMessage() . "\n";
            exit();
        }
    }
}


    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];

        $dbh = dbConnect();
        $delete = new Delete;
        $delete->deleteSqlData($dbh,$id);
    }




?>
