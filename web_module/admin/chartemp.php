<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iot_data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

$sql = "SELECT temperature_value, temperature_time FROM temperature ORDER BY temperature_time ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $temperatureData = array();
    while ($row = $result->fetch_assoc()) {
        $temperatureData[] = array(
            'temperature_time' => $row['temperature_time'],
            'temperature_value' => $row['temperature_value']
        );
    }

    echo json_encode($temperatureData);
} else {
    echo json_encode(array("message" => "Không có dữ liệu nhiệt độ"));
}

$conn->close();
?>
