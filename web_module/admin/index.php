<?php
$function_url="../assets/php/functions.php";
include('./php/admin_functions.php');
// include 'chartemp.php';

if(!isset($_SESSION['admin_auth'])) header('Location:./pages/login.php');
$admin = getAdmin($_SESSION['admin_auth']);


// $newestHumidityValue = getLatestValueFromTable('humidity', 'humidity_value','humidity_time');
// $newestMoistureValue = getLatestValueFromTable('moisture', 'moisture_value','moisture_time');
// $newestRainValue = getLatestValueFromTable('rain', 'rain_value','rain_time');
// $newestLightValue = getLatestValueFromTable('light', 'light_value','light_time');


// $avgHumidityValue = calculateAverageValueFromTable('humidity', 'humidity_value');
// $avgMoistureValue = calculateAverageValueFromTable('moisture', 'moisture_value');
// $avgRainValue = calculateAverageValueFromTable('rain', 'rain_value');
// $avgLightValue = calculateAverageValueFromTable('light', 'light_value');


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pictogram | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="style_iot.css"> <!-- thêm đoạn này -->


</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../assets/images/logoDHTpf.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class=" btn btn-sm btn-danger" href="php/admin_actions.php?logout" role="button">
          Logout
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
   
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../assets/images/logoDHTpf.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Vườn Thông Minh</span>
    </a>

    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      
        <div class="info">
          <a href="#" class="d-block"><?=$admin['full_name']?></a>
        </div>
      </div>


   

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="?dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               
              </p>
            </a>
          </li>

          <!-- thêm đoạn này -->
          <li class="nav-item">
            <a href="?control" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
               Điều khiển
              </p>
            </a>
          </li>
          <!-- thêm đoạn này -->
          
          <!-- thêm đoạn này -->
          <li class="nav-item">
            <a href="?edit" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
               Điều chỉnh giới hạn
              </p>
            </a>
          </li>
          <!-- thêm đoạn này -->

          <li class="nav-item">
            <a href="?edit_profile" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
               Edit Profile
              </p>
            </a>
          </li>
       
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">
              <?php if(isset($_GET['edit_profile'])){
                echo "Edit Profile";

              }elseif(isset($_GET['control'])){
                echo "Điều khiển";
              }elseif(isset($_GET['edit'])){
                echo "Điều chỉnh giới hạn";
              }else{
                
                echo "Dashboard";
              } ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      <?php if(isset($_GET['edit_profile'])){

      }else{
        ?>
 <div class="row">

                <!-- Chổ Hiển thị-->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="list_page active" href="#tab_user">
              <div class="small-box bg-info">
                <div class="inner">
                  <h3 id="latesttemperature">Đang tải...</h3>
                </div>
                <div class="icon">
                  <i class="ion-thermometer"></i>
                </div>
              </div>

              <script>
                function fetchTemperature() {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("latesttemperature").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", "./get_temp.php", true);
                    xhttp.send();
                }

                fetchTemperature();

                 setInterval(fetchTemperature,5000); 
              </script> 

            </a>
            
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="list_page" href="#tab_post">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3 id="latestmoisture">Đang tải...</h3>
   
                </div>

                <div class="icon">
                  <i class="ion-speedometer"></i>
                </div>
              </div>
              <script>
                function fetchTemperature() {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("latestmoisture").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", "./get_mois.php", true);
                    xhttp.send();
                }

                fetchTemperature();

                 setInterval(fetchTemperature,5000); 
              </script> 

            </a>
            
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="list_page" href="#tab_comment">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3 id="latestrain">Đang tải...</h3>
                </div>
                <div class="icon">
                  <i class="ion-waterdrop"></i>
                </div>
              </div>
              <script>
                function fetchTemperature() {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("latestrain").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", "./get_rain.php", true);
                    xhttp.send();
                }

                fetchTemperature();

                 setInterval(fetchTemperature,5000); 
              </script> 
            </a>
            
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="list_page" href="#tab_like">
              <div class="small-box bg-danger">
                <div class="inner">
                <h3 id="latestlight">Đang tải...</h3>
                </div>
                <div class="icon">
                  <i class="ion-android-sunny"></i>
                </div>
              </div>
              <script>
                function fetchTemperature() {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("latestlight").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", "./get_light.php", true);
                    xhttp.send();
                }

                fetchTemperature();

                 setInterval(fetchTemperature,5000); 
              </script> 
            </a>
            
          </div>
          <!-- ./col -->
        </div>
        <?php
      }

      ?>
       
        <!-- /.row -->
        <!-- Main row -->
       <div class="row">
