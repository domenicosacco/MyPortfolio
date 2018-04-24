<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DAL_Ticket{ 
        
     static function get_places($conn,$eventid) {
        $stmt = $conn->prepare("SELECT * FROM event WHERE idEvent=:eventid");
        $stmt->bindParam(":eventid", $eventid);
        $stmt->execute();        
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Event'); 
        $sql_event = "SELECT * FROM event WHERE idEvent='" . $eventid . "'"; 
        $num_places=0;
         while ($event=$stmt->fetch()) {
            $num_places=$event->get_max_tickets();
        }
        $stmt->closeCursor();
        return $num_places;
        }
        
        static function get_tickets($conn,$eventid) {
        $stmt = $conn->prepare("SELECT COUNT(*) FROM ticket WHERE Event_idEvent=:eventid");
        $stmt->bindParam(":eventid", $eventid);
        $stmt->execute();        
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $sql_event = "SELECT COUNT(*) FROM ticket WHERE idEvent='" . $eventid . "'";  
        $stmt->execute();
        $num_tickets=$stmt->fetchColumn();
        $stmt->closeCursor();
        return $num_tickets;
        }
        
        static function confirm_capacity($conn,$eventid) {
        $num_places=self::get_places($conn,$eventid);
        $num_tickets=self::get_tickets($conn,$eventid);  
        echo "<br> Places taken: " . $num_tickets ."/". $num_places . "<br>";
        if ($num_places>$num_tickets) {return true;}
        else {return false;}
        }
        
        static function retrieve_eventdate($conn,$EventID) {
        $stmt = $conn->prepare("SELECT * FROM event WHERE idEvent=:id");
        $stmt->bindParam(":id", $EventID);
        $stmt->execute();        
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Event');
        $sql = "SELECT * FROM event WHERE name='" . $EventID . "'"; 
        while ($event=$stmt->fetch()) {
            $eventID=$event->get_start_date();
        }
        $stmt->closeCursor();
        return $eventID;    
        }
        
        static function retrieve_price($conn,$EventID,$type) {
        $stmt = $conn->prepare("SELECT * FROM event WHERE idEvent=:id");
        $stmt->bindParam(":id", $EventID);
        $stmt->execute();        
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Event');
        $sql = "SELECT * FROM event WHERE idEvent='" . $EventID. "'";
        while ($event=$stmt->fetch()) {
            if ($type=='full') {$price=$event->get_full_price();}
            if ($type=='reduced') {$price=$event->get_reduced_price();}
            if ($type=='student') {$price=$event->get_student_price();}
        }
        $stmt->closeCursor();
        return $price; 
        }
        
        static function retrieve_tickets() {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("SELECT * FROM ticket");
        $stmt->execute();        
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Ticket'); 
        $sql = "SELECT * FROM ticket";
        $visits="";
        while ($ticket=$stmt->fetch()) {
            $visits = $visits . $ticket->getidTicket() . "\t";
            $visits = $visits . $ticket->getPerson_name() . "\t";
            $visits = $visits . $ticket->getPurchase_date() . "\t";
            $visits = $visits . $ticket->getValidity_date() . "\t";
            $visits = $visits . $ticket->getPrice() . "\t";
            $visits = $visits . $ticket->getEvent_idEvent() . "\t";
            $visits = $visits . $ticket->getBuyerID() . "<br>";
        }        
        $stmt->closeCursor();
        echo "<br> SQL Statement: <br> " . $sql;
        $conn = null; 
        return $visits;
        }
        
        catch(Exception $e){
        echo "ERROR <br>";
        echo $e->getMessage();
        }
    }
    
    static function create_ticket($type,$person_name,$EventID,$BuyerID) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        echo "<br> Event ID" . $EventID . "<br>";
        $purchase_date=date("Y-m-d H:i:s");
        $array[1]=$purchase_date;
        $validity_date=self::retrieve_eventdate($conn,$EventID);
        echo "<br> validity_date " . $validity_date . "<br>";
        $array[2]=$validity_date;
        $price=self::retrieve_price($conn,$EventID,$type);
        echo "<br> price " . $price . "<br>";
        echo "<br> Buyer ID " .  $BuyerID . "<br>";
        $array[3]=$price;
        $available=self::confirm_capacity($conn,$EventID);
        if ($available==true) {
        $stmt = $conn->prepare("INSERT INTO ticket (type,person_name,purchase_date,validity_date,price,Event_idEvent,BuyerID) "
                . "VALUES (:type,:person_name,:purchase_date,:validity_date,:price,:eventid,:buyerid)");
        $stmt->bindParam(":type", $type);
        $stmt->bindParam(":person_name", $person_name);
        $stmt->bindParam(":purchase_date", $purchase_date);
        $stmt->bindParam(":validity_date", $validity_date);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":eventid", $EventID);
        $stmt->bindParam(":buyerid", $BuyerID);
        $stmt->execute();        
        $sql="INSERT INTO ticket (type,person_name,purchase_date,validity_date,price,Event_idEvent,BuyerID) "
                . "VALUES ('".$type."','".$person_name."','".$purchase_date."','" .$validity_date."','".$price."'," .$EventID."," .$BuyerID.")";  
        echo "<br> SQL Statement: <br>" . $sql;
        $outcome=$stmt->rowCount();
        echo "<br> Affected rows: " .$outcome;
        }
        else {$outcome=0;}
        $conn = null; 
        if($outcome !== 0) {$array[0]=0;}
        else {$array[0]=1;}
        }
        catch(Exception $e){
        echo "ERROR <br>";
        echo $e->getMessage();
        }
    
    return $array;
    }
    
    static function delete_ticket($ticketID) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("DELETE FROM ticket WHERE idTicket=:ticketid");
        $sql = "DELETE FROM ticket WHERE idTicket='" . $ticketID ."'";
        $stmt->bindParam(":ticketid", $ticketID);
        $stmt->execute();   
        $outcome=$stmt->rowCount();
        echo "<br> SQL Statement: <br> " . $sql;
        $conn = null; 
        if ($outcome !== 0) {return 0;}
        else {return 1;}
        }
        catch(Exception $e){
        echo "ERROR <br>";
        echo $e->getMessage();
        }
    }
    
    static function update_ticket($ticketID,$type,$person_name,$EventID,$userid) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("UPDATE ticket SET type=:type,person_name=:person_name,Event_idEvent=:Event_idEvent,BuyerID=:BuyerID WHERE idTicket=:id");
        $stmt->bindParam(":type", $type);
        $stmt->bindParam(":person_name", $person_name);
        $stmt->bindParam(":Event_idEvent", $EventID);
        $stmt->bindParam(":BuyerID", $userid);
        $stmt->bindParam(":id", $ticketID);
        $stmt->execute();        
        $sql="";      
        echo "<br> SQL Statement: <br>" . $sql;
         $outcome=$stmt->rowCount();
        echo "<br> Affected rows: " .$outcome;
        $conn = null; 
        if($outcome !== 0) {return 0;}
        else {return 1;}
        }
        catch(Exception $e){
        echo "ERROR <br>";
        echo $e->getMessage();
        }
    }
}
?>