<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iot_data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

$sql = "SELECT light_value, light_time FROM light ORDER BY light_time ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $lightData = array();
    while ($row = $result->fetch_assoc()) {
        $lightData[] = array(
            'light_time' => $row['light_time'],
            'light_value' => $row['light_value']
        );
    }

    echo json_encode($lightData);
} else {
    echo json_encode(array("message" => "Không có dữ liệu nhiệt độ"));
}

$conn->close();
?>
