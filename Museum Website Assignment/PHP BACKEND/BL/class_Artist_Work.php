<?php
require_once(".\DAL\DAL_Artist_Work.php");

class Artist_Work { 
    private $Artist_idArtist;
    private $Work_idWork;
    private$contribuition;
    private $operation_status=0;
    
    function __construct($Artist_idArtist=null, $Work_idWork=null, $contribuition=null, $operation_status=null) {
        $this->Artist_idArtist = $Artist_idArtist;
        $this->Work_idWork = $Work_idWork;
        $this->contribuition = $contribuition;
        $this->operation_status = $operation_status;
    }

    function setArtist_idArtist($Artist_idArtist) {
        $this->Artist_idArtist = $Artist_idArtist;
    }

    function setWork_idWork($Work_idWork) {
        $this->Work_idWork = $Work_idWork;
    }

    function setContribuition($contribuition) {
        $this->contribuition = $contribuition;
    }

    function setOperation_status($operation_status) {
        $this->operation_status = $operation_status;
    }

        function getOperation_status() {
        return $this->operation_status;
    }

    function get_Artist_idArtist() {
        return $this->Artist_idArtist;
    }
    
    function get_Work_idWork() {
        return $this->Work_idWork;
    }
    
    function get_contribuition() {
        return $this->contribuition;
    }
    
    function create_artist_work(){
    $this->operation_status=DAL_Artist_Work::{"create_artist_work"}($this->Artist_idArtist,$this->Work_idWork,$this->contribuition);    
    }
    
    function update_artist_work() {
    $this->operation_status=DAL_Artist_Work::{"update_artist_work"}($this->Artist_idArtist,$this->Work_idWork,$this->contribuition);   
    }
    
    static function retrieve_artist_works() {
    $artists=DAL_Artist_Work::{"retrieve_artist_works"}();   
    return $artists;
    }
    
    function delete_artist_work() {
    $this->operation_status=DAL_Artist_Work::{"delete_artist_work"}($this->Artist_idArtist,$this->Work_idWork);    
    }
}
