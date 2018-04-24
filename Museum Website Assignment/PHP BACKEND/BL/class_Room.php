<?php
require_once(".\DAL\DAL_Room.php");

class Room { 
    private  $idRoom;
    private  $floor;
    private  $number;
    private  $Room_name;
    private  $Room_description;
    private  $Museum_idMuseum;
    private $operation_status=0;
    
    function __construct($idRoom=null, $floor=null, $number=null, $Room_name=null, $Room_description=null, $Museum_idMuseum=null, $operation_status=null) {
        $this->idRoom = $idRoom;
        $this->floor = $floor;
        $this->number = $number;
        $this->Room_name = $Room_name;
        $this->Room_description = $Room_description;
        $this->Museum_idMuseum = $Museum_idMuseum;
        $this->operation_status = $operation_status;
    }

    function setIdRoom($idRoom) {
        $this->idRoom = $idRoom;
    }

    function setFloor($floor) {
        $this->floor = $floor;
    }

    function setNumber($number) {
        $this->number = $number;
    }

    function setRoom_name($Room_name) {
        $this->Room_name = $Room_name;
    }

    function setRoom_description($Room_description) {
        $this->Room_description = $Room_description;
    }

    function setMuseum_idMuseum($Museum_idMuseum) {
        $this->Museum_idMuseum = $Museum_idMuseum;
    }

    function setOperation_status($operation_status) {
        $this->operation_status = $operation_status;
    }

    function getRoom_description() {
        return $this->Room_description;
    }

    function getOperation_status() {
        return $this->operation_status;
    }

        function getIdRoom() {
        return $this->idRoom;
    }

    function getFloor() {
        return $this->floor;
    }

    function getNumber() {
        return $this->number;
    }

    function getRoom_name() {
        return $this->Room_name;
    }

    function getMuseum_idMuseum() {
        return $this->Museum_idMuseum;
    }

    function create_room(){
    $this->operation_status=DAL_Room::{"create_room"}($this->floor,$this->number,$this->Room_name,$this->Room_description,$this->Museum_idMuseum);    
    }
    
    function update_room() {
    $this->operation_status=DAL_Room::{"update_room"}($this->idRoom,$this->floor,$this->number,$this->Room_name,$this->Room_description,$this->Museum_idMuseum);   
    }
    
    static function retrieve_rooms() {
    $rooms=DAL_Room::{"retrieve_rooms"}();   
    return $rooms;
    }
    
    function delete_room() {
    $this->operation_status=DAL_Room::{"delete_room"}($this->idRoom);    
    }
}
