<?php 

include 'database.php';
class  Table{

    private $nameTable;
    private $columnTable=array();
    public function __construct($name,$para=array()){
       $this->columnTable=$para;

       $this->nameTable=$name;

       
    }

    function insertData($post=array()){
        $data_assoc=array_combine($this->columnTable, $post);
        print_r($data_assoc);
        $d=new database();
        $d->insert($this->nameTable,$data_assoc);
        if ($d == true) {
            echo"yes";
          // header('location:../index.php');
        }


          

    }
    function updateData($post=array(),$id){

        $data_assoc=array_combine($this->columnTable, $post);
        $database=new database();
        $database->update($this->nameTable,$data_assoc,$id);
        if ($database == true) {
            header('location:../index.php');
        }





    }


}

?>