<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iot_data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

$sql = "SELECT moisture_value, moisture_time FROM moisture ORDER BY moisture_time ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $moistureData = array();
    while ($row = $result->fetch_assoc()) {
        $moistureData[] = array(
            'moisture_time' => $row['moisture_time'],
            'moisture_value' => $row['moisture_value']
        );
    }

    echo json_encode($moistureData);
} else {
    echo json_encode(array("message" => "Không có dữ liệu nhiệt độ"));
}

$conn->close();
?>
