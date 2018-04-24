<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DAL_Artist_Work{ 
        
    static function create_artist_work($Artist_idArtist,$Work_idWork,$contribuition) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("INSERT INTO artist_work (Artist_idArtist,Work_idWork,contribuition) "
                . "VALUES (:Artist_idArtist,:Work_idWork,:contribuition)");
        $stmt->bindParam(":Artist_idArtist", $Artist_idArtist);
        $stmt->bindParam(":Work_idWork", $Work_idWork);
        $stmt->bindParam(":contribuition", $contribuition);
        $stmt->execute();        
        $sql="INSERT INTO artist_work (Artist_idArtist,Work_idWork,contribuition) "
                . "VALUES (".$Artist_idArtist.",".$Work_idWork.",".$contribuition.")"; 
        echo "<br> SQL Statement: <br>" . $sql;
        $stmt->rowCount();
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
    
        static function retrieve_artist_works() {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("SELECT * FROM artist_work ");
        $stmt->execute();        
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Artist_Work');  
        $sql = "SELECT * FROM artist_work";
        $visits="";
        while ($artist_work=$stmt->fetch()) {
            $visits = $visits . $artist_work->get_Artist_idArtist() . "\t";
            $visits = $visits . $artist_work->get_Work_idWork(). "\t";
            $visits = $visits . $artist_work->get_contribuition() . "<br>";
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
    
        static function delete_artist_work($artistID,$workID) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("DELETE FROM artist_work WHERE Artist_idArtist=:artistid AND Work_idWork=:workid");
        $sql = "DELETE FROM artist_work WHERE Artist_idArtist='" . $artistID ."' AND Work_idWork='" . $workID ."'";
        $stmt->bindParam(":artistid", $artistID);
        $stmt->bindParam(":workid", $workID);
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
    
    static function update_artist_work($Artist_idArtist,$Work_idWork,$contribuition) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("UPDATE artist_work SET contribuition=:contribuition WHERE Artist_idArtist=:idArtist AND Work_idWork=:idWork");
        $stmt->bindParam(":contribuition", $contribuition);
        $stmt->bindParam(":idArtist", $Artist_idArtist);
        $stmt->bindParam(":idWork", $Work_idWork);
        $stmt->execute();        
        $sql="UPDATE artist_work SET contribuition=:contribuition WHERE Artist_idArtist=:idArtist AND Work_idWork=:idWork";      
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