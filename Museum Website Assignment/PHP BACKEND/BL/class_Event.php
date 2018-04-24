<?php
require_once(".\DAL\DAL_Event.php");

class Event { 
    private $idEvent;
    private $start_date;
    private $end_date;
    private $Event_name;
    private $max_tickets;
    private $full_price;
    private $reduced_price;
    private $student_price;
    private $Event_info;
    private $Museum_idMuseum;
    private $operation_status=0;
    
    function __construct($idEvent=null, $start_date=null, $end_date=null, $Event_name=null, $max_tickets=null, $full_price=null, $reduced_price=null, $student_price=null, $Event_info=null, $Museum_idMuseum=null, $operation_status=null) {
        $this->idEvent = $idEvent;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->Event_name = $Event_name;
        $this->max_tickets = $max_tickets;
        $this->full_price = $full_price;
        $this->reduced_price = $reduced_price;
        $this->student_price = $student_price;
        $this->Event_info = $Event_info;
        $this->Museum_idMuseum = $Museum_idMuseum;
        $this->operation_status = $operation_status;
    }

    function setIdEvent($idEvent) {
        $this->idEvent = $idEvent;
    }

    function setStart_date($start_date) {
        $this->start_date = $start_date;
    }

    function setEnd_date($end_date) {
        $this->end_date = $end_date;
    }

    function setEvent_name($Event_name) {
        $this->Event_name = $Event_name;
    }

    function setMax_tickets($max_tickets) {
        $this->max_tickets = $max_tickets;
    }

    function setFull_price($full_price) {
        $this->full_price = $full_price;
    }

    function setReduced_price($reduced_price) {
        $this->reduced_price = $reduced_price;
    }

    function setStudent_price($student_price) {
        $this->student_price = $student_price;
    }

    function setEvent_info($Event_info) {
        $this->Event_info = $Event_info;
    }

    function setMuseum_idMuseum($Museum_idMuseum) {
        $this->Museum_idMuseum = $Museum_idMuseum;
    }

    function setOperation_status($operation_status) {
        $this->operation_status = $operation_status;
    }

    function getOperation_status() {
        return $this->operation_status;
    }

        function get_idEvent() {
        return $this->idEvent;
    }
    
    function get_start_date() {
        return $this->start_date;
    }
    
    function get_end_date() {
        return $this->end_date;
    }
    
    function get_Event_name() {
        return $this->Event_name;
    }
    
    function get_max_tickets() {
        return $this->max_tickets;
    }
    
    function get_full_price() {
        return $this->full_price;
    }
    
    function get_reduced_price() {
        return $this->reduced_price;
    }
    
    function get_student_price() {
        return $this->student_price;
    }
    
    function get_Event_info() {
        return $this->Event_info;
    }
    
    function get_Museum_idMuseum() {
        return $this->Museum_idMuseum;
    }
    
    function create_event(){
    $this->operation_status=DAL_Event::{"create_event"}($this->start_date,$this->end_date,$this->Event_name,$this->max_tickets,$this->full_price,$this->student_price,$this->reduced_price,$this->Event_info,$this->Museum_idMuseum);    
    }
    
    function update_event() {
    $this->operation_status=DAL_Event::{"update_event"}($this->idEvent,$this->start_date,$this->end_date,$this->Event_name,$this->max_tickets,$this->full_price,$this->student_price,$this->reduced_price,$this->Event_info,$this->Museum_idMuseum);   
    }
    
    static function retrieve_events() {
    $events=DAL_Event::{"retrieve_events"}();   
    return $events;
    }
    
    function delete_event() {
    $this->operation_status=DAL_Event::{"delete_event"}($this->idEvent);    
    }
}
