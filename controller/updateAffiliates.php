<?php
 require_once '../model/Affiliates.php';

 $firstName=$_POST['firstName'];
 $lastnames=$_POST['lastNames'];
 $typeDoc=$_POST['typeDoc'];
 $numDoc=$_POST['numDoc'];
 $cell=$_POST['cell'];
 $departament=$_POST['department'];
 $town=$_POST['town'];
 $birthday=$_POST['birthday'];
 $affiliates=array();

 //Leemos el JSON
 try {

    if(!file_exists("affiliates.json")){
        throw new Exception();
    }else{
        $datos_affiliates = file_get_contents("affiliates.json");
        $json_affiliates = json_decode($datos_affiliates, true);

        foreach ($json_affiliates as $affiliate) {
            if(strcmp($affiliate["numDoc"],$numDoc)==0){
                echo "Entra";
                $affil= new Affiliates($firstName,$lastnames,$birthday,$typeDoc,$numDoc,$town,$departament,$cell);
                $out = new stdClass();
                $out->firstName=$affil->getFirstNames();
                $out->lastnames=$affil->getLastNames();
                $out->typeDoc=$affil->getTypeDoc();
                $out->numDoc=$affil->getNumDoc();
                $out->cell=$affil->getCell();
                $out->departament=$affil->getDepartment();
                $out->town=$affil->getCity();
                $out->birthday=$affil->getBirthday();
                $out->rank=null;
                array_push($affiliates,$out);
            }else{
                array_push($affiliates,$affiliate);
            }
           
       }
    }
    }catch(Exception $a){

    }


$json_string = json_encode($affiliates);
$file = 'affiliates.json';
file_put_contents($file, $json_string);



echo $json_string;