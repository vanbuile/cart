<?php
require_once('connection.php');

class Product
{
    public $id;
    public $name;
    public $price;
    public $description;
    public $category;
    public $color;
    public $style;
    public $img;

    public function __construct($id, $name, $price, $description, $category, $color, $style, $img)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->category = $category;
        $this->color = $color;
        $this->style = $style;
        $this->img = $img;
    }

    static function getAll()
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM product");
        $products = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product)
        {
            $products[] = new Product(
                $product['idproduct'],
                $product['name'],
                $product['price'],
                $product['description'],
                $product['category'],
                $product['color'],
                $product['style'],
                $product['img']
            );
        }
        return $products;
    }

    static function get($id)
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM product WHERE idproduct = $id");
        $result = $req->fetch_assoc();
        $product = new Product(
            $result['idproduct'],
            $result['name'],
            $result['price'],
            $result['description'],
            $result['category'],
            $result['color'], 
            $result['style'],
            $result['img']
        );
        return $product;
    }

    static function insert($name, $price, $description, $category, $color, $style, $img)
    {
        $db = DB::getInstance();
        $req = $db->query(
            "INSERT INTO product (name, price, description, category, color, style, img)
            VALUES ('$name', $price, '$description', '$category', '$color', '$style', '$img');");
        return $req;
    }

    static function delete($id)
    {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM product WHERE idproduct = $id");
        return $req;
    }

    static function update($id, $name, $price, $description, $category, $color, $style, $img)
    {
        $db = DB::getInstance();
        $req = $db->query(
            "
                UPDATE product
                SET name = '$name', price = $price, description = '$description', category = '$category', color = '$color, style=$style;
                WHERE idproduct = $id
            ;");
    }
}
?>