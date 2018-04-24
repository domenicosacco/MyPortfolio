<?php
require_once(".\DAL\DAL_Event_Artist.php");

class Event_Artist { 
    private $Artist_idArtist;
    private $Event_idEvent;
    private $details;
    private $start_date;
    private $end_date;
    private $operation_status=0;
    
    function __construct($Artist_idArtist=null, $Event_idEvent=null, $start_date=null, $end_date=null, $details=null, $operation_status=null) {
        $this->Artist_idArtist = $Artist_idArtist;
        $this->Event_idEvent = $Event_idEvent;
        $this->details = $details;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->operation_status = $operation_status;
    }

    function setArtist_idArtist($Artist_idArtist) {
        $this->Artist_idArtist = $Artist_idArtist;
    }

    function setEvent_idEvent($Event_idEvent) {
        $this->Event_idEvent = $Event_idEvent;
    }

    function setDetails($details) {
        $this->details = $details;
    }

    function setStart_date($start_date) {
        $this->start_date = $start_date;
    }

    function setEnd_date($end_date) {
        $this->end_date = $end_date;
    }

    function setOperation_status($operation_status) {
        $this->operation_status = $operation_status;
    }

    function getOperation_status() {
        return $this->operation_status;
    }

        function getArtist_idArtist() {
        return $this->Artist_idArtist;
    }

    function getEvent_idEvent() {
        return $this->Event_idEvent;
    }

    function getDetails() {
        return $this->details;
    }

    function getStart_date() {
        return $this->start_date;
    }

    function getEnd_date() {
        return $this->end_date;
    }

    function create_event_artist(){
    $this->operation_status=DAL_Event_Artist::{"create_event_artist"}($this->Artist_idArtist,$this->Event_idEvent,$this->start_date,$this->end_date,$this->details);    
    }
    
    function update_event_artist() {
    $this->operation_status=DAL_Event_Artist::{"update_event_artist"}($this->Artist_idArtist,$this->Event_idEvent,$this->start_date,$this->end_date,$this->details);   
    }
    
    static function retrieve_event_artists() {
    $artists=DAL_Event_Artist::{"retrieve_event_artists"}();   
    return $artists;
    }
    
    function delete_event_artist() {
    $this->operation_status=DAL_Event_Artist::{"delete_event_artist"}($this->Artist_idArtist,$this->Event_idEvent);    
    }
    
}
