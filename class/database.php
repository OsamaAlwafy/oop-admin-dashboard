<?php 
error_reporting(-1);
class database{
        public $que;
        private $servername='localhost';
        private $username='root';
        private $password='';
        private $dbname='ecommercs';
        private $result=array();
        private $mysqli='';

        public function __construct(){
            $this->mysqli = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
        }

        public function insert($table,$para=array()){
            $table_columns = implode(',', array_keys($para));
            echo "<br> column  ".$table_columns;
            $table_value = implode("','", $para);
            echo "<br> value ".$table_value;

            $sql="INSERT INTO $table ($table_columns) VALUES ('$table_value')";

            $result = $this->mysqli->query($sql)or die(mysqli_error($this->mysqli));
            if($result)
            echo "<br> succesful ew";
        }

        public function update($table,$para=array(),$id){
            $args = array();

            foreach ($para as $key => $value) {
                $args[] = "$key = '$value'"; 
            }
            print_r($args);
            echo $id;


            $sql="UPDATE  $table SET " . implode(',', $args);

            $sql .=" WHERE $id";
          print_r($sql);
            $result = $this->mysqli->query($sql)or die(mysqli_error($this->mysqli));
        }

        public function delete($table,$id){
            $sql="DELETE FROM $table";
            $sql .=" WHERE $id ";
            $sql;
            $result = $this->mysqli->query($sql);
             
        }

        public $sql;

        public function select($table,$rows="*",$where = null){
            if ($where != null) {
                $sql="SELECT $rows FROM $table WHERE $where";
            }else{
                $sql="SELECT $rows FROM $table";
            }

            $this->sql = $result = $this->mysqli->query($sql);
            return $result;
        }

        public function __destruct(){
            $this->mysqli->close();
        }
    }
?>