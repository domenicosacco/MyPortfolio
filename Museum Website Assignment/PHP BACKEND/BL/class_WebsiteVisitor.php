<?php 

require_once(".\DAL\DAL_WebsiteVisitor.php");
        
class Website_Visitor { 
    private $idVisitor;
    private  $visited_pages; 
    private  $visit_start; 
    private  $visit_end; 
    private $operation_result;
    
    function __construct($idVisitor=null, $visited_pages=null, $visit_start=null, $visit_end=null, $operation_result=null) {
        $this->idVisitor = $idVisitor;
        $this->visited_pages = $visited_pages;
        $this->visit_start = $visit_start;
        $this->visit_end = $visit_end;
        $this->operation_result = $operation_result;
    }

    function setIdVisitor($idVisitor) {
        $this->idVisitor = $idVisitor;
    }

    function setVisited_pages($visited_pages) {
        $this->visited_pages = $visited_pages;
    }

    function setVisit_start($visit_start) {
        $this->visit_start = $visit_start;
    }

    function setVisit_end($visit_end) {
        $this->visit_end = $visit_end;
    }

    function setOperation_result($operation_result) {
        $this->operation_result = $operation_result;
    }

        function getOperation_result() {
        return $this->operation_result;
    }

        function getIdVisitor() {
        return $this->idVisitor;
    }

    function getVisited_pages() {
        return $this->visited_pages;
    }

    function getVisit_start() {
        return $this->visit_start;
    }

    function getVisit_end() {
        return $this->visit_end;
    }

    function visit_start() {
        $this->visit_start=date("Y-m-d H:i:s");
    }
    
    function visit_page() {
        $this->visited_pages++;
    }
    
    function end_visit() {
        $this->visit_end=date("Y-m-d H:i:s"); 
    }
    
    function visit_log() {
        return "VISITED PAGES : " . $this->visited_pages . "<br> VISIT DURATION : " . $this->visit_start . " - " . $this->visit_end;
    }
    
    //this is the create operation
    function save_session() {
        $this->operation_result=DAL_Website_Visitor::{"save_session"}($this->visited_pages,$this->visit_start,$this->visit_end);
    }
    
    static function retrieve_visits() {
        $visits = DAL_Website_Visitor::{"retrieve_visits"}();
        return $visits;
    }
    
    function update_visit() {
        $this->operation_result=DAL_Website_Visitor::{"update_visit"}($this->idVisitor,$this->visited_pages,$this->visit_start,$this->visit_end);
    }
    
    function delete_visit() {
        $this->operation_result=DAL_Website_Visitor::{"delete_visit"}($this->idVisitor);
    }
    
   } 
?>
