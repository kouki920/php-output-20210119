<?php
declare(strict_types=1);
//ini_set('display_errors',1);
namespace App;


require_once __DIR__ . '/db/dbconnect.php';


class CreateColumns{
    private function insertTableSql($dbh,array $memos){

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

    private function validation(array $memos){
        $errors = [];

        if(!strlen($memos['memo'])){
            $errors['memo'] = '今日のタスクを書いてください';
        }elseif(strlen($memos['memo']) > 255) {
            $errors['memo'] = '255文字以内で入力して下さい';
        }

        return $errors;
    }

    public function startInsertIntoSql(array $memos){
        $create = new CreateColumns;
        $errors = $create->validation($memos);

        if(!count($errors)){

        $dbh = dbConnect();

        $create = new CreateColumns;
        $create->insertTableSql($dbh,$memos);
        header('Location:../app/IndexColumns.php');

        }
        }
    }


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $memos = [];

    $memos = [
        'memo' => $_POST['memo']
    ];
    // return $memos;
    $start = new CreateColumns;
$start->startInsertIntoSql($memos);
}




$title = '登録ページ';
$contents = __DIR__ .'/view/create.php';

include __DIR__  .'/view/common.php';
