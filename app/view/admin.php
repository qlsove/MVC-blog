<?php $result = $blog->header();?>
	<div class="content">
		<div class="admin">
			<table width="1150" border="1" cellspacing="0" >
				<tr id="table-title">
					<th width="600">Назва</th>
					<th width="200">Створено</th>
					<th width="100">Автор</th>
					<th width="100">Категорія</th>
					<th width="140" colspan="2">Управління</th>
				</tr>
			<?php foreach($posts as $post):?>
				<tr>
					<th class="cell-title" width="600"> <?=htmlspecialchars($post['name'])?></th>
					<th width="200"> <?=date($post['created_time'])?></th>
					<th width="100"> <?=$post['author']?></th>
					<th width="100"> <?=$post['category']?></th>
					<th width="70">  <?='<a href="index.php?action=delete&id='.$post['id'].'"  style="text-decoration: none;">Видалити</a>' ?> </th> </div>
					<th width="70"> <?='<a href="index.php?action=change&id='.$post['id'].'" style="text-decoration: none;">Редагувати</a>' ?> </th>
				</tr>
			<?php endforeach;?>
			</table>
			<div class="plus"><a href="index.php?action=insert"><img src="/assets/img/site/plus.png"></a></div><br>
		</div>
	</div>
</div>
