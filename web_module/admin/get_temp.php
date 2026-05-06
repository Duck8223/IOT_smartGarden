
<?php
require './db.php'; // Đảm bảo rằng bạn đã kết nối cơ sở dữ liệu trong file db.php

// Truy vấn lấy giá trị ánh sáng mới nhất
$sql_latest_light = "SELECT temperature_value FROM temperature ORDER BY temperature_time DESC LIMIT 1";
$result_latest_light = $conn->query($sql_latest_light);

// Truy vấn tính giá trị trung bình của cột light_value
$sql_avg_light = "SELECT ROUND(AVG(temperature_value), 2) AS average_temperature_value FROM temperature";
$result_avg_light = $conn->query($sql_avg_light);

if ($result_latest_light->num_rows > 0) {
    $row_latest_light = $result_latest_light->fetch_assoc();
    echo "<br>"."NHIỆT ĐỘ "."<br>"."<br>";
    echo"Gần nhất: " . $row_latest_light["temperature_value"]." °C"."<br>"; // In ra giá trị ánh sáng mới nhất với ký tự xuống dòng
} else {
    echo "0 results for latest temperature value";
}

if ($result_avg_light->num_rows > 0) {
    $row_avg_light = $result_avg_light->fetch_assoc();
    echo "TB: " . $row_avg_light["average_temperature_value"]." °C"; // In ra giá trị trung bình của ánh sáng
} else {
    echo "0 results for average temperature value";
}

$conn->close();
?>

