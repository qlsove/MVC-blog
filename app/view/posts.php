<?php $result = $blog->header();?>
	<div class="content">
<?php	if(isset($search_string)):?>
Результати пошуку <?=$search_string;
	endif;
	foreach($posts as $post):?>
		<div class="post-content">
			<h2 class="blog-title"><?=htmlspecialchars($post['name'])?></h2>
			<div class="blog-text"><?=preg_replace('#<br.*?>#s','',$post['body'])?></div>
			<div class="blog-footer" >Розділ:  <a href="index.php?action=category&id=<?=Controller::link($post['category'])?>"  style="text-decoration: none;"><?=$post['category']?></a>
			<?php if(!null == $post['tags']):
				$tags = Controller::tags($post['tags']);?>
			Теги: <?php foreach($tags as $item):?><a href="index.php?action=search&id=<?=$item?>" style="text-decoration: none;"><?=$item?></a>;<?php endforeach;?>
			<?php else:?>
			Тегів не вказано
			<?php endif;?>Створено: <?=date($post['created_time']);
				if(!null == $post['changed_time']):?>
			<br>Оновлено: <?=date($post['changed_time']);
				endif;?>
			Автор: <?=$post['author']?>
			</div>
		</div>
		<?php endforeach;?>
	</div>
</div>