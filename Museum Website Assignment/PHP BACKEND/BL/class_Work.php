<?php
require_once(".\DAL\DAL_Work.php");

class Work { 
    private $idWork;
    private $Work_name;
    private $material;
    private $type;
    private $date;
    private $Work_description;
    private $Room_idRoom;
    private $operation_status=0;
    
    function __construct($idWork=null, $Work_name=null, $material=null, $type=null, $date=null, $Work_description=null, $Room_idRoom=null, $operation_status=null) {
        $this->idWork = $idWork;
        $this->Work_name = $Work_name;
        $this->material = $material;
        $this->type = $type;
        $this->date = $date;
        $this->Work_description = $Work_description;
        $this->Room_idRoom = $Room_idRoom;
        $this->operation_status = $operation_status;
    }

    function setIdWork($idWork) {
        $this->idWork = $idWork;
    }

    function setWork_name($Work_name) {
        $this->Work_name = $Work_name;
    }

    function setMaterial($material) {
        $this->material = $material;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setWork_description($Work_description) {
        $this->Work_description = $Work_description;
    }

    function setRoom_idRoom($Room_idRoom) {
        $this->Room_idRoom = $Room_idRoom;
    }

    function setOperation_status($operation_status) {
        $this->operation_status = $operation_status;
    }

    function getOperation_status() {
        return $this->operation_status;
    }

        function getIdWork() {
        return $this->idWork;
    }

    function getWork_name() {
        return $this->Work_name;
    }

    function getMaterial() {
        return $this->material;
    }

    function getType() {
        return $this->type;
    }

    function getDate() {
        return $this->date;
    }

    function getWork_description() {
        return $this->Work_description;
    }

    function getRoom_idRoom() {
        return $this->Room_idRoom;
    }

    function create_work(){
    $this->operation_status=DAL_Work::{"create_work"}($this->Work_name,$this->material,$this->type,$this->date,$this->Work_description,$this->Room_idRoom);    
    }
    
    function update_work() {
    $this->operation_status=DAL_Work::{"update_work"}($this->idWork,$this->Work_name,$this->material,$this->type,$this->date,$this->Work_description,$this->Room_idRoom);   
    }
    
    static function retrieve_works() {
    $events=DAL_Work::{"retrieve_works"}();   
    return $events;
    }
    
    function delete_work() {
    $this->operation_status=DAL_Work::{"delete_work"}($this->idWork);    
    }
}
