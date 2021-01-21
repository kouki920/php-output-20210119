<header>
<h1>編集ページ</h1>
</header>
<form action="../update.php" method="POST">
<textarea name="memo" id="memo" cols="30" rows="3"><?php echo $_POST['memo']?></textarea>
<input type="hidden" name="id" value="<?php echo $_POST['id'];?>">
<input type="submit" name="submit" value="更新">

</form>