<?php
if(isset($_GET['edit_profile'])){
?>
 <div class="card card-primary col-12">
              <div class="card-header">
                <h3 class="card-title">Edit Your Profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?=showError('adminprofile')?>
              <form method="post" action="php/admin_actions.php?updateprofile">
                <input type="hidden" name="user_id" value="<?=$admin['id']?>" >
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" name="full_name" value="<?=$admin['full_name']?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Full Name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email"  value="<?=$admin['email']?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="text" name="password" value="<?=$admin['password_text']?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
              </form>
            </div>


<!-- thêm đoạn này -->
<?php
}elseif(isset($_GET['control'])){
?>
  <div class="card card-primary col-12">
    <div class="card-header">
      <h3 class="card-title">Điều khiển hệ thống IOT</h3>
    </div>
    <div class="card-body dkbtn" id="dk_btn">
      <div id="tuoinuoc_r">
        <button id="battuoi" onclick="guidk(this)" >Tưới</button>
        <button id="tattuoi" onclick="guidk(this)" disabled>Ngưng</button>
        <br>
        <input style="border: none;  height: 30px;" placeholder="note..." type="text" id="tt_tuoi">
      </div>

      <div id="phunsuong_r">
        <button id="batsuong" onclick="guidk(this)" >Phun sương</button>
        <button id="tatsuong" onclick="guidk(this)" disabled>Ngưng</button>
        <br>
        <input style="border: none;  height: 30px;" placeholder="note..." type="text" id="tt_phsuong">
      </div>

      <div id="densuoi_r">
        <button id="batsuoi" onclick="guidk(this)" >Bật sưởi</button>
        <button id="tatsuoi" onclick="guidk(this)" disabled>Ngưng</button>
        <br>
        <input style="border: none;  height: 30px;" placeholder="note..." type="text" id="tt_suoi">
      </div>

      <div id="tamche_r">
        <button id="dongmua" onclick="guidk(this)" >Đóng mái che</button>
        <button id="momua" onclick="guidk(this)" disabled>Mở mái che</button>
        <br>
        <input style="border: none; height: 30px;" placeholder="note..." type="text" id="tt_mua">
      </div>

      <div id="manche_r">
        <button id="dongnang" onclick="guidk(this)" >Đóng màn che</button>
        <button id="monang" onclick="guidk(this)" disabled>Mở màn che</button>
        <br>
        <input style="border: none;  height: 30px;" placeholder="note..." type="text" id="tt_nang">
      </div>
      

      
    </div>  
    <!-- thêm đoạn này -->    
    <div class="card-header ">
      <h3 class="card-title ">Nút khẩn cấp</h3>
    </div>
    <div class="card-body nkc">     
      <button id="nkc_start" onclick="sendkc(this)" disabled>Khởi chạy chức năng</button>
      <button id="nkc_stop" onclick="sendkc(this)">Dừng toàn bộ chức năng</button>     
    </div>
<!-- thêm đoạn này -->
  </div>
<!-- thêm đoạn này -->
<!-- thêm đoạn này -->
<?php
}elseif(isset($_GET['edit'])){
?>
<div class="card card-primary col-12">
    <div class="card-header">
      <h3 class="card-title">Điều chỉnh giới hạn </h3>
    </div>
    <div id="change_data" class="card-body ch_r">
        <div class="dev_r">
          <h3>Thay đổi giới hạn nhiệt độ chịu đựng</h3>
          <p>(Giá trị mặc định là dưới  28°C và trên 35°C)</p>
          <input type="number" id="tempup" placeholder="nhập giới hạn trên cho nhiệt độ"> 
          <br>
          <input type="number" id="tempdown" placeholder="nhập giới hạn dưới cho nhiệt độ">
          <br>
          <button onclick="sendlvl(this)" id=ch_temp>Thay đổi</button>
        </div>

        <div class="dev_r">
          <h3>Thay đổi giới hạn độ ẩm đất chịu đựng</h3>
          <p>(Giá trị mặc định là dưới  20% và trên 60%)</p>
          <input type="number" id="moisup" placeholder="nhập giới hạn trên cho độ ẩm đất"> 
          <br>
          <input type="number" id="moisdown" placeholder="nhập giới hạn dưới cho độ ẩm đất">
          <br>
          <button onclick="sendlvl(this)" id=ch_mois>Thay đổi</button>
        </div>

        <div class="dev_r">
          <h3>Thay đổi giới hạn lượng mưa chịu đựng</h3>
          <p>(Giá trị mặc định là trên 80%)</p>
          <input type="number" id="rainup" placeholder="nhập giới hạn trên cho lượng mưa">          
          <br>
          
          <table>
            <tr>
              <th>Giá trị</th>
              <th>Mô tả</th>
            </tr>
            <tr>
              <td>từ 80 trở lên</td>
              <td>Rất lớn</td>
            </tr>
            <tr>
              <td>từ 60 đến 80</td>
              <td>Lớn</td>
            </tr>
            <tr>
              <td>Từ 40 đến 60</td>
              <td>Vừa</td>
            </tr>
            <tr>
              <td>Từ 20 đến 40</td>
              <td>Nhỏ</td>
            </tr>
            <tr>
              <td>Nhỏ hơn 20</td>
              <td>Rất nhỏ</td>
            </tr>
          </table>

          <button onclick="sendlvl(this)" id=ch_rain>Thay đổi</button>
        </div>

        <div class="dev_r">
          <h3>Thay đổi giới hạn mức độ ánh sáng chịu đựng</h3>
          <p>(Giá trị mặc định là trên 70%)</p>
          <input type="number" id="lightup" placeholder="nhập giới hạn trên cho mức độ ánh sáng"> 
          
          
          <table>
            <tr>
              <th>Giá trị</th>
              <th>Mô tả</th>
            </tr>
            <tr>
              <td>Từ 70 trở lên</td>
              <td>ánh sáng mạnh trực tiếp</td>
            </tr>
            <tr>
              <td>Từ 35 đến 70</td>
              <td>ánh sáng thông thường, vừa phải </td>
            </tr>
            <tr>
              <td>Nhỏ hơn 35</td>
              <td>ánh sáng nhỏ yếu</td>
            </tr>
          </table>

          <button onclick="sendlvl(this)" id=ch_light>Thay đổi</button>
        </div>


    </div>
</div>
<!-- thêm đoạn này -->
<?php
}else{
?>

<!-- Thêm code đoạn này - thay thế cho phần code sau else ở code cũ -->

<!-- BIỂU ĐỒ NHIỆT ĐỘ -->

            <div class="card w-100 tap_page" id="tab_user">
              <div class="card-header">
                <h3 class="card-title">Biểu Đồ Nhiệt Độ</h3>
                <!-- HTML Canvas -->
              </div>
              <!-- /.card-header -->
              <div class="card-body bieudo">
              <canvas class="bieudocss" id="temperatureChart" width="700" height="200">Đang tải...</canvas>
              <script>
              function fetchTemperatureData() {
                  var xhttp = new XMLHttpRequest();
                  xhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                          var temperatureData = JSON.parse(this.responseText);

                          var labels = temperatureData.map(function(item) {
                              return item.temperature_time; // Sử dụng thời gian làm nhãn trục x
                          });

                          var values = temperatureData.map(function(item) {
                              return item.temperature_value; // Giá trị nhiệt độ làm dữ liệu trục y
                          });

                          chart.data.labels = labels;
                          chart.data.datasets[0].data = values;
                          chart.update();
                      }
                  };
                  xhttp.open("GET", "chartemp.php", true);
                  xhttp.send();
              }

              var ctx = document.getElementById('temperatureChart').getContext('2d');
              var chart = new Chart(ctx, {
                type: 'line',
                data: {
                  labels: [], // Mảng nhãn trục x
                  datasets: [{
                    label: 'Temperature',
                    data: [], // Mảng dữ liệu trục y
                    borderColor: 'rgba(255, 99, 132, 1)', // Màu đường biểu đồ
                    borderWidth: 1
                  }]
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: false // Bắt đầu trục y từ giá trị khác không
                    }
                  }
                }
              });

              // Cập nhật dữ liệu mỗi 5 giây
              setInterval(fetchTemperatureData, 3000);
              fetchTemperatureData(); // Lấy dữ liệu lần đầu khi trang được tải
            </script>


              </div>
      </div> 

