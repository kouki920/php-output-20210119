<?php
declare(strict_types=1);
// ini_set('display_errors',1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/dbconnect.php';

// namespace App\db;

// use PDO;
// use PDOException;

class Create{
    public function insertTableSql($dbh,array $memos){

            $count = 0;
            $columns = '';
            $values = '';

            foreach(array_keys($memos) as $memo){
                if($count++>0){
                    $columns .= ',';
                    $values .= ',';
                }
                $columns .= $memo;
                $values .= ':' . $memo;
            }
            $sql = 'INSERT INTO todolist ('. $columns .')VALUES('. $values .')';
            $stmt = $dbh->prepare($sql);
            $stmt->execute($memos);
    }

    public function validation(array $memos){
        $errors = [];

        if(empty($memos['memo'])){
            $errors['memo'] = '今日のタスクを書いてください';
        }elseif(strlen($memos['memo']) > 255) {
            $errors['memo'] = '255文字以内で入力して下さい';
        }

        return $errors;
    }
}



if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $memos = [];

    $memos = [
        'memo' => $_POST['memo']
    ];
}

    $create = new Create;
    $errors = $create->validation($memos);

    if(!count($errors)){

    $dbh = dbConnect();

    $create = new Create;
    $create->insertTableSql($dbh,$memos);
    header('Location:../index.php');

    }else {
        header('Location:new.php');
    }


$title = '登録ページ';
$contents = __DIR__ .'/view/create.php';

include __DIR__  .'/view/common.php';
