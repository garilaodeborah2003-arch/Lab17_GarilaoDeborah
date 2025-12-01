<?php
include 'connectdb.php';

function getAllCustomers($search = "") {
    $conn = Connect();

    $where = "";
    if ($search != "") {
        $search = $conn->real_escape_string($search);
        $where = "WHERE cus_fname LIKE '%$search%' 
                  OR cus_lname LIKE '%$search%' 
                  OR cus_code LIKE '%$search%'";
    }

    $query = "
        SELECT cus_code, cus_fname, cus_lname, cus_areacode, cus_phone, cus_balance
        FROM customer
        $where
        ORDER BY cus_code ASC
    ";

    $result = $conn->query($query);
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}