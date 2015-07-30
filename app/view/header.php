<div class="header">
    <div class="logo"><a href="index.php"><img width=80 src="images/site/logo.png"></a></div>              
    <div class="login">
		<?php 
		if(empty($_COOKIE['login'])):?>
			<form name = "Login" action="index.php" method = "POST" >
				<input class="login-input" type="text" name="login" placeholder="enter login">
				<input class="login-input" type="password" name="password" placeholder="enter password">
				<input class="login-btn" type="submit" value="Вхід на сайт!" formmethod="post">
				<input type="hidden" name="in_out">
			</form>
		<?php
		else:?>
			<a class="logout" href="index.php?action=in_out">Вийти</a>
			<div class="hello">Привіт, <?=$_COOKIE['login'].'!'?></div>    
		<?php
		endif;?>
    </div>  
    
    <div class="nav">  
		<div class="search">
			<form name = "search" action="/index.php" method = "POST" >
				<input class="search-input" type="text" name="searchData" required placeholder="search query">
				<input class="search-btn" type="submit" value="Пошук" formmethod="post">
			</form>
		</div>
		<ul>
		<li><a href="index.php"><span>ВСІ БЛОГИ</span></a></li>
		<?php 
		for ($x=0; $x<count($result); $x++):?>
			<li><a href="index.php?action=category&id=<?=$result[$x]['link']?>"><span><?=$result[$x]['category']?></span></a></li>
		<?php
		endfor;
		if(!empty($_COOKIE['login'])):?>
			<li><a class="menu" href="index.php?action=admin"><span>АДМІНКА</span></a></li>
		<?php
		endif;?> 
		</ul>
    </div>      

</div>

