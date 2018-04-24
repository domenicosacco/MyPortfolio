<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DAL_Website_User { 
            
    function generate_password() {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $randstring = '';
                for ($i = 0; $i < 15; $i++) {
                $randstring = $randstring . $characters[rand(0, strlen($characters))];
         }
                return $randstring;
        }
        
    function send_resetmail($mail) {
            
        }
        
    static function register($login,$password,$name,$mail) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("INSERT INTO user (login,password,User_name,mail,admin) VALUES (:login,:password,:name,:mail,0)");
        $stmt->bindParam(":login", $login);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":mail", $mail);
        $stmt->execute();
        $sql = "INSERT INTO user (login,password,User_name,mail,admin) VALUES ('".$login."','".$password."','".$name."','".$mail."',0)";   
        echo "<br> SQL Statement: <br>" . $sql;    
        $outcome=$stmt->rowCount();
        echo "<br> Affected rows: " .$outcome;
        $conn = null; 
        if( $outcome !== 0) {return 0;}
        else {return 1;}
        }
        catch(Exception $e){
        echo "ERROR <br>";
        echo $e->getMessage();
        }
    }
    
    static function authenticate($login,$password) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("SELECT * FROM user WHERE login=:login AND password =:password");
        $stmt->bindParam(":login", $login);
        $stmt->bindParam(":password", $password); 
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Website_User'); 
        $sql="SELECT * FROM user WHERE login='" .$login. "' AND password ='".$password ."'";    
        echo "<br> SQL Statement: <br>" . $sql;
        while ($user=$stmt->fetch()) {
            $array[0]= $user->getIdUser();
            $array[1]= $user->getUser_name();
        }
        $stmt->closeCursor();
        $conn = null; 
        return $array;
        }
        catch(Exception $e){
        echo "ERROR <br>";
        echo $e->getMessage();
        }
    }
    
        static function reset_password($iduser,$mail) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $new_password=self::generate_password();
        $stmt = $conn->prepare("UPDATE user SET password=:password WHERE mail=:mail AND idUser=:iduser");
        $stmt->bindParam(":mail", $mail);
        $stmt->bindParam(":iduser", $iduser);
        $stmt->bindParam(":password", $new_password); 
        $stmt->execute();
        $sql="UPDATE user SET password='" . $new_password . "' WHERE mail='" .$mail. "'";    
        echo "<br> SQL Statement: <br>" . $sql;
        $outcome=$stmt->rowCount();
        $conn = null; 
        self::send_resetmail($mail);
        if ($outcome !== 0) {return $new_password;}
        else {return 0;}
        }
        catch(Exception $e){
        echo "ERROR <br>";
        echo $e->getMessage();
        }
        }
        
        static function update_user($userID,$login,$password,$name,$mail) {
        try{
        $db_conn=new DB();
        $conn=$db_conn->connect();
        $stmt = $conn->prepare("UPDATE user SET login=:login,password=:password,User_name=:name,mail=:mail WHERE idUser=:id");
        $stmt->bindParam(":login", $login);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":mail", $mail);
        $stmt->bindParam(":id", $userID);
        $stmt->execute();        
        $sql="UPDATE user SET login=:login,password=:password,User_name=:name,mail=:mail WHERE idUser=:id";      
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