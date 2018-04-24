<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DAL_Website_Visitor { 
    
    static function save_session($b,$c,$d) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("INSERT INTO website_visitor (visited_pages,visit_start,visit_end) VALUES (:b,:c,:d)");
        $stmt->bindParam(":b", $b);
        $stmt->bindParam(":c", $c);
        $stmt->bindParam(":d", $d);
        $stmt->execute();
        $sql="INSERT INTO website_visitor (visited_pages,visit_start,visit_end) VALUES (".$b.",'".$c."','".$d."')";   
        echo "<br> SQL Statement: <br> " . $sql;
        $outcome=$stmt->rowCount();
        echo "<br> Affected rows: " . $outcome;
        $conn = null; 
        if ($outcome !==0) {return 0;}
        else {return 1;}
        }
        catch(Exception $e){
        echo "ERROR <br>";
        echo $e->getMessage();
        }
    }
    
    static function retrieve_visits() {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("SELECT * from Website_Visitor");
        $sql = "SELECT * from Website_Visitor";
        echo "<br> SQL Statement: <br> " . $sql;
        $visits="";
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Website_Visitor'); 
        while($user=$stmt->fetch()) {
            $visits = $visits . $user->getIdVisitor() . "\t";
            $visits = $visits . $user->getVisited_pages() . "\t";
            $visits = $visits . $user->getVisit_start() . "\t";
            $visits = $visits . $user->getVisit_end() . "<br>";
        }        
        $stmt->closeCursor();
        $conn = null; 
        echo "<br> SQL Statement: <br> " . $sql;
        return $visits;
        }
        
        catch(Exception $e){
        echo "ERROR <br>";
        echo $e->getMessage();
        }
    }
    
        static function update_visit($idVisitor,$visited_pages,$visit_start,$visit_end) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("UPDATE website_visitor SET visited_pages=:visited_pages,visit_start=:visit_start,visit_end=:visit_end WHERE idVisitor=:id");
        $stmt->bindParam(":visited_pages", $visited_pages);
        $stmt->bindParam(":visit_start", $visit_start);
        $stmt->bindParam(":visit_end", $visit_end);
        $stmt->bindParam(":id", $idVisitor);
        $stmt->execute();        
        $sql="UPDATE website_visitor SET visited_pages=:visited_pages,visit_start=:visit_start,visit_end=:visit_end WHERE idVisitor=:id";      
        echo "<br> SQL Statement: <br>" . $sql;
         $outcome=$stmt->rowCount();
        echo "<br> Affected Rows: " .$outcome;
        $conn = null; 
        if($outcome !== 0) {return 0;}
        else {return 1;}
        }
        catch(Exception $e){
        echo "ERROR <br>";
        echo $e->getMessage();
        }
    }
    
        static function delete_visit($visitorID) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("DELETE FROM website_visitor WHERE idVisitor=:id");
        $stmt->bindParam(":id", $visitorID);
        $sql = "DELETE FROM website_visitor WHERE idVisitor='" . $visitorID ."'";
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
    
}
    
?>