<?php

class Model{

	protected $connect;
	protected $host;
	protected $user;
	protected $password;
	protected $db;

	public function __construct($host, $user, $password, $db){
		$this->host=$host;
		$this->user=$user;
		$this->password=$password;
		$this->db=$db;
	}


	public function connect(){
		$this->connect=mysql_connect($this->host, $this->user, $this->password);
		mysql_select_db($this->db, $this->connect);
		mysql_query(" SET NAMES 'utf8' ");
	}


	public function login($login, $pass){
		$query = "SELECT * FROM users WHERE login='".$login."' AND pass='".$pass."'";
		$result=mysql_query($query);
		$login_pair=mysql_fetch_array($result);
		return $login_pair;
	}


	public function get_header(){
		$header=[];
		$query = "SELECT * FROM categories";
		$result=mysql_query($query);
			while($row = mysql_fetch_assoc($result)){
				$header[]=array('link' => $row['link'], 'category' => $row['category']);
			}
		return $header;
	}


	public function get_category($link){
		$query = "SELECT category FROM categories WHERE link='".$link."'";
		$result=mysql_query($query);
		$row=mysql_fetch_assoc($result);
		return $row['category'];
	}


	public function get_all_blogs(){
		$blogs=[];
		$query = "SELECT * FROM blogs ORDER BY id";
		$result=mysql_query($query);
			while($row = mysql_fetch_assoc($result)){
				$blogs[]=array('id' => $row['id'], 'name' => $row['name'], 'body' => $row['body'], 'category' => $row['category'], 'author' => $row['author'], 'created_time' => $row['created_time'], 'changed_time' => $row['changed_time'], 'tags' => $row['tags']);
			}
		return $blogs;
	}


	public function get_once_category($category){
		$blogs=[];
		$query = "SELECT * FROM blogs WHERE category='".$category."' ORDER BY id";
		$result=mysql_query($query);
			while($row = mysql_fetch_assoc($result)){
				$blogs[]=array('id' => $row['id'], 'name' => $row['name'], 'body' => $row['body'], 'category' => $row['category'], 'author' => $row['author'], 'created_time' => $row['created_time'], 'changed_time' => $row['changed_time'], 'tags' => $row['tags']);
			}
		return $blogs;
	}


	public function get_once_blog($id){
		$query = "SELECT * FROM blogs WHERE id='".$id."'";
		$result=mysql_query($query);
		$post=mysql_fetch_assoc($result);
		return $post;
	}


	public function insert_blog($name, $body, $category, $author, $tags){
		$query ="INSERT INTO blogs (name, body, category, author, created_time, tags) VALUES ('".$name."', '".$body."', '".$category."', '".$author."', now(),'".$tags."')";
		$result=mysql_query($query);
	}


	public function update($id, $name, $body, $category, $author, $tags){
		$query ="UPDATE blogs SET name='".$name."', body='".$body."', category='".$category."', author='".$author."', changed_time=now(), tags='".$tags."' WHERE id='".$id."'";
		$result=mysql_query($query);
	}


	public function delete($id){
		$query = "DELETE FROM blogs WHERE id='".$id."'";
		$result=mysql_query($query);
		return $result;
	}


	public static function link($category){
		$query = "SELECT link FROM categories WHERE category='".$category."'";
		$result=mysql_query($query);
		$row=mysql_fetch_assoc($result);
		return $row['link'];
	}


	public static function tags($string){
		$string=trim($string);
		$tags= explode("#" , $string);
			foreach($tags as $tag){
				$tag==trim($tag);
				}
		return $tags;
	}
}


?>