<!-- BIỂU ĐỒ  ĐỘ ẨM ĐẤT-->

      <div class="card w-100 tap_page" id="tab_post">
    <div class="card-header">
        <h3 class="card-title">Biểu Đồ Độ Ẩm</h3>
    </div>
    <div class="card-body bieudo" >
        <canvas class="bieudocss" id="moistureChart" width="700" height="200">Đang tải...</canvas>
        <script>
            function fetchMoistureData() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var moistureData = JSON.parse(this.responseText);

                        var labels = moistureData.map(function(item) {
                            return item.moisture_time;
                        });

                        var values = moistureData.map(function(item) {
                            return item.moisture_value;
                        });

                        moistureChart.data.labels = labels;
                        moistureChart.data.datasets[0].data = values;
                        moistureChart.update();
                    }
                };
                xhttp.open("GET", "charmois.php", true);
                xhttp.send();
            }

            var moistCtx = document.getElementById('moistureChart').getContext('2d');
            var moistureChart = new Chart(moistCtx, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Moisture',
                        data: [],
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: false
                        }
                    }
                }
            });

            setInterval(fetchMoistureData, 3000);
            fetchMoistureData();
        </script>
    </div>
</div>
<!-- BIỂU ĐỒ  ĐỘ MƯA-->

<div class="card w-100 tap_page" id="tab_comment">
    <div class="card-header">
        <h3 class="card-title">Biểu Đồ Tỉ Lệ Mưa</h3>
    </div>
    <div class="card-body bieudo">
        <canvas class="bieudocss" id="rainChart" width="700" height="200">Đang tải...</canvas>
        <script>
            function fetchRainData() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var rainData = JSON.parse(this.responseText);

                        var labels = rainData.map(function(item) {
                            return item.rain_time;
                        });

                        var values = rainData.map(function(item) {
                            return item.rain_value;
                        });

                        rainChart.data.labels = labels;
                        rainChart.data.datasets[0].data = values;
                        rainChart.update();
                    }
                };
                xhttp.open("GET", "charrain.php", true);
                xhttp.send();
            }

            var rainCtx = document.getElementById('rainChart').getContext('2d');
            var rainChart = new Chart(rainCtx, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Rain',
                        data: [],
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: false
                        }
                    }
                }
            });

            setInterval(fetchRainData, 3000);
            fetchRainData();
        </script>
    </div>
