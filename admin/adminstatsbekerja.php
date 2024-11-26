<?php
include('config.php');

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Sistem Alumni</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <style>
    body {
      font-family: 'Quicksand', sans-serif;
      background-image: url(pic/bg1.jpg);
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      height: 800px;
    }
    
    .mobile-container {
      max-width: 480px;
      margin: auto;
      background-color: #555;
      height: 500px;
      color: white;
      border-radius: 10px;
    }
    
    .topnav {
      overflow: hidden;
      background-color: rgb(222, 29, 29);
      position: relative;
    }
    
    .topnav #myLinks {
      display: none;
    }
    
    .topnav a {
      color: white;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
      display: block;
    }
    
    .topnav a.icon {
      background: rgb(222, 29, 29);
      display: block;
      position: absolute;
      right: 0;
      top: 0;
    }
    
    .dropbtn {
  background-color: #2d2faf;;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2d2faf;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}

   .chart {
    display: flex;
    justify-content: center;
    margin-top: 50px;
   }
   .logoutbtn {
  background-color: black;
    color: white;
    text-decoration: none;
    margin-right: 35px;
    width: 100%;
    border-radius: 3px;
}

    </style>

</head>
<body>
    
<div class="topnav">
<div class="topnav">
      <b><a href="adminstats.php">ADMIN PAGE SISTEM ALUMNI</a></b>
      <div id="myLinks">
        <a href="adminstatsbekerja.php">Statistik Bekerja</a>
        <a href="adminstatssambungbelajar.php">Statistik Sambung Belajar</a>
        <a href="adminstatsusahawan.php">Statistik Usahawan</a>
        <a href="addadmin.php">Tambah Admin</a>
<button class="logoutbtn"><a href="../logout.php" style="color: white;  text-decoration: none;">LOG OUT</a></button>

      </div>
      
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div></div>

      <h1 style="color: white; text-align: center; padding: 10px;">Statistik Sistem Alumni</h1>
    <div class="chart">
        <!-- pie cart kat sini -->
        <div style="width: 800px; background-color: white; border-radius: 20px;">
            <canvas id="statCart" style="width:100%;max-width:900px; margin-bottom: 50px; margin-top: 50px;"></canvas>
        </div>
        <!-- end pie chart -->
    </div>

    <?php 
    $sql = "SELECT * FROM bekerja";
    $result = mysqli_query($connect, $sql);
    $total = mysqli_num_rows($result);

    $kursus = "";
    $kcount = "";
    $sql2 = "SELECT COUNT(ID) AS count, kursus
    FROM bekerja
    GROUP BY kursus
    HAVING COUNT(ID) > 0;";
    $result2 = mysqli_query($connect, $sql2);
    while($row2 = mysqli_fetch_assoc($result2)){

        if($kursus == ""){
            $kursus = "'".$row2["kursus"]."'";
        }else{
            $kursus = $kursus.", '".$row2["kursus"]."'";
        }

        $percent = ($row2["count"] / $total) * 100;
        $percent = round($percent);

        if($kcount == ""){
            $kcount = "'".$percent."'";
        }else{
            $kcount = $kcount.", '".$percent."'";
        }

    }
    ?>

    <script>
        const xValues = [<?php echo $kursus; ?>];
        const yValues = [<?php echo $kcount; ?>];
        const barColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9",
        "#1e7145",
        "yellow",
        "black",
        "red",
        "#ec16e1",
        "#af700b",
        "#04ee0b",
        "#2b115d",
        "#4f8091",
        "#84a10d",
        "#a52e79",
        "#d269bd",
        "#b595c3",
        "#4000ed",
        "#672e2e"
        ];

        new Chart("statCart", {
        type: "doughnut",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: true,
                text: "ALUMNI BEKERJA (%)"
            },
            // scales: {
            //     yAxes: {
            //         ticks: {
            //             callback: function(value, index, values) {
            //                 return value + " %";
            //             }            
            //         }
            //     }
            // },
        },
        datalabels: {
                formatter: function(value, context) {
                    return context.chart.data.labels[context.dataIndex];
                },
                color: 'white',
                font: {
                    weight: 'bold',
                    size: 18
                },
                padding: 4,
            }
        });
    </script>

    
    <script>
        function myFunction() {
          var x = document.getElementById("myLinks");
          if (x.style.display === "block") {
            x.style.display = "none";
          } else {
            x.style.display = "block";
          }
        }
function myFunction2() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
        </script>
</body>
</html>