<?php

$serverName = "DYENSTEIN\\SQLEXPRESS02"; //Change the server name to your server name
$connectionOptions = array(
    "Database" => "EmpDeptDB",
    "Uid" => "",
    "PWD" => "",
    "TrustServerCertificate" => true
);

// Connect
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

echo "Connected successfully!";

sqlsrv_close($conn);

?>
