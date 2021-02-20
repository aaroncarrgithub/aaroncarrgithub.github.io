<?php
/************************************/
/* Date         Name            Description*/
/* 2/12/2021    Aaron           Added db definition and function calls. */  
/************************************/

function addVisitor($visitor_name, $visitor_email, $visitor_msg) {
    $db = Database::getDB();
    $query = 'INSERT INTO visitor (visitor_name, visitor_email, visitor_msg, visit_date, employee_id)
            VALUES (:visitor_name, :visitor_email, :visitor_msg, NOW(), 1);';
    $statement = $db->prepare($query);
    $statement->bindValue(':visitor_name', $visitor_name);   // :visitor_name matches VALUES clause - $visitor_name matches var name from filter_input
    $statement->bindValue(':visitor_email', $visitor_email);
    $statement->bindValue(':visitor_msg', $visitor_msg);
    $statement->execute();
    $statement->closeCursor();
}

function delVisitor($visitor_id) {
    $db = Database::getDB();
    $query = 'DELETE FROM visitor WHERE visitor_id = :visitor_id;';
    $statement = $db->prepare($query);
    $statement->bindValue(':visitor_id', $visitor_id);
    $statement->execute();
    $statement->closeCursor();
}

function getVisitorByEmp($employee_id) {
    $db = Database::getDB();
    $query2 = 'SELECT * FROM visitor WHERE visitor.employee_id = :employee_id ORDER BY visit_date;';
    $statement2 = $db->prepare($query2);
    $statement2->bindValue(':employee_id', $employee_id);
    $statement2->execute();
    $visitors = $statement2;
    return $visitors;
}
?>