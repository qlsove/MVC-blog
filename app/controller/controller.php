<?php
class Controller{

	protected $model;

	public function __construct($host="localhost", $user="root", $password="123qwASD", $db="blog"){
		$this->model = new Model($host, $user, $password, $db);
	}


	public function main(){
		if(!isset($_GET['action']) && !isset($_POST['action'])) {
			$this->get_blogs();
		} else {
			$function = isset($_GET['action']) ? $_GET['action'] : $_POST['action'];
				if(method_exists('Controller', $function)) {
					$this->$function();
				}
			}
	}


	public function in_out(){
		if(isset($_GET['action']) && $_GET['action'] == 'in_out') {
			setcookie("login","", 1);
			header("Location:index.php");
		}
		if(isset($_POST['in_out'])) {
			$result = $this->model->login($_POST["login"], $_POST["password"]);
				if(is_array($result)) {
					setcookie("login", $result['login']);
					header('Location: index.php');
				}
				else {
					return "Неправильний логін або пароль";
				}
		}
	}


	public function header(){
		$result = $this->model->get_header();
			if(is_array($result)) {
				include ("app/view/header.php");
			}
			else {
				echo "Не існує жодна категорія";
			}
	}


	public function insert(){
		if(isset($_GET['action']) && $_GET['action'] == 'insert') {
			$category = $this->model->get_header();
			include ("app/view/insert.php");
		}
		if(isset($_POST['action']) && $_POST['action'] == 'insert') {
			$result = $this->model->insert_blog($_POST['name'], $_POST['body'], $_POST['category'], $_COOKIE['login'], $_POST['tags']);
			header('Location: index.php?action=admin', true);
		}
	}


	public function change(){
			if(isset($_GET['action']) && $_GET['action'] == 'change') {
				$post = $this->model->get_once_blog($_GET['id']);
				$category = $this->model->get_header();
				include ("app/view/change.php");
			}
			if(isset($_POST['action']) && $_POST['action'] == 'change') {
				$this->model->update($_POST['id'], $_POST['name'], $_POST['body'], $_POST['category'], $_COOKIE['login'], $_POST['tags']);
				header('Location: index.php?action=admin', true);
			}
	}


	public function delete(){
		$result = $this->model->delete($_GET['id']);
		header('Location: index.php?action=admin', true);
	}


	public function get_blogs(){
		$posts = $this->model->get_all_blogs();
			if($posts)
				include ("app/view/posts.php");
			else
				echo 'Блогів не знайдено!';
	}


	public function category(){
		$category = $this->model->get_category($_GET['id']);
		$posts = $this->model->get_once_category($category);
			if($posts)
				include ("app/view/posts.php");
			else
				echo 'Блогів даної категорії не знайдено!';
	}


	public function admin(){
		$posts = $this->model->get_all_blogs();
		include ("app/view/admin.php");
	}

	public static function link($category){
		return $this->model->link($category);
	}


	public static function tags($string){
		return $this->model->tags($string);
	}
}


?>
