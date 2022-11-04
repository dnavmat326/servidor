<?php


    $dbh = null;

    try {
        $dsn = "mysql:host=mariadb;dbname=ejemplo";
        $dbh = new PDO($dsn, "usuario", "usuario");
    } catch (PDOException $e){
        echo $e->getMessage();
    }

    /*
    //INSERT
    $stmt = $dbh->prepare("INSERT INTO clientes (nombre, apellidos, direccion, localidad, movil) VALUES (?, ?, ?, ?, ?)");
    // Bind
    $stmt->bindValue(1, "Javi3");
    $stmt->bindValue(2, "Guillén3");
    $stmt->bindValue(3, "Mi casa3");
    $stmt->bindValue(4, "Mojácar3");
    $stmt->bindValue(5, "696969693");
    // Excecute
    $stmt->execute();
    
    echo $dbh->lastInsertId();
    */

    /*
    //INSERT
    $stmt = $dbh->prepare("INSERT INTO clientes (nombre, apellidos, direccion, localidad, movil) VALUES (:n, :a, :d, :l, :m)");
    // Bind
    $stmt->bindValue(':n', "Javi2");
    $stmt->bindValue(':a', "Guillén2");
    $stmt->bindValue(':d', "Mi casa2");
    $stmt->bindValue(':l', "Mojácar2");
    $stmt->bindValue(':m', "696969692");
    // Excecute
    $stmt->execute();
    */

    //SELECT
    //Método prepare sobre la conexión
    $stmt = $dbh->prepare("SELECT * FROM clientes");
    //$stmt es un objeto PDOStatement
    $stmt->execute();
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($clientes as $cliente){
        echo $cliente['nombre'] ." ". $cliente['localidad']. "<br>";
    }

    echo "<br> Hay estos clientes: ".$stmt->rowCount()."<br>";

    //SELECT
    //Método prepare sobre la conexión
    $stmt = $dbh->prepare("SELECT * FROM clientes WHERE id = ? and localidad = ? ");
    $stmt->bindValue(1, $_GET['id']);
    $stmt->bindValue(2, "Mojácar3");

    //$stmt es un objeto PDOStatement
    $stmt->execute();
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($clientes as $cliente){
        echo $cliente['nombre'] ." ". $cliente['localidad']. "<br>";
    }

    //$stmt es un objeto PDOStatement
    $stmt->execute();
    $clientes = $stmt->fetchAll(PDO::FETCH_OBJ);
    foreach ($clientes as $cliente){
        echo $cliente->nombre ." ". $cliente->localidad. "<br>";
    }


    //DELETE
    $stmt = $dbh->prepare("DELETE FROM clientes WHERE id = ?");
    $stmt->bindValue(1, 6);
    //$stmt es un objeto PDOStatement
    $stmt->execute();

    //UPDATE
    $stmt = $dbh->prepare("UPDATE clientes SET localidad = ? WHERE id = ?");
    $stmt->bindValue(1, "Mojácar beach");
    $stmt->bindValue(2, 5);
    //$stmt es un objeto PDOStatement
    $stmt->execute();

?>