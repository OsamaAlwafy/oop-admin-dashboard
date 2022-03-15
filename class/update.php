<?php 
 //   include 'database.php';
     include 'productTable.php'; 
    function getpath( $name )
     {
        $filename = $_FILES[$name]["name"];
        $tempname = $_FILES[$name]["tmp_name"];    
        $folder = "../img/".$filename;
        if (move_uploaded_file($tempname, $folder))  {
                        echo "Image uploaded successfully";
                    }else{
                        echo "Failed to upload image";
                  }
        return $filename;          
     }

    $type=$_GET['type'];
    echo"befor upload";
    if (isset($_POST['upload'])) {
    if($type=="products"){
         $t=new Table("products",["name","desc","price","image","catigory"]);
      
      $filename=getpath("img-pro");
       
     $t->insertData([$_POST['name-pro'], $_POST['desc-pro'],$_POST['price-pro'],$filename,$_POST['cat-pro']]);

                }
         else{
            echo"befor Table";
             $t=new Table("catigory",["name","image"]);
            $filename=getpath("img-cat");
            $t->insertData([$_POST['name-cat'],$filename]);
            

         }          


    }