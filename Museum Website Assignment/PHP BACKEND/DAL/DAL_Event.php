<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class DAL_Event{ 
        
    static function create_event($start_date,$end_date,$name,$max_tickets,$full_price,$student_price,$reduced_price,$info,$Museumid) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("INSERT INTO event (start_date,end_date,Event_name,max_tickets,Event_info,Museum_idMuseum,full_price,reduced_price,student_price) "
                . "VALUES (:start_date,:end_date,:name,:max_tickets,:info,:Museum_idMuseum,:full_price,:reduced_price,:student_price)");
        $stmt->bindParam(":start_date", $start_date);
        $stmt->bindParam(":end_date", $end_date);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":max_tickets", $max_tickets);
        $stmt->bindParam(":full_price", $full_price);
        $stmt->bindParam(":reduced_price", $reduced_price);
        $stmt->bindParam(":student_price", $student_price);
        $stmt->bindParam(":info", $info);
        $stmt->bindParam(":Museum_idMuseum", $Museumid);
        $stmt->execute();        
        $sql="INSERT INTO event (start_date,end_date,Event_name,max_tickets,Event_info,Museum_idMuseum,full_price,reduced_price,student_price) "
                . "VALUES (".$start_date.",".$end_date.",".$name.",".$max_tickets.",".$info.",".$Museumid.",".$full_price.",".$reduced_price.",".$student_price.")"; 
        echo "<br> SQL Statement: <br>" . $sql;
        $outcome=$stmt->rowCount();
        echo "<br> Affected rows " .$outcome;
        $conn = null; 
        if($outcome !== 0) {return 0;}
        else {return 1;}
        }
        catch(Exception $e){
        echo "ERROR <br>";
        echo $e->getMessage();
        }
    }
    
        static function retrieve_events() {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("SELECT * FROM event");
        $stmt->execute();        
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Event'); 
        $sql = "SELECT * FROM event";
        $visits="";
        while ($event=$stmt->fetch()) {
            $visits = $visits . $event->get_idEvent() . "\t";
            $visits = $visits . $event->get_start_date() . "\t";
            $visits = $visits . $event->get_end_date() . "\t";
            $visits = $visits . $event->get_Event_name() . "\t";
            $visits = $visits . $event->get_max_tickets(). "\t";
            $visits = $visits . $event->get_full_price(). "\t";
            $visits = $visits . $event->get_student_price() . "\t";
            $visits = $visits . $event->get_reduced_price() . "\t";
            $visits = $visits . $event->get_Event_info() . "\t";
            $visits = $visits . $event->get_Museum_idMuseum(). "<br>";
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
    
        static function delete_event($eventID) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("DELETE FROM event WHERE idEvent=:eventid");
        $sql = "DELETE FROM event WHERE idEvent='" . $eventID ."'";
        $stmt->bindParam(":eventid", $eventID);
        $stmt->execute();
        $outcome=$stmt->rowCount();
        echo "<br> SQL Statement: <br> " . $sql;
        $conn = null; 
        if ($outcome !== 0 ) {return 0;}
        else {return 1;}
        }
        catch(Exception $e){
        echo "ERROR <br>";
        echo $e->getMessage();
        }
    }
    
    static function update_event($id,$start_date,$end_date,$name,$max_tickets,$full_price,$student_price,$reduced_price,$info,$Museumid) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("UPDATE event SET start_date=:start_date,end_date=:end_date,Event_name=:name,max_tickets=:max_tickets,full_price=:full_price,reduced_price=:reduced_price,student_price=:student_price,Event_info=:info,Museum_idMuseum=:Museum_idMuseum WHERE idEvent=:id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":start_date", $start_date);
        $stmt->bindParam(":end_date", $end_date);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":max_tickets", $max_tickets);
        $stmt->bindParam(":full_price", $full_price);
        $stmt->bindParam(":reduced_price", $reduced_price);
        $stmt->bindParam(":student_price", $student_price);
        $stmt->bindParam(":info", $info);
        $stmt->bindParam(":Museum_idMuseum", $Museumid);
        $stmt->execute();        
        $sql="UPDATE event SET start_date=".$start_date.",end_date=".$end_date.",Event_name=".$name.",max_tickets=".$max_tickets.",full_price=".$full_price.",reduced_price=".$reduced_price.",student_price=".$student_price.",Event_info=".$info.",Museum_idMuseum=".$Museumid." WHERE idEvent=".$id."";      
        echo "<br> SQL Statement: <br>" . $sql;
        $outcome=$stmt->rowCount();
        echo "<br> Affected Rows " .$outcome;
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