
<form action="../app/db/Create.php" method="POST">

<?php if(isset($errors)) : ?>
    <ul>
<?php foreach($errors as $error) : ?>
<li><?php echo $error; ?></li>
<?php endforeach;?>
    </ul>
<?php endif;?>

<label for="memo">リスト登録</label>
<textarea name="memo" id="memo" cols="30" rows="3"><?php echo $memos['memo'] ?></textarea>
<br>
<input type="submit" value="登録">

</form>
