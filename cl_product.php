
<?php
include_once 'config/database.php';
$database = new Database();
$db = $database->getConnection();

abstract class Product2 {
    public  $sku; 
    public  $name; 
	public  $price;
    public  $type; 
	public function getSku()
		{
			return $this->sku;
		}

    public function getName()
		{
			return $this->name;
		}
	public function getPrice()
		{
			return $this->price;
		}
	 public function getType()
		{
			return $this->type;
		}
	public function __construct($db)
		{
			$this->conn = $db;
		}
	
    public function  initialization($arr){ 
	 if(isset ($arr['sku']) && $arr['name'] && $arr['price'] && $arr['type'] ){
		
        $this->sku       = $arr['sku'];
        $this->name     = $arr['name'];
		$this->price     = $arr['price'];         
		$this->type = $arr['type'];}
    }

	abstract public function showProduct();

	function getProducts(){
	
	 $query = "select * from products";

    $stmt = $this->conn->prepare($query);
	
    $stmt->execute();

    return $stmt;
	}

	function deleteProduct($id){
		$query = "DELETE FROM products WHERE id = " . $id;

    $stmt = $this->conn->prepare($query);
	
    $stmt->execute();

    return $stmt;
		}
	}
require_once("cl_disk.php");
require_once("cl_book.php");
require_once("cl_furniture.php");
	
?>