<?php
require_once('controllers/main/base_controller.php');
require_once('models/product.php');
require_once('models/review.php');


class ProductController extends BaseController
{
	function __construct()
	{
		$this->folder = 'product';
	}

	public function index()
	{
		
        session_start();
				
		if(!isset($_SESSION["user_id"])){
			$_SESSION["user_id"] = "1";
		}
    	
        $product_id = 2;
        $product = Product::get($product_id);
		$reviews = Review::getAll($product_id);
        $data = array('product' => $product, 'reviews' => $reviews);
		$this->render('index', $data);
	}
	public function insertReview(){

		////////////////////////////
		session_start();
				
		if(!isset($_SESSION["user_id"])){
			$_SESSION["user_id"] = "1";
		}
    	////////////////////

		$user_id = $_SESSION['user_id'];
		$product_id = $_POST['product_id'];
		$content = $_POST['content'];
		//echo $content, $user_id, $product_id;
		Review::insert($content, $user_id, $product_id);
		header('Location: index.php?page=main&controller=product&action=index');
	}

}

?>
