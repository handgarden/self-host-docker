<?php
    echo "<h1>hi docker 5.x</h1>";
    $con = new PDO("mysql:host=php-5-db;dbname=test;charset=utf8",'user','password');
    
    print('<br>create table ');
    $con->exec('CREATE TABLE MEMBER(
        member_id INT NOT NULL UNIQUE AUTO_INCREMENT,
        account VARCHAR(255),
        PRIMARY KEY (member_id)
    )');
    print($con->errorInfo()[2]);
    
    print('<br>create data ');
    $stmt = $con->prepare("INSERT INTO MEMBER (account) VALUES (:account)");
    $stmt->bindParam(':account', $account);
    $account='account';
    $stmt->execute();
    print($stmt->errorInfo()[2]);

    print('<br>get data ');
    $stmt2 = $con->prepare("SELECT * FROM MEMBER");
    $stmt2->execute();
    $row = $stmt2->fetch();
    print_r($row);
?>