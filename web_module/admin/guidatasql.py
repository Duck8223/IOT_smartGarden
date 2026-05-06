import mysql.connector
import paho.mqtt.client as mqtt

# Kết nối tới cơ sở dữ liệu MySQL
mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",  # Thay your_password bằng mật khẩu của bạn
    database="iot_data"
)

def maintain_table_limit(table_name):
    try:
        mycursor = mydb.cursor()
        mycursor.execute(f"SELECT COUNT(*) FROM {table_name}")
        row_count = mycursor.fetchone()[0]
        if row_count > 20:
            num_rows_to_delete = row_count - 20
            mycursor.execute(f"DELETE FROM {table_name} ORDER BY id LIMIT {num_rows_to_delete}")
            mydb.commit()
            print(f"{num_rows_to_delete} old rows deleted from {table_name}.")
    except mysql.connector.Error as err:
        print("Error: {}".format(err))
        mydb.rollback()

# Hàm được gọi khi kết nối tới MQTT broker
def on_connect(client, userdata, flags, rc):
    print("Connected with result code "+str(rc))
    # Đăng ký nhận dữ liệu từ MQTT topic
    client.subscribe("testtopic/data_sg")  # Thay bằng MQTT topic bạn đang sử dụng

# Hàm được gọi khi nhận được tin nhắn từ MQTT topic
def on_message(client, userdata, msg):
    mess = str(msg.payload.decode("utf-8"))
    print(msg.topic + " " + mess)
    mycursor = mydb.cursor()

    # Split tin nhắn nhận được từ MQTT thành các trường dữ liệu
    data = mess.split("|")

    # Trích xuất dữ liệu cảm biến (nhiệt độ, độ ẩm, độ ẩm đất, ánh sáng, v.v.)
    temperature = float(data[0])     # Giả sử độ ẩm là trường dữ liệu thứ hai
    per_moisture = float(data[1]) # Giả sử độ ẩm đất là trường dữ liệu thứ ba
    per_rain = float(data[2])
    per_light = float(data[3])

    # Tạo truy vấn SQL để chèn dữ liệu vào cơ sở dữ liệu

    sql_temperature = "INSERT INTO temperature (temperature_value) VALUES (%s)"
    val_temperature = (temperature,)
    sql_moisture = "INSERT INTO moisture (moisture_value) VALUES (%s)"
    val_moisture = (per_moisture,)
    sql_rain = "INSERT INTO rain (rain_value) VALUES (%s)"
    val_rain = (per_rain,)
    sql_light = "INSERT INTO light (light_value) VALUES (%s)"
    val_light = (per_light,)
        # Sau khi chèn dữ liệu mới vào bảng, giữ bảng đó có tối đa 20 hàng
    maintain_table_limit("temperature")
    maintain_table_limit("moisture")
    maintain_table_limit("rain")
    maintain_table_limit("light")

    try:
        mycursor.execute(sql_temperature, val_temperature)
        mycursor.execute(sql_moisture, val_moisture)
        mycursor.execute(sql_rain, val_rain)
        mycursor.execute(sql_light, val_light)
        
        mydb.commit()
        print("Records inserted into all tables.")
    except mysql.connector.Error as err:
        print("Error: {}".format(err))
        mydb.rollback()

# Khởi tạo MQTT client
client = mqtt.Client()
client.on_connect = on_connect
client.on_message = on_message

# Kết nối tới MQTT broker
client.connect("broker.emqx.io", 1883, 60)

# Lắng nghe dữ liệu từ MQTT broker vô thời hạn
client.loop_forever()
