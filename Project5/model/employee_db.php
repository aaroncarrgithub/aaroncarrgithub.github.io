<?php
/************************************/
/* Date         Name            Description*/
/* 2/12/2021    Aaron           Added db definition and function calls. */  
/************************************/
function getEmployees() {
    $db = Database::getDB();
    $query = 'SELECT * FROM employee ORDER BY employee_id;';
    $statement = $db->prepare($query);
    $statement->execute();
    $employees = $statement;
    
    return $employees;
}

?>
