
<?php
include_once 'config/database.php';
$database = new Database();
$db = $database->getConnection();

//require_once("product_add.php");
require_once("config_product_db.php");

abstract class Product1 {
    public  $sku; // размер
    public  $name; // вес
	public  $price; // вес
    public  $type; // статус (disk, book, furniture)
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
	///////////////////////////////
	public function __construct($db)
	  {
        $this->conn = $db;
    }
    
  
    public function  initialization($arr){ //инициализация
	 if(isset ($arr['sku']) && $arr['name'] && $arr['price'] && $arr['type'] ){
		
        $this->sku       = $arr['sku'];
        $this->name     = $arr['name'];
		$this->price     = $arr['price'];         
		$this->type = $arr['type'];}
    }
//****************************************************************************   
    /*public function  print_data(){// вывод данных       
        echo "<br/>";
        print_r($this);
    }*/
 //****************************************************************************
	abstract public function showProduct();
//****************************************************************************
	function getProducts(){
	
	 $query = "select * from products";

    $stmt = $this->conn->prepare($query);
	
    $stmt->execute();

    return $stmt;
	}
 //****************************************************************************
	/*function  save(){// запись данных       
        $sql_insert = "INSERT INTO products VALUES (NULL, '$sku', '$name','$price','$type', '$size', '$weight', '$height', '$width', '$length')";
    //$sql_insert = "INSERT INTO products VALUES (NULL, '$db', '$arr')";
	if (mysqli_query($con, $sql_insert)) {
	
	
      echo "Product data added successfully";
	  echo "<br/>";
} 
		}*/
//****************************************************************************
	function deleteProduct($id){
		$query = "DELETE FROM products WHERE id = " . $id;

    $stmt = $this->conn->prepare($query);
	
    $stmt->execute();

    return $stmt;
	}
//****************************************************************************
	}//class Product1
	


 // Класс описывающий второй продукт
 class Book  extends Product1 {
	public  $weight; // размер
	public  $type; // тип
	
	public function  initialization_weight($databook){ //инициализация
   if(isset ($databook['weight'])){
        $this->weight       = $databook['weight'];
   }
    }
    public function __construct($db, $arr, $databook){
		$this->conn = $db;
        $this->initialization($arr);
		$this->initialization_weight($databook);		
    }
	
	///////////////////////////////////
	//function  create($sku, $name, $price, $type, $size, $weight, $height, $width, $length){// запись данных
	function  save(){	
        echo "<br/>";
		//$sku=$this->sku;
        $sql_insert = "INSERT INTO products VALUES (NULL, '$this->sku', '$this->name','$this->price','$this->type', '', '$this->weight', '', '', '')";
    $stmt = $this->conn->prepare($sql_insert);
    $stmt->execute();
	}//save
	public function  get_type($type){
        if($type=='disk'){
        $this->type="disk";
        }else if($type=='book'){
		$this->type="book";
        }else	
        {
        $this->type="furniture";
        }
        return $type;
    }
	
	/////////////////////////
	public function showProduct() {

    echo "Book <br>" . $this->getSku() . " <br>" . $this->getName() . " <br>" . $this->getPrice() . "<br>Weight: " . $this->getWeight() . "<br><br>";
  }
 }
	 //****************************************************************************
	class Furniture  extends Product1{
	private $height = "";
	private $width = "";
	private $length = "";
	public  $type; // тип
	
	public function  initialization_dimensions($datafurniture){ //инициализация
   
        $this->height       = $datafurniture['height'];
		$this->width       = $datafurniture['width'];
		$this->length       = $datafurniture['length'];
        
    }
    public function __construct($db, $arr, $datafurniture){
		$this->conn = $db;
        $this->initialization($arr);
		$this->initialization_dimensions($datafurniture);		
    }
	
//***********************************
	function  save(){	
        echo "<br/>";
		
        $sql_insert_f = "INSERT INTO products VALUES (NULL, '$this->sku', '$this->name','$this->price','$this->type', '', '', '$this->width', '$this->height', '$this->length')";
    $stmt = $this->conn->prepare($sql_insert_f);
    $stmt->execute();
	}//save
//**********************
public function  get_type($type){
        if($type=='disk'){
        $this->type="disk";
        }else if($type=='book'){
		$this->type="book";
        }else	
        {
        $this->type="furniture";
        }
        return $type;
    }
	public function showProduct() {

    echo "Furniture <br>" . $this->getSku() . " <br>" . $this->getName() . " <br>" . $this->getPrice() . "<br>Dimensions: " . $this->getHeight() . " x " . $this->getWidth() . " x " . $this->getLength() . "<br><br>";
  }  
 }
  //****************************************************************************
 class Disk  extends Product1{
	
	public  $size; // размер
	public  $type; // тип
	
	//function  create($sku, $name, $price, $type, $size, $weight, $height, $width, $length){// запись данных

	public function  initialization_size($datadisk){ //инициализация
   if(isset ($datadisk['size'])){
        $this->size       = $datadisk['size'];
   }
    }
	
    public function __construct($db, $arr, $datadisk){ 
		$this->conn = $db;
        $this->initialization($arr);
		$this->initialization_size($datadisk);		
    }

//***********************************
	function  save(){	
        echo "<br/>";
		
        $sql_insert_d = "INSERT INTO products VALUES (NULL, '$this->sku', '$this->name','$this->price','$this->type', '$this->size', '', '', '', '')";
    $stmt = $this->conn->prepare($sql_insert_d);
    $stmt->execute();
	}//save
//**********************
	public function  get_type($type){
        if($type=='disk'){
        $this->type="disk";}
		else if($type=='book'){
		$this->type="book";}
		else	
        {$this->type="furniture";}
        return $type;
    }
	public function showProduct() {

    echo "<br>Disk <br>" . $this->getSku() . " <br>" . $this->getName() . " <br>" . $this->getPrice() . "<br>Size: " . $this->getSize() . "<br><br>";
  } 
    
 }

					
?>