<?php $result = $blog->header();?>
	<div class="content">
		<div class="add">
			<form name = "newPost" action="index.php" method = "POST"  autocomplete="off" enctype="multipart/form-data">
				<p><textarea wrap="soft"  placeholder="Вкажіть назву статті" style="width: 1155px; height: 25px; resize: vertical" name="name" required ></textarea></p>
				<p><textarea wrap="soft" placeholder="Напишіть вміст статті" style="width: 1155px; height: 300px; resize: vertical" name="body" required ></textarea></p>
				<script type="text/javascript">CKEDITOR.replace( 'body');</script>
				<p><textarea wrap="soft"  placeholder="Перерахуйте при потребі теги до статті, розділяючи їх символом #" style="width: 1155px; height: 25px; resize: vertical" name="tags"></textarea></p>
				<input type="hidden" name="action" value="insert">
				Виберіть категорію:<br>
			<?php foreach($category as $row):?>
				<label><input type="radio" name=category required value="<?=$row['category']?>"><?=$row['category']?></label>
			<?php endforeach;?>
				<!-- <p>Виберіть картинку для статті: <br>  
				<input type="file" name="file"> -->
				<p><input type="submit" name="submit"  value="Додати новий пост!" formmethod="post"></p>
			</form>
		</div>
	</div>
</div>