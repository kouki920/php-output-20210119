
    <?php if(count($memos)) :?>
<ul>
<?php foreach($memos as $memo) : ?>
<li><?php echo htmlspecialchars($memo['memo'],ENT_QUOTES,'UTF-8') ;?></li>
<li style="list-style: none;"><?php echo $memo['created_at'];?></li>

<form action="../app/delete.php" method="POST">
<input type="hidden" name="id" value="<?php echo $memo['id'];?>">
<input type="submit" name='submit' value="削除">
</form>

<form action="../app/view/update.php" method="POST">
<input type="hidden" name="id" value="<?php echo $memo['id'];?>">
<input type="hidden" name="memo" value="<?php echo $memo['memo']?>">
<input type="submit" name="submit" value="編集">
</form>

<hr>
<?php endforeach;?>
</ul>
<?php endif;?>
