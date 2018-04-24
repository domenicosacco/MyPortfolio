<!DOCTYPE html>
<!--
PHP TEST FILE
-->

<?php
define('__ROOT__', dirname(dirname(__FILE__))); 
require_once(".\bl\class_WebsiteVisitor.php");
require_once(".\bl\class_WebsiteUser.php");
require_once(".\bl\class_WebsiteAdministrator.php");
require_once(".\bl\class_Museum.php");
require_once(".\bl\class_Ticket.php");
require_once(".\bl\class_Event.php");
require_once(".\bl\class_Room.php");
require_once(".\bl\class_Work.php");
require_once(".\bl\class_Artist.php");
require_once(".\bl\class_Event_Artist.php");
require_once(".\bl\class_Artist_Work.php");
require_once(".\DB\DB_class.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
  /////////////////////// WEBSITE VISITOR ENTITY C-R-U-D TEST
        
  /*$a_visitor=new Website_Visitor();
  $a_visitor->{"visit_start"}();
  $a_visitor->{"visit_page"}();
  $a_visitor->{"end_visit"}();
  echo $a_visitor->{"visit_log"}();
  echo "<br>VISITS LOG <br>" . Website_Visitor::{"retrieve_visits"}();
  $a_visitor->{"save_session"}();
  echo "<br>VISITS LOG <br>" . Website_Visitor::{"retrieve_visits"}();*/
  
  /*$a_visitor=new Website_Visitor(126,126,"2010-04-17 14:21:47","2010-04-17 14:21:47");
  echo "<br>VISITS LOG <br>" . Website_Visitor::{"retrieve_visits"}();
  $a_visitor->{"update_visit"}();  
  echo "<br>VISITS LOG <br>" . Website_Visitor::{"retrieve_visits"}();*/
  
  /*$a_visitor=new Website_Visitor(126);
  echo "<br>VISITS LOG <br>" . Website_Visitor::{"retrieve_visits"}();
  $a_visitor->{"delete_visit"}();  
  echo "<br>VISITS LOG <br>" . Website_Visitor::{"retrieve_visits"}();*/
  
        
        
  /////////////////////// WEBSITE USER ENTITY C-R-U-D TEST
        
  /*$a_user= new Website_User("","username7","11223355","Ignazio 3","prova7@example.com");
  $a_user->{"register"}();
  $a_user->{"authenticate"}();
  echo "<br> USERNAMEID : " . $a_user->getIdUser() . "-". $a_user->getUser_name();*/
  
  
  /*$a_user= new Website_User(144,"username7 (update)","11223355","Ignazio 3","prova7@example.com");
  $a_user->{"update_user"}();
  $a_user->{"reset_password"}();*/
     
        
        
  /////////////////////// WEBSITE ADMINISTRATOR C-R-U-D TEST
        
  /*$a_user= new Website_Administrator("","Admin7","11223355","Ignazio 3","prova7@example.com");
  echo "<br>USERS <br>" . Website_Administrator::retrieve_users();
  $a_user->{"register_admin"}();
  echo "<br>USERS <br>" . Website_Administrator::retrieve_users();
  $a_user->{"authenticate"}();
  echo "<br> USERNAMEID : " . $a_user->getIdUser() . "-". $a_user->getUser_name();*/
  
  /*$a_user= new Website_Administrator(144);
  echo "<br>USERS <br>" . Website_Administrator::retrieve_users();
  $a_user->{"delete_user"}();
  echo "<br>USERS <br>" . Website_Administrator::retrieve_users();*/
        
        
        
  /////////////////////// MUSEUM ENTITY C-R-U-D TEST      
        
  /*$a_museum=new Museum("","Museum44","Random Road2","998-999999","museum4@example.com","Random info here3");
  echo "<br>MUSEUMS<br>" .  Museum::retrieve_museums();
  $a_museum->{"create_museum"}();
  echo "<br>MUSEUMS<br>" .  Museum::retrieve_museums();*/
  
  /*$a_museum=new Museum(8,"Museum44 (updated)","Random Road2","998-999999","museum4@example.com","Random info here3");      
  echo "<br>MUSEUMS<br>" .  Museum::retrieve_museums();
  $a_museum->{"update_museum"}();
  echo "<br>MUSEUMS<br>" .  Museum::retrieve_museums();*/
  
  /*$a_museum=new Museum(8);      
  echo "<br>MUSEUMS<br>" .  Museum::retrieve_museums();
  $a_museum->{"delete_museum"}();
  echo "<br>MUSEUMS<br>" .  Museum::retrieve_museums();*/
  
        
        
  /////////////////////// TICKET ENTITY C-R-U-D TEST
  
        /*$a_user= new Website_User(144,"username3","11111","Alberto Sordi","prova7@example.com");
        $a_user->{"authenticate"}();
        echo "<br> LOGGED USER ID: " . $a_user->getIdUser() . "<br>";
        $a_ticket=new Ticket('','full','NEW Person4usingticket',1,$a_user->getIdUser());
        echo "<br>TICKETS<br>" . Ticket::{"retrieve_tickets"}();
        $a_ticket->{"create_ticket"}();
        echo "<br>TICKETS<br>" . Ticket::{"retrieve_tickets"}();*/
        
        /*$a_user= new Website_User(144,"username3","11111","Alberto Sordi","prova7@example.com");
         $a_user->{"authenticate"}();
        $a_ticket=new Ticket(131,'student','Anupdatedstudent (update)',1,$a_user->getIdUser());
        echo "<br>TICKETS<br>" . Ticket::{"retrieve_tickets"}();
        $a_ticket->{"update_ticket"}();
        echo "<br>TICKETS<br>" . Ticket::{"retrieve_tickets"}();*/
        
        /*$a_user= new Website_User(144,"username3","11111","Alberto Sordi","prova7@example.com");
        $a_user->{"authenticate"}();
        $a_ticket=new Ticket(131);
        echo "<br>TICKETS<br>" . Ticket::{"retrieve_tickets"}();
        $a_ticket->{"delete_ticket"}();
        echo "<br>TICKETS<br>" . Ticket::{"retrieve_tickets"}();*/
        
        
        
    /////////////////////// EVENT ENTITY C-R-U-D TEST
        
        /*$a_event=new Event("",date ("Y-m-d H:i:s", strtotime("31-12-1994 09:30:00")),date ("Y-m-d H:i:s", strtotime("12-07-2029 19:30:00")),"An Event8",30,12.00,6.50,5.00,"some info5",1);
        echo "<br> EVENTS <br> ". Event::{"retrieve_events"}();
        $a_event->{"create_event"}();
        echo "<br> EVENTS <br> ". Event::{"retrieve_events"}();*/

        /*$a_event=new Event(6,date ("Y-m-d H:i:s", strtotime("31-12-1954 09:30:00")),date ("Y-m-d H:i:s", strtotime("12-07-2029 19:30:00")),"An Event8",30,12.00,6.50,5.00,"some info5",1);
        echo "<br> EVENTS <br> ". Event::{"retrieve_events"}();
        $a_event->{"update_event"}();
        echo "<br> EVENTS <br> ". Event::{"retrieve_events"}();*/

        /*$a_event=new Event(6);
        echo "<br> EVENTS <br> ". Event::{"retrieve_events"}();
        $a_event->{"delete_event"}();
        echo "<br> EVENTS <br> ". Event::{"retrieve_events"}();*/
        
        
        
    /////////////////////// ROOM ENTITY C-R-U-D TEST
        
        /*$a_room=new Room("","3","003","Belvedere","Museum belvedere",1);
        echo "<br> Rooms <br> ". Room::{"retrieve_rooms"}();
        $a_room->{"create_room"}();
        echo "<br> Rooms <br> ". Room::{"retrieve_rooms"}();*/
        
        /*$a_room=new Room(10,"3","123","Belvedere (updated)","Museum belvedere",1);
        echo "<br> Rooms <br> ". Room::{"retrieve_rooms"}();
        $a_room->{"update_room"}();
        echo "<br> Rooms <br> ". Room::{"retrieve_rooms"}();*/
        
        /*$a_room=new Room(10);
        echo "<br> Rooms <br> ". Room::{"retrieve_rooms"}();
        $a_room->{"delete_room"}();
        echo "<br> Rooms <br> ". Room::{"retrieve_rooms"}();*/
        
        
        
    /////////////////////// WORK ENTITY C-R-U-D TEST
        
        /*$a_work=new Work("","Another painting to delete5","Oil","Paint","1392","A potrait of an unknown woman",9);
        echo "<br> Works <br> ". Work::{"retrieve_works"}();
        $a_work->{"create_work"}();
        echo "<br> Works <br> ". Work::{"retrieve_works"}();*/
        
        /*$a_work=new Work(17,"Another painting (updated222)","Oil","Paint","1392","A potrait of an unknown woman",9);
        echo "<br> Works <br> ". Work::{"retrieve_works"}();
        $a_work->{"update_work"}();
        echo "<br> Works <br> ". Work::{"retrieve_works"}();*/

        /*$a_work=new Work(17);
        echo "<br> Works <br> ". Work::{"retrieve_works"}();
        $a_work->{"delete_work"}();
        echo "<br> Works <br> ". Work::{"retrieve_works"}();*/
        
    
        
    /////////////////////// ARTIST ENTITY C-R-U-D TEST
    //
        //$create_artist=new Artist("","Generic Artist3","Description of the Generical Artist2","1949-11-11","2012-11-11");
        //echo "<br> Artists <br> ". Artist::{"retrieve_artists"}();
        //$create_artist->{"create_artist"}();
        //echo "<br> Artists <br> ". Artist::{"retrieve_artists"}();
        
        //$update_artist= new Artist(12,"Generic Artist3 (updated)","Description of the Generical Artist2","1949-11-11","2012-11-11");
        //echo "<br> Artists <br> ". Artist::{"retrieve_artists"}();
        //$update_artist->{"update_artist"}();
        //echo "<br> Artists <br> ". Artist::{"retrieve_artists"}();
        
        //$delete_artist=new Artist(13);
        //echo "<br> Artists <br> ". Artist::{"retrieve_artists"}();
        //$delete_artist->{"delete_artist"}();
        //echo "<br> Artists <br> ". Artist::{"retrieve_artists"}();
    
        
        
    /////////////////////// EVENT_ARTIST ENTITY (N-TO-N RELATIONSHIP) C-R-U-D TEST
        
        /*$a_event_artist=new Event_Artist(6,2,date ("Y-m-d H:i:s", strtotime("30-12-1994 09:30:00")),date ("Y-m-d H:i:s", strtotime("30-12-1994 10:30:00")),"Details about participation");
        echo "<br> Artists for Events <br> " . Event_Artist::{"retrieve_event_artists"}();
        $a_event_artist->{"create_event_artist"}();
        echo "<br> Artists for Events <br> " . Event_Artist::{"retrieve_event_artists"}();*/
 
        /*$a_event_artist=new Event_Artist(6,2,date ("Y-m-d H:i:s", strtotime("30-12-1996 09:30:00")),date ("Y-m-d H:i:s", strtotime("30-12-1994 10:30:00")),"Details about participation (update)");
        echo "<br> Artists for Events <br> " . Event_Artist::{"retrieve_event_artists"}();
        $a_event_artist->{"update_event_artist"}();
        echo "<br> Artists for Events <br> " . Event_Artist::{"retrieve_event_artists"}();*/
        
        /*$a_event_artist=new Event_Artist(6,2);
        echo "<br> Artists for Events <br> " . Event_Artist::{"retrieve_event_artists"}();
        $a_event_artist->{"delete_event_artist"}();
        echo "<br> Artists for Events <br> " . Event_Artist::{"retrieve_event_artists"}();*/    
    
        
        
    /////////////////////// ARTIST_WORK ENTITY (N-TO-N RELATIONSHIP) C-R-U-D TEST
        
        /*$a_artist_work=new Artist_Work(2,12,"New contribuition");
        echo "<br> Artists for Works <br> " . Artist_Work::{"retrieve_artist_works"}();
        $a_artist_work->{"create_artist_work"}();
        echo "<br> Artists for Works <br> " . Artist_Work::{"retrieve_artist_works"}();*/
 
        /*$a_artist_work=new Artist_Work(2,12,"Updated contribuition");
        echo "<br> Artists for Works <br> " . Artist_Work::{"retrieve_artist_works"}();
        $a_artist_work->{"update_artist_work"}();
        echo "<br> Artists for Works <br> " . Artist_Work::{"retrieve_artist_works"}();*/
        
        /*$a_artist_work=new Artist_Work(2,12);
        echo "<br> Artists for Works <br> " . Artist_Work::{"retrieve_artist_works"}();
        $a_artist_work->{"delete_artist_work"}();
        echo "<br> Artists for Works <br> " . Artist_Work::{"retrieve_artist_works"}();*/
  
        ?>
    </body>
</html>
