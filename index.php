<?php 

include "document.class.php";

$dObj=new document();

/* default action is "create new document"*/
if(isset($_GET["action"])){
    $action=$_GET["action"];
}else{
    $action="new";
}

switch($action){
    //create new document
    case "new":
        $dObj->getTitleArray();
        include "documentNew.php";
        break;
    
    //save new document
    case "save":
        $dObj->saveNewDocument();
        $dObj->getTitleArray();
        include "documentNew.php";
        break;
        
    //view existing document
    case "view":
        $requestedTitle=urlencode($_GET["title"]);
        $dObj->setRequestedTitle($requestedTitle);
        $dObj->getTextByTitle();
        $dObj->getTitleArray();
        include "documentView.php";
        break;
}
