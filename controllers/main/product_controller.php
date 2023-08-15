<?php
require_once('controllers/main/base_controller.php');
require_once('models/product.php');


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
        $data = array('product' => $product);
		$this->render('index', $data);
	}

}

?>
