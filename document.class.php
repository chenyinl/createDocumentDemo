<?php
class document {
    /* array to save all the titles */
    public $titleArray=array();
    
    /* requested document text body */
    public $documentText="";
    
    /* requested document title, with URL decoded */
    public $documentTitle="";
    
    /* requested document title, WITHOUT URL decoded */
    public $requestTitle="";
    
    /* get all the document titles */
    public function getTitleArray(){
        $handle = fopen("file.csv", "r");
        if(!$handle){
            echo "Fail to open file";
            exit();
        }
        $this->titleArray=array();
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $this->titleArray[]=$data[0];
        }
        fclose($handle);  
    }

    /* save the new documents */
    public function saveNewDocument(){
        $title=urlencode($_GET["title"]);
        $text=urlencode($_GET["text"]);
        $csvArray=array(
            $title,
            $text
        );
        $fp=fopen("file.csv","a");
        fputcsv($fp,$csvArray);
        fclose($fp);
        
    }
    
    /* print out the titles in list format with link */
    public function printTitles(){
        if(isset($this->titleArray[0])){
            foreach($this->titleArray as $t){
                echo "<li><a ".
                "href='index.php?".
                "action=view&".
                "title=".$t."'>".urldecode($t)."</a></li>";
            }
        }
    }
    
    /* set requested title */
    public function setRequestedTitle($title){
        $this->requestedTitle=$title;
    }
    
    /* find document body by title */
    public function getTextByTitle(){
        $handle = fopen("file.csv", "r");
        if(!$handle){
            echo "Fail to open file";
        }
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if($this->requestedTitle==$data[0]){
                $this->documentText=urldecode($data[1]);
                $this->documentTitle=urldecode($this->requestedTitle);
            }
        }
        fclose($handle);  
    }
}
?>
