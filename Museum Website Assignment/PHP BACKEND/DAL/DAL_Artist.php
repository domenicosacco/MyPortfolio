<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DAL_Artist{ 
    
    static function create_artist($Name,$Description,$Born_date,$Death_date) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("INSERT INTO artist (Artist_name,Artist_description,Born_date,Death_date) "
                . "VALUES (:name,:Description,:Born_date,:Death_date)");
        $stmt->bindParam(":name", $Name);
        $stmt->bindParam(":Description", $Description);
        $stmt->bindParam(":Born_date", $Born_date);
        $stmt->bindParam(":Death_date", $Death_date);
        $stmt->execute();        
        $sql="INSERT INTO artist (Artist_name,Artist_description,Born_date,Death_date) "
                . "VALUES (".$Name.",".$Description.",".$Born_date.",".$Death_date.")"; 
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
    
        static function retrieve_artists() {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("SELECT * FROM artist");
        $stmt->execute();        
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Artist'); 
        $sql = "SELECT * from artist";
        $visits="";
        while ($artist=$stmt->fetch()) {
            $visits = $visits . $artist->get_idArtist() . "\t";
            $visits = $visits . $artist->get_Artist_name() . "\t";
            $visits = $visits . $artist->get_Artist_description() . "\t";
            $visits = $visits . $artist->get_Born_date() . "\t";
            $visits = $visits . $artist->get_Death_date() . "<br>";
        }        
        $stmt->closeCursor();
        echo "<br> SQL Statemenct: <br> " . $sql;
        $conn = null; 
        return $visits;
        }
        
        catch(Exception $e){
        echo "ERROR <br>";
        echo $e->getMessage();
        }
    }
    
        static function delete_artist($artistID) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("DELETE FROM artist WHERE idArtist=:artistid");
        $sql = "DELETE FROM artist WHERE idArtist='" . $artistID ."'";
        $stmt->bindParam(":artistid", $artistID);
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
    
    static function update_artist($idArtist,$Name,$Description,$Born_date,$Death_date) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("UPDATE artist SET Artist_name=:Name,Artist_description=:Description,Born_date=:Born_date,Death_date=:Death_date WHERE idArtist=:id");
        $stmt->bindParam(":Name", $Name);
        $stmt->bindParam(":Description", $Description);
        $stmt->bindParam(":Born_date", $Born_date);
        $stmt->bindParam(":Death_date", $Death_date);
        $stmt->bindParam(":id", $idArtist);
        $stmt->execute();        
        $sql="UPDATE artist SET Artist_name=:Name,Artist_description=:Description,Born_date=:Born_date,Death_date=:Death_date WHERE idArtist=:id";      
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