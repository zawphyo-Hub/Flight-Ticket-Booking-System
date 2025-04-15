<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "saewebsite";

    $connection = mysqli_connect($host,$username,$password,$dbname);
    if ($connection) {
         echo "Connected!";
    } 
    else echo "Connection error!";

    
    //----------------------------Users Table Creation------------------------------
    // $sql = "create table users (id integer auto_increment primary key, 
    // username varchar(100),password varchar(100),email varchar(50), phoneno int, 
    // regions varchar(50), role varchar(20))";
    
        
    // /----------------------------Booking Table Creation--------------------------------
    // $sql = "create table booking (bookingid integer auto_increment primary key, 
    // departureflightid integer, returnflightid integer, totalprice int, passengernumber int, triptype varchar (50),
    // FOREIGN KEY (departureflightid) REFERENCES flightdetails(id),
    // FOREIGN KEY (returnflightid) REFERENCES flightdetails(id))";


    //----------------------------Passenger Detail Info Table Creation--------------------------------
    // $sql = "create table passengersinfo (passengerdetailId integer auto_increment primary key, bookingid integer,
    // title varchar (20), firstname varchar(100),middlename varchar(100), lastname varchar(100), 
    // dateofbirth date, nationality varchar(100), passportno varchar(100), issuedate date, expireddate date, 
    // meals varchar(100), passengertype varchar(100),
    // FOREIGN KEY (bookingid) REFERENCES booking(bookingid))";

    //----------------------------Flight Schedule Table Creation------------------------------
    // $sql = "create table flightschedules (scheduleid integer auto_increment primary key, 
    // airline varchar(100), capacity varchar(100),flightroute varchar(100))";

    //----------------------------Schedule Detail Table Creation--------------------------------
    // $sql = "create table flightdetails (scheduledetailid integer auto_increment primary key, 
    // scheduleid integer, flightnumber varchar(100),departureairport varchar(100), departuredate varchar(100), 
    // departuretime varchar(100), arrivalairport varchar(100), arrivaldate varchar(100), arrivaltime varchar(100),price int, class varchar(100), 
    // FOREIGN KEY (scheduleid) REFERENCES flightschedules(scheduleid))";

    //----------------------------Payment Table Creation--------------------------------
    $sql = "create table payment (paymentid integer auto_increment primary key, 
    bookingid integer, cardNumber varchar(16), cardExpirydate varchar(100), 
    CCV integer, cardHolderName varchar(100), bankname varchar(100), accountno integer, swiftcode varchar(100), accHolderName varchar (100), totalprice integer, 
    FOREIGN KEY (bookingid) REFERENCES booking(bookingid))";
    
    if (mysqli_query($connection, $sql))
    {
    	echo "Table successfully created!!"."<br>";
    }
     	
    else echo "Table creation error!!";



?>