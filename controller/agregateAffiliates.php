<?php
 require_once '../model/Affiliates.php';

 $firstName=$_REQUEST['firstName'];
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
           array_push($affiliates,$affiliate);
       }
    }
    }catch(Exception $a){

    }


$affiliate= new Affiliates($firstName,$lastnames,$birthday,$typeDoc,$numDoc,$town,$departament,$cell);
$out = new stdClass();
$out->firstName=$affiliate->getFirstNames();
$out->lastnames=$affiliate->getLastNames();
$out->typeDoc=$affiliate->getTypeDoc();
$out->numDoc=$affiliate->getNumDoc();
$out->cell=$affiliate->getCell();
$out->departament=$affiliate->getDepartment();
$out->town=$affiliate->getCity();
$out->birthday=$affiliate->getBirthday();
$out->rank=null;

array_push($affiliates,$out);


$json_string = json_encode($affiliates);
$file = 'affiliates.json';
file_put_contents($file, $json_string);



echo $json_string;