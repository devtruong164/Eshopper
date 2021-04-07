<?php //IDEAD:
        //Lop xu ly va truy van co so du lieu
        class Db{
            //bien ket noi CSDL
            protected static $connection;
            //ham ket noi co so du lieu
            public function connect(){
                //Ket Noi Co So Du Lieu
                if(!isset(self::$connection)){
                    //Lay Thong Tin ket noi tu Config.ini
                    $config = parse_ini_file("config.ini");

                    self::$connection = new mysqli("localhost",$config["username"],$config["password"],$config["databasename"]);       
                }
                //xu ly loi neu khong connect dc voi CSDL
                if(self::$connection == false){
                    //xu ly ghi lai file tai day
                    return false;
                }
                    return self::$connection;
            }
            //ham thuc hien cau lenh truy van
            public function query_execute($queryString){
                //khoi tao ket noi
                $connection = $this -> connect();
                //thuc hien execute truy van 
                $connection -> query("SET NAMES utf8");
                $result = $connection ->query($queryString);
                // $connection -> close();
                return $result;
            }
            //ham thuc hien tro ve 1 mang danh sach ket qua 
            public function select_to_array($queryString){
                $rows = array();

                $result = $this -> query_execute($queryString);

                if($result == false) return false;

                while($item = $result -> fetch_assoc()){
                    $rows[] = $item;
                }
                return $rows;
            }
        }
?>