</div>

<!-- BIỂU ĐỒ  ĐỘ MƯA-->

<div class="card w-100 tap_page" id="tab_like">
    <div class="card-header">
        <h3 class="card-title">Biểu Đồ Tỉ Lệ Nắng</h3>
    </div>
    <div class="card-body bieudo">
        <canvas class="bieudocss" id="lightChart" width="700" height="200">Đang tải...</canvas>
        <script>
            function fetchLightData() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var lightData = JSON.parse(this.responseText);

                        var labels = lightData.map(function(item) {
                            return item.light_time;
                        });

                        var values = lightData.map(function(item) {
                            return item.light_value;
                        });

                        lightChart.data.labels = labels;
                        lightChart.data.datasets[0].data = values;
                        lightChart.update();
                    }
                };
                xhttp.open("GET", "charlight.php", true);
                xhttp.send();
            }

            var lightCtx = document.getElementById('lightChart').getContext('2d');
            var lightChart = new Chart(lightCtx, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Light',
                        data: [],
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: false
                        }
                    }
                }
            });

            setInterval(fetchLightData, 3000);
            fetchLightData();
        </script>
    </div>
</div>









<?php
  }
?>
<!-- Thêm code đoạn này - thay thế cho phần code sau else ở code cũ -->


        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="#" target="_blank">DHT Social Media.</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->

