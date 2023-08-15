<?php
require_once('controllers/main/base_controller.php');
require_once('models/order.php');

class CartController extends BaseController
{
	function __construct()
	{
		$this->folder = 'cart';
	}
	
	public function index()
	{
		session_start();
		$user_id = $_SESSION['user_id'];
		$orders = Order::getAll($user_id);
		$sum = Order::sum($user_id);
		$data = array('orders' => $orders, 'sum' => $sum);
		$this->render('index', $data);
	}
	public function add()
	{
		session_start();
		$product_id = $_POST['product_id'];
		$user_id = $_SESSION['user_id'];
		$num = $_POST['num'];
		Order::add($user_id, $product_id, $num);
		header('Location: index.php?page=main&controller=cart&action=index');
	}
	public function decrease(){
		session_start();
		$product_id = $_POST['product_id'];
		$user_id = $_SESSION['user_id'];
		Order::decrease($product_id, $user_id);
		header('Location: index.php?page=main&controller=cart&action=index');
	}
	public function addHidden()
	{
		session_start();
		$product_id = $_POST['product_id'];
		$num = $_POST['num'];
		$user_id = $_SESSION["user_id"];
		
		Order::add($user_id, $product_id, $num);
		header('Location: index.php?page=main&controller=cart&action=index');
	}
	public function delete() {
		session_start();
		$product_id = $_POST['product_id'];
		$user_id = $_SESSION['user_id'];
		Order::delete( $user_id,$product_id);
		header('Location: index.php?page=main&controller=cart&action=index');
	}
	
}

?>
