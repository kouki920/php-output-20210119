
    <?php if(count($memos)) :?>
<ul>
<?php foreach($memos as $memo) : ?>
<li><?php echo $memo['memo'];?></li>
<li style="list-style: none;"><?php echo $memo['created_at']?></li>
<a href="../delete.php"><input type="button" value="削除"></a>
<hr>
<?php endforeach;?>
</ul>
<?php endif;?>
