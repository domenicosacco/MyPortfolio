<?php 

require_once(".\DAL\DAL_Museum.php");
        
class Museum { 
    private $Museum_name; 
    private  $Address; 
    private  $Telephone_number; 
    private  $Mail; 
    private  $Museum_info;
    private  $idMuseum;
    private $operation_status=0;
    
    function __construct($idMuseum=null,$Museum_name=null, $Address=null, $Telephone_number=null, $Mail=null, $Museum_info=null, $operation_status=null) {
        $this->Museum_name = $Museum_name;
        $this->Address = $Address;
        $this->Telephone_number = $Telephone_number;
        $this->Mail = $Mail;
        $this->Museum_info = $Museum_info;
        $this->idMuseum = $idMuseum;
        $this->operation_status = $operation_status;
    }

    function setMuseum_name($Museum_name) {
        $this->Museum_name = $Museum_name;
    }

    function setAddress($Address) {
        $this->Address = $Address;
    }

    function setTelephone_number($Telephone_number) {
        $this->Telephone_number = $Telephone_number;
    }

    function setMail($Mail) {
        $this->Mail = $Mail;
    }

    function setMuseum_info($Museum_info) {
        $this->Museum_info = $Museum_info;
    }

    function setIdMuseum($idMuseum) {
        $this->idMuseum = $idMuseum;
    }

    function setOperation_status($operation_status) {
        $this->operation_status = $operation_status;
    }

    function getOperation_status() {
        return $this->operation_status;
    }

        function getMuseum_name() {
        return $this->Museum_name;
    }

    function getAddress() {
        return $this->Address;
    }

    function getTelephone_number() {
        return $this->Telephone_number;
    }

    function getMail() {
        return $this->Mail;
    }

    function getMuseum_info() {
        return $this->Museum_info;
    }

    function getIdMuseum() {
        return $this->idMuseum;
    }

    function create_museum() {
    $this->operation_status=DAL_Museum::{"create_museum"}($this->Museum_name,$this->Address,$this->Telephone_number,$this->Mail,$this->Museum_info);
   } 
   
    function update_museum() { 
    $this->operation_status=DAL_Museum::{"update_museum"}($this->idMuseum,$this->Museum_name,$this->Address,$this->Telephone_number,$this->Mail,$this->Museum_info);
    }
    
    function delete_museum() {   
    $this->operation_status=DAL_Museum::{"delete_museum"}($this->idMuseum);    
    }
    
    static function retrieve_museums() {
    $museums=DAL_Museum::{"retrieve_museums"}();   
    return $museums;
    }
}
?>