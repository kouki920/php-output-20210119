<?php
declare(strict_types=1);

namespace App;
use PDOException;
use PDO;
// ini_set('display_errors',1);


require_once __DIR__ . '/db/Dbconnect.php';
// require_once __DIR__ . '/view/Xss.php';

class IndexColumns{
    public function selectTableSql($dbh): array{

        try {

            $selectSql = 'SELECT id, memo, created_at FROM todolist';
            $stmt = $dbh->prepare($selectSql);
            $stmt->execute();

            while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                $memos[] = $result;
            }

        } catch (PDOException $e) {
            echo '接続失敗' . $e->getMessage() . "\n";
        }
        return $memos;
    }
}
// }
$dbh = dbConnect();
$column = new IndexColumns;
$memos = $column->selectTableSql($dbh);


$title = '一覧ページ';
$contents = __DIR__ . '/view/index.php';

include __DIR__ . '/view/common.php';
