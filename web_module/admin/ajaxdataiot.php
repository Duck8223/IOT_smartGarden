
<?php

require_once('admin_functions.php'); // Thay thế đường dẫn này bằng đường dẫn tới file chứa các hàm của bạn

$newestHumidityValue = getLatestValueFromTable('humidity', 'humidity_value','humidity_time');
$moistureValue = getLatestValueFromTable('moisture', 'moisture_value','moisture_time');
$rainValue = getLatestValueFromTable('rain', 'rain_value','rain_time');
$lightValue = getLatestValueFromTable('light', 'light_value','light_time');





$avgHumidityValue = calculateAverageValueFromTable('humidity', 'humidity_value');
$avgMoistureValue = calculateAverageValueFromTable('moisture', 'moisture_value');
$avgRainValue = calculateAverageValueFromTable('rain', 'rain_value');
$avgLightValue = calculateAverageValueFromTable('light', 'light_value');



// Kết nối CSDL - Bạn cần cung cấp thông tin kết nối CSDL tại đây

// Kiểm tra nếu type được truyền vào từ yêu cầu GET
if(isset($_GET['type'])) {
    $type = $_GET['type'];

    // Xử lý dựa trên loại dữ liệu bạn muốn lấy, ví dụ: humidity, moisture, rain, light
    switch($type) {
        case 'humidity':
            // Lấy dữ liệu độ ẩm từ CSDL hoặc một nguồn dữ liệu khác
            echo json_encode($newestHumidityValue); // Trả về dữ liệu dưới dạng JSON
            break;
        case 'moisture':
            // Lấy dữ liệu độ ẩm đất từ CSDL hoặc một nguồn dữ liệu khác
            echo json_encode($moistureValue); // Trả về dữ liệu dưới dạng JSON
            break;
        case 'rain':
            // Lấy dữ liệu mưa từ CSDL hoặc một nguồn dữ liệu khác
            echo json_encode($rainValue); // Trả về dữ liệu dưới dạng JSON
            break;
        case 'light':
            // Lấy dữ liệu ánh sáng từ CSDL hoặc một nguồn dữ liệu khác
            echo json_encode($lightValue); // Trả về dữ liệu dưới dạng JSON
            break;
        default:
            // Trường hợp mặc định hoặc xử lý nếu không có loại dữ liệu nào khớp
            echo json_encode(['error' => 'Invalid sensor type']);
    }
} else {
    echo json_encode(['error' => 'Type parameter is missing']);
}


?>