<!-- AdminLTE App -->





<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<script src="js/actions.js?v=<?=time()?>"></script>





<!-- Thêm code script này -->
<script>
        $(document).ready(function(){
            $('.tap_page').hide();
            $('.tap_page:first-child').fadeIn();
            $('.list_page').click(function(){
                
                $('.list_page').removeClass('active');
                $(this).addClass('active');

                let id_chuyen_page= $(this).attr('href');
                
                $('.tap_page').hide();
                $(id_chuyen_page).fadeIn();
                return false;
            });
        });
</script>
<!-- Thêm code script này -->

<!-- Thêm code script này -->
<script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
<script>
    // Kết nối tới MQTT broker
    const client = mqtt.connect("ws://broker.emqx.io:8083/mqtt");

    client.on("connect", function () {
        console.log("Connected to MQTT broker");
        client.subscribe("testtopic/control_sg");
        // them topic
        client.subscribe("testtopic/nkc_res");
        //
        
    });

    client.on("message", function (topic, message) {
        console.log("Received message:", message.toString());
        if (topic === "testtopic/control_sg")
        {
          var phanhoi = message
                .toString();
          switch(phanhoi){
            case "battuoi":
              document.getElementById("tt_tuoi").value="Đang tưới...";
              document.getElementById("battuoi").disabled=true;
              document.getElementById("tattuoi").disabled=false;
              break;
            case "batsuong":
              document.getElementById("tt_phsuong").value="Đang phun sương...";
              document.getElementById("batsuong").disabled=true;
              document.getElementById("tatsuong").disabled=false;
              break;
            case "batsuoi":
              document.getElementById("batsuoi").disabled=true;
              document.getElementById("tatsuoi").disabled=false;
              document.getElementById("tt_suoi").value="Đang bật đèn sưởi...";
              break;
            case "tattuoi":
              document.getElementById("tt_tuoi").value="Ngừng tưới";
              document.getElementById("tattuoi").disabled=true;
              document.getElementById("battuoi").disabled=false;
              break;
            case "tatsuong":
              document.getElementById("tt_phsuong").value="Ngừng phun suong";
              document.getElementById("tatsuong").disabled=true;
              document.getElementById("batsuong").disabled=false;
              break;
            case "tatsuoi":
              document.getElementById("tt_suoi").value="Đã tắt đèn sưởi";
              document.getElementById("tatsuoi").disabled=true;
              document.getElementById("batsuoi").disabled=false;
              break;
            case "dongmua":
              document.getElementById("tt_mua").value="Đã đóng cửa che";
              document.getElementById("dongmua").disabled=true;
              document.getElementById("momua").disabled=false;
              break;
            case "momua":
              document.getElementById("tt_mua").value="Đã mở cửa che";
              document.getElementById("momua").disabled=true;
              document.getElementById("dongmua").disabled=false;
              break;
            case "dongnang":
              document.getElementById("tt_nang").value="Đã đóng màn che";
              document.getElementById("dongnang").disabled=true;
              document.getElementById("monang").disabled=false;
              break;
            case "monang":
              document.getElementById("tt_nang").value="Đã mở màn che";
              document.getElementById("monang").disabled=true;
              document.getElementById("dongnang").disabled=false;
              break;
            case "overtuw":
              document.getElementById("tt_tuoi").value="Không thực hiện được do đã ngoài giới hạn độ ẩm đất";              
              break;
            case "oversuw":
              document.getElementById("tt_phsuong").value="Không thực hiện được do nhiệt độ quá cao";      
              break;
            case "oversuoi":
              document.getElementById("tt_suoi").value="Không thực hiện được do nhiệt độ quá thấp";      
              break;
            case "overrain":
              document.getElementById("tt_mua").value="Không thực hiện được do đang mưa lớn";      
              break;
            case "overlight":
              document.getElementById("tt_nang").value="Không thực hiện được do đang nắng lớn";      
              break;
            
          }
          
        }
        else if(topic === "testtopic/nkc_res"){
          var nkc_res = message
                .toString();
          var dk_btn=document.getElementById("dk_btn");
          var change_data=document.getElementById("change_data");
          switch (nkc_res){
            case "1":
              document.getElementById("nkc_start").disabled=false;
              document.getElementById("nkc_stop").disabled=true;
              dk_btn.classList.add("disa");
              
              break;
            case "0":
              dk_btn.classList.remove("disa");
              
              document.getElementById("nkc_start").disabled=true;
              document.getElementById("nkc_stop").disabled=false;
          }
        }
    });

    function guidk(bt){
      var btnId = bt.id;
      if (btnId=="battuoi"){
        client.publish("testtopic/lenh", "1");
        
      }else if(btnId=="batsuong"){
        client.publish("testtopic/lenh", "2");

      }else if(btnId=="batsuoi"){
        client.publish("testtopic/lenh", "3");

      }else if(btnId=="tattuoi"){
        client.publish("testtopic/lenh", "-1");

      }else if(btnId=="tatsuong"){
        client.publish("testtopic/lenh", "-2");

      }else if(btnId=="tatsuoi"){
        client.publish("testtopic/lenh", "-3");
      }else if(btnId=="dongmua"){
        client.publish("testtopic/lenh", "4");
      }else if(btnId=="momua"){
        client.publish("testtopic/lenh", "-4");
      }else if(btnId=="dongnang"){
        client.publish("testtopic/lenh", "5");
      }else if(btnId=="monang"){
        client.publish("testtopic/lenh", "-5");
      }     
    }
    function sendlvl(idbt){
      var btnId = idbt.id;
      var n1=0;
      var n2=0;
      if(btnId=="ch_temp"){
        if(!isNaN(document.getElementById("tempup").value) && !isNaN(document.getElementById("tempdown").value)){
          n1=Number(document.getElementById("tempup").value);
          n2=Number(document.getElementById("tempdown").value);
          if(n1 <=100 && n2<=100){
            var ch = n1.toString()+"|"+n2.toString();
            client.publish("testtopic/tpc_temp", ch);
          }

        }
      }else if(btnId=="ch_mois"){
        if(!isNaN(document.getElementById("moisup").value) && !isNaN(document.getElementById("moisdown").value)){
          n1=Number(document.getElementById("moisup").value);
          n2=Number(document.getElementById("moisdown").value);
          if(n1 <=100 && n2<=100){
            var ch = n1.toString()+"|"+n2.toString();
            client.publish("testtopic/tpc_mois", ch);
          }
        }
      }else if(btnId=="ch_rain"){
        if(!isNaN(document.getElementById("rainup").value)){
          n1=Number(document.getElementById("rainup").value);        
          if(n1 <=100){
            var ch = n1.toString();
            client.publish("testtopic/tpc_rain", ch);
          }
        }
      }else if(btnId=="ch_light"){
        if(!isNaN(document.getElementById("lightup").value)){
          n1=Number(document.getElementById("lightup").value);        
          if(n1 <=100){
            var ch = n1.toString();
            client.publish("testtopic/tpc_light", ch);
          }
        }
      }
    }

    function sendkc(kc){
      var btnId = kc.id;
      if(btnId=="nkc_start"){
        client.publish("testtopic/nkc", "1");
      }else if(btnId=="nkc_stop"){
        client.publish("testtopic/nkc", "0");
      }
    }
</script>
<!-- Thêm code script này -->





</body>
</html>
<?php

if(isset($_SESSION['error'])){
  unset($_SESSION['error']);

}
?>