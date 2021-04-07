<?php 
    require_once("config/db.class.php");
    
    //*************************** */
    
    class Product
    {
        public $productID;
        public $productName;
        public $cateID;
        public $price;
        public $quantity;
        public $description;
        public $picture;

        public function __construct($pro_name,$cate_id,$price,$quantity,$desc,$picture)
        {
            $this -> productName = $pro_name;
            $this -> cateID = $cate_id;
            $this -> price = $price;
            $this -> quantity = $quantity;
            $this -> description = $desc;
            $this -> picture = $picture;
        }
        //luu san pham
       public function save(){
           //xu ly upload hinh anh 
            $file_temp = $this -> picture['tmp_name'];
            $user_file = $this -> picture['name'];
            $timestamp = date("Y").date("m").date("d").date("h").date("i").date("i").date("s");
            $filepath = "uploads/".$timestamp.$user_file;
            if(move_uploaded_file($file_temp,$filepath)==false)
            {
                return false;
            }
            //ket thuc uplaod
           $db = new Db();
           //them product vao csdl
           $sql = "INSERT INTO Product (ProductName, CateID, Price, Quantity, Description, Picture) VALUES 
        ('$this->productName', '$this->cateID', '$this->price', '$this->quantity', '$this->description', '$filepath')";
        //    '$this->productName','$this -> cateID','$this -> price','$this -> quantity','$this -> description','$filepath'
           //truy van ve product
           $result = $db -> query_execute($sql);
           return $result;
       }
       //lay danh sach san pham
       public static function list_product(){
           $db = new Db();
           $sql = "SELECT * FROM Product";
           $result = $db -> select_to_array($sql);
           return $result;
       }    
       // lay danh sach san pham theo loai
       public static function list_product_by_cateid($cateid){
           $db = new DB();
           $sql ="SELECT * FROM Product WHERE CateID ='$cateid'";
           $result = $db -> select_to_array($sql);
           return $result;
       }
       //Lay san pham lien quan 
       public static function list_product_relate($cateid, $id){
            $db = new DB();
            $sql ="SELECT * FROM Product WHERE CateID='$cateid' AND productID!='$id'";
            $result = $db -> select_to_array($sql);
            return $result;
       }
       //ham lay san pham
       public static function get_product($id){
        $db= new Db();
        $sql= "SELECT * FROM product WHERE productID ='$id'";
        $result= $db->select_to_array($sql);
        return $result;
    }
    }
?>