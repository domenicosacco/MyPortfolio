<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DAL_Work{ 
        
    static function create_work($name,$material,$type,$date,$description,$roomID) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("INSERT INTO work (Work_name,material,type,date,Work_description,Room_idRoom) "
                . "VALUES (:name,:material,:type,:date,:description,:Room_idRoom)");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":material", $material);
        $stmt->bindParam(":type", $type);
        $stmt->bindParam(":date", $date);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":Room_idRoom", $roomID);
        $stmt->execute();        
        $sql="INSERT INTO work (Work_name,material,type,date,Work_description,Room_idRoom) "
                . "VALUES (".$name.",".$material.",".$type.",".$date.",".$description.",".$roomID.")"; 
        echo "<br> SQL Statement: <br>" . $sql;
        $outcome=$stmt->rowCount();
        echo "Affected rows: " .$outcome;
        $conn = null; 
        if($outcome !== 0) {return 0;}
        else {return 1;}
        }
        catch(Exception $e){
        echo "ERROR <br>";
        echo $e->getMessage();
        }
    }
    
        static function retrieve_works() {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("SELECT * FROM work");
        $stmt->execute();        
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Work'); 
        $sql = "SELECT * FROM work";
        $visits="";
        while ($work=$stmt->fetch()) {
            $visits = $visits . $work->getIdWork() . "\t";
            $visits = $visits . $work->getWork_name(). "\t";
            $visits = $visits . $work->getMaterial() . "\t";
            $visits = $visits . $work->getType() . "\t";
            $visits = $visits . $work->getDate() . "\t";
            $visits = $visits . $work->getWork_description() . "\t";
            $visits = $visits . $work->getRoom_idRoom() . "<br>";
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
    
        static function delete_work($workID) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("DELETE FROM work WHERE idWork=:workid");
        $stmt->bindParam(":workid", $workID);
        $sql = "DELETE FROM work WHERE idWork='" . $workID ."'";
        $stmt->execute();
        $outcome=$stmt->rowCount();
        echo "<br> SQL Statement: <br> " . $sql;
        $conn = null; 
        return $outcome;
        }
        catch(Exception $e){
        echo "ERROR <br>";
        echo $e->getMessage();
        }
    }
    
    static function update_work($workID,$name,$material,$type,$date,$description,$roomID) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("UPDATE work SET Work_name=:name,material=:material,type=:type,date=:date,Work_description=:description,Room_idRoom=:Room_idRoom WHERE idWork=:idWork");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":material", $material);
        $stmt->bindParam(":type", $type);
        $stmt->bindParam(":date", $date);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":Room_idRoom", $roomID);
        $stmt->bindParam(":idWork", $workID);
        $stmt->execute();        
        $sql="UPDATE work SET Work_name=:name,material=:material,type=:type,date=:date,Work_description=:description,Room_idRoom=:Room_idRoom WHERE idWork=:idWork";      
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