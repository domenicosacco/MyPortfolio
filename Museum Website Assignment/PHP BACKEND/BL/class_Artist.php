<?php
require_once(".\DAL\DAL_Artist.php");

class Artist { 
    private $idArtist;
    private $Artist_name;
    private $Artist_description;
    private $Born_date;
    private $Death_date;
    private $operation_status=0;
    
    function __construct($idArtist =null, $Artist_name =null, $Artist_description=null, $Born_date=null, $Death_date=null, $operation_status=null) {
        $this->idArtist = $idArtist;
        $this->Artist_name = $Artist_name;
        $this->Artist_description = $Artist_description;
        $this->Born_date = $Born_date;
        $this->Death_date = $Death_date;
        $this->operation_status = $operation_status;
    }

    function setIdArtist($idArtist) {
        $this->idArtist = $idArtist;
    }

    function setArtist_name($Artist_name) {
        $this->Artist_name = $Artist_name;
    }

    function setArtist_description($Artist_description) {
        $this->Artist_description = $Artist_description;
    }

    function setBorn_date($Born_date) {
        $this->Born_date = $Born_date;
    }

    function setDeath_date($Death_date) {
        $this->Death_date = $Death_date;
    }

    function setOperation_status($operation_status) {
        $this->operation_status = $operation_status;
    }

    function getOperation_status() {
        return $this->operation_status;
    }

    function get_idArtist() {
        return $this->idArtist;
    }
    
    function get_Artist_Name() {
        return $this->Artist_name;
    }
 
    function get_Artist_description() {
        return $this->Artist_description;
    }

    function get_Born_date() {
        return $this->Born_date;
    }

    function get_Death_date() {
        return $this->Death_date;
    }
    
    function create_artist(){
    $this->operation_status=DAL_Artist::{"create_artist"}($this->Artist_name,$this->Artist_description,$this->Born_date,$this->Death_date);    
    }
    
    function update_artist() {
    $this->operation_status=DAL_Artist::{"update_artist"}($this->idArtist,$this->Artist_name,$this->Artist_description,$this->Born_date,$this->Death_date);   
    }
    
    static function retrieve_artists() {
    $artists=DAL_Artist::{"retrieve_artists"}();   
    return $artists;
    }
    
    function delete_artist() {
    $this->operation_status=DAL_Artist::{"delete_artist"}($this->idArtist);    
    }
}
