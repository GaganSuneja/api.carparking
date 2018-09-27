<?php
header('Content-type:application/json;charset=utf-8');
if (isset($_GET['passkey'])) {
    if (isset($_GET['carno'])) {
        connectToDb();
    }
}

function connectToDb()
{
    $servername = "sql306.epizy.com";
    $username = "epiz_22758219";
    $password = "nFNALkgcJrg";
    $dbname = "epiz_22758219_master_data";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        echo ($conn->connect_error);
    } else {
        $sql = "SELECT id,contact FROM master_table where registration_no='{$_GET['carno']}'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo json_encode();
                echo json_encode("asd");
                $response_data = json_encode(array('id' => $row['id'], 'no' => $row['contact']), JSON_FORCE_OBJECT);
                echo $response_data;
            }
        } else {
            echo json_encode("sdfs");
        }
    }
}
