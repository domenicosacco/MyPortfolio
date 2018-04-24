<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DAL_Museum{ 
    static function create_museum($name,$address,$Telephone_number,$mail,$info) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("INSERT INTO museum (Museum_name,address,Telephone_number,Mail,Museum_info) VALUES (:name,:address,:Telephone_number,:mail,:info)");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":Telephone_number", $Telephone_number);
        $stmt->bindParam(":mail", $mail);
        $stmt->bindParam(":info", $info);
        $stmt->execute();
        $sql="INSERT INTO museum (Museum_name,address,Telephone_number,Mail,Museum_info) VALUES ('".$name."','".$address."','".$Telephone_number."','" .$mail."','".$info."')";     
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
    
    static function update_museum($id,$name,$address,$Telephone_number,$mail,$info) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("UPDATE museum SET Museum_name=:name, Address=:address, Telephone_number=:Telephone_number, Mail=:mail, Museum_info=:info WHERE idMuseum=:id");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":Telephone_number", $Telephone_number);
        $stmt->bindParam(":mail", $mail);
        $stmt->bindParam(":info", $info);
        $stmt->bindParam(":id", $id);
        $stmt->execute();   
        $outcome=$stmt->rowCount();
        $sql="UPDATE museum SET Museum_name='".$name."', Address='".$address."', Telephone_number='".$Telephone_number."', Mail='" .$mail."',Museum_info='".$info."' WHERE idMuseum='" .$id. "'" ;      
        echo "<br> SQL Statement: <br>" . $sql;
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
    
        static function retrieve_museums() {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("SELECT * from museum");
        $sql = "SELECT * from museum";
        $visits="";
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Museum'); 
        while ($museum=$stmt->fetch()) {
            $visits = $visits . $museum->getIdMuseum() . "\t";
            $visits = $visits . $museum->getMuseum_name() . "\t";
            $visits = $visits . $museum->getAddress() . "\t";
            $visits = $visits . $museum->getTelephone_number() . "\t";
            $visits = $visits . $museum->getMail() . "\t";
            $visits = $visits . $museum->getMuseum_info() . "<br>";
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
    
    static function delete_museum($id) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("DELETE FROM museum WHERE idMuseum=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();   
        $outcome=$stmt->rowCount();
        $sql = "DELETE FROM museum WHERE idMuseum='" . $id ."'"; 
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
}
?>