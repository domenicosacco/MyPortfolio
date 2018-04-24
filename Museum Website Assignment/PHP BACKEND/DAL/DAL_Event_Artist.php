<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class DAL_Event_Artist{ 
        
    static function create_event_artist($Artist_idArtist,$Event_idEvent,$start_date,$end_date,$details) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("INSERT INTO event_artist (Artist_idArtist,Event_idEvent,start_date,end_date,details) "
                . "VALUES (:Artist_idArtist,:Event_idEvent,:start_date,:end_date,:details)");
        $stmt->bindParam(":Artist_idArtist", $Artist_idArtist);
        $stmt->bindParam(":Event_idEvent", $Event_idEvent);
        $stmt->bindParam(":start_date", $start_date);
        $stmt->bindParam(":end_date", $end_date);
        $stmt->bindParam(":details", $details);
        $stmt->execute();        
        $sql="INSERT INTO event_artist (Artist_idArtist,Event_idEvent,start_date,end_date,details) "
                . "VALUES (".$Artist_idArtist.",".$Event_idEvent.",".$start_date.",".$end_date.",".$details.")"; 
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
    
        static function retrieve_event_artists() {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("SELECT * FROM event_artist");
        $stmt->execute();        
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Event_Artist'); 
        $sql = "SELECT * FROM event_artist";
        $visits="";
        while ($event_artist=$stmt->fetch()) {
            $visits = $visits . $event_artist->getArtist_idArtist() . "\t";
            $visits = $visits . $event_artist->getEvent_idEvent() . "\t";
            $visits = $visits . $event_artist->getStart_date() . "\t";
            $visits = $visits . $event_artist->getEnd_date() . "\t";
            $visits = $visits . $event_artist->getDetails() . "<br>";
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
    
        static function delete_event_artist($artistID,$eventID) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("DELETE FROM event_artist WHERE Artist_idArtist=:artistid AND Event_idEvent=:eventid");
        $sql = "DELETE FROM event_artist WHERE Artist_idArtist='" . $artistID ."' AND Event_idEvent='" . $eventID ."'";
        $stmt->bindParam(":artistid", $artistID);
        $stmt->bindParam(":eventid", $eventID);
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
    
    static function update_event_artist($Artist_idArtist,$Event_idEvent,$start_date,$end_date,$details) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("UPDATE event_artist SET start_date=:start_date,end_date=:end_date,details=:details WHERE Artist_idArtist=:idArtist AND Event_idEvent=:idEvent");
        $stmt->bindParam(":start_date", $start_date);
        $stmt->bindParam(":end_date", $end_date);
        $stmt->bindParam(":details", $details);
        $stmt->bindParam(":idArtist", $Artist_idArtist);
        $stmt->bindParam(":idEvent", $Event_idEvent);
        $stmt->execute();        
        $sql="UPDATE event_artist SET start_date=:start_date,end_date=:end_date,details=:details WHERE Artist_idArtist=:idArtist AND Event_idEvent=:idEvent";      
        echo "<br> SQL Statement: <br>" . $sql;
        $outcome=$stmt->rowCount();
        echo "<br> Inserted ID " .$outcome;
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