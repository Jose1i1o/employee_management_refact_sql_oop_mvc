
<?php

// DASHBOARD CRUD



function getEmployees($db, $userId)
{
    $query = "SELECT * FROM employee_edit_name WHERE userId = :userId";

    $getQuery = $db->prepare($query);
    $getQuery->bindParam(':userId', $userId, PDO::PARAM_STR);

    $getQuery->execute();

    $result = $getQuery->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}
