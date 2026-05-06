
<?php
require './db.php'; // Đảm bảo rằng bạn đã kết nối cơ sở dữ liệu trong file db.php

// Truy vấn lấy giá trị ánh sáng mới nhất
$sql_latest_light = "SELECT rain_value FROM rain ORDER BY rain_time DESC LIMIT 1";
$result_latest_light = $conn->query($sql_latest_light);

// Truy vấn tính giá trị trung bình của cột light_value
$sql_avg_light = "SELECT ROUND(AVG(rain_value), 2) AS average_rain_value FROM rain";
$result_avg_light = $conn->query($sql_avg_light);

if ($result_latest_light->num_rows > 0) {
    $row_latest_light = $result_latest_light->fetch_assoc();
    echo "<br>"."TỈ LỆ MƯA "."<br>"."<br>";
    echo"Gần nhất: " . $row_latest_light["rain_value"]." %"."<br>"; // In ra giá trị ánh sáng mới nhất với ký tự xuống dòng
} else {
    echo "0 results for latest rain value";
}

if ($result_avg_light->num_rows > 0) {
    $row_avg_light = $result_avg_light->fetch_assoc();
    echo "TB: " . $row_avg_light["average_rain_value"]." %"; // In ra giá trị trung bình của ánh sáng
} else {
    echo "0 results for average rain value";
}

$conn->close();
?>

