<?php

/**
 * AGREGAMOS ESTE COMENTARIO PARA LA TAREA 5 DE DAW
 * Y REALIZAR NUESTRO SEGUNDO COMMIT
 * 
 * 
 * @description Funcion para obtener los detalles de un usuario
 * @file practica-espana.php
 * @param PDO $pdo Conexi�n a la base de datos
 * @param int $id id del usuario
 * @return array|bool array con los detalles del usuario o false si hay error
 * @author Pedro
 * @date 2025/05/11
 * @version 1.0
 * CREAMOS ESTE COMENTARIO PARA HACER UN COMMIT
 */
function detallesUsuario(PDO $pdo, int $id) : array|bool
{
    $sql = "SELECT * FROM usuarios WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $resultado = false;
    try {
        if ($stmt->execute()) {
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        $resultado = false;
    }
    return $resultado;
}


   /**
 * @description Funcion para obtener los empleados que son coordinadores
 * @file practica-espana.php
 * @param PDO $pdo Conexi�n a la base de datos
 * @return array|bool array con los empleados o false si hay error
 * @author Pedro
 * @date 2025/05/11
 * @version 1.0
 */
function listadoCoordinadores(PDO $pdo) : array|bool
{
    $sql = <<<ENDSQL
        SELECT * FROM empleados WHERE 
            find_in_set('coord',roles)>0 or
            find_in_set('trasoc',roles)>0
    ENDSQL;
    $stmt = $pdo->prepare($sql);
    try {
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        $resultado = false;
    }
    return $resultado;
}
function detallesUsuario(PDO $pdo, int $id) : array|bool
{
    $sql = "SELECT * FROM usuarios WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $resultado = false;
    try {
        if ($stmt->execute()) {
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        $resultado = false;
    }
    return $resultado;
}

    ?>
