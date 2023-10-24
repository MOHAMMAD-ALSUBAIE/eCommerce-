<?php
$config=[
'hostName'=>'localhost',
'userName'=>'root',
'password'=>'',
'database'=>'storedatabases'
];


// conetent to databases 
//using try catch , to catching error that happend while  conaction to database
try{
    $conn= new mysqli($config['hostName'],$config['userName'],$config['password'],$config['database']);
}catch(Exception $e){
    echo $e->getMessage();//will return the error
}