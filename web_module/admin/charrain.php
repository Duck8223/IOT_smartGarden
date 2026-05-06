<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iot_data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

$sql = "SELECT rain_value, rain_time FROM rain ORDER BY rain_time ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $rainData = array();
    while ($row = $result->fetch_assoc()) {
        $rainData[] = array(
            'rain_time' => $row['rain_time'],
            'rain_value' => $row['rain_value']
        );
    }

    echo json_encode($rainData);
} else {
    echo json_encode(array("message" => "Không có dữ liệu nhiệt độ"));
}

$conn->close();
?>
