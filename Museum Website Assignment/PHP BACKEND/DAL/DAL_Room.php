<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class DAL_Room{   
        
    static function create_room($floor,$number,$name,$description,$Museumid) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("INSERT INTO room (floor,number,Room_name,Room_description,Museum_idMuseum) "
                . "VALUES (:floor,:number,:name,:description,:idMuseum)");
        $stmt->bindParam(":floor", $floor);
        $stmt->bindParam(":number", $number);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":idMuseum", $Museumid);
        $stmt->execute();        
        $sql="INSERT INTO room (floor,number,Room_name,Room_description,Museum_idMuseum) "
                . "VALUES (".$floor.",".$number.",".$name.",".$description.",".$Museumid.")"; 
        echo "<br> SQL Statement: <br>" . $sql;
        $outcome=$stmt->rowCount();
        echo "<br> Inserted ID " .$conn->lastInsertId();
        $conn = null; 
        if($outcome !== 0) {return 0;}
        else {return 1;}
        }
        catch(Exception $e){
        echo "ERROR <br>";
        echo $e->getMessage();
        }
    }
    
        static function retrieve_rooms() {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("SELECT * FROM room");
        $stmt->execute();        
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Room'); 
        $sql = "SELECT * FROM room";
        $visits="";
        while ($room=$stmt->fetch()) {
            $visits = $visits . $room->getIdRoom() . "\t";
            $visits = $visits . $room->getFloor() . "\t";
            $visits = $visits . $room->getNumber() . "\t";
            $visits = $visits . $room->getRoom_name() . "\t";
            $visits = $visits . $room->getRoom_Description() . "\t";
            $visits = $visits . $room->getMuseum_idMuseum() . "<br>";
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
    
        static function delete_room($roomID) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("DELETE FROM room WHERE idRoom=:roomid");
        $sql = "DELETE FROM room WHERE idRoom='" . $roomID ."'";
        $stmt->bindParam(":roomid", $roomID);
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
    
    static function update_room($roomid,$floor,$number,$name,$description,$MuseumID) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("UPDATE room SET floor=:floor,number=:number,Room_name=:name,Room_description=:description,Museum_idMuseum=:Museum_idMuseum WHERE idRoom=:idRoom");
        $stmt->bindParam(":floor", $floor);
        $stmt->bindParam(":number", $number);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":Museum_idMuseum", $MuseumID);
        $stmt->bindParam(":idRoom", $roomid);
        $stmt->execute();        
        $sql="UPDATE room SET floor=:floor,number=:number,Room_name=:name,description=:description,Museum_idMuseum=:Museum_idMuseum WHERE idRoom=:id";      
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