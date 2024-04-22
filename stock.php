<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Selectable Option and Table</title>
<style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      overflow-y: auto;
    }
    .options {
      display: flex;
      justify-content: center;
      padding: 10px 0;
    }
    .select-option {
      margin-right: 10px;
    }
    table {
      margin: 20px auto;
      border-collapse: collapse;
      border: black solid;
    }
    th, td {
      padding: 10px;
      border: 1px solid #ddd;
    }
    .container {
      position: relative;
      bottom: 10px;
      max-width: 1200px;
      max-height: 12cm;
      margin: 0 auto;
      padding: 20px;
    }
    .container img {
      position: relative;
      left: 18cm;
      width: 7cm;
    }
    .green-text {
      color: #4d9120;
    }
    .heading {
      position: relative;
      bottom: 11cm;
      left: 150px;
      font-size: 30px;
      width: 10cm;
    }
    footer {
      background-color: #4d9120;
      color: #fff;
      text-align: center;
      padding: 20px;
      position: relative;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 3cm;
    }
</style>
</head>
<body>

<div id="headerContainer">
    
<div class="container">
    <img src="https://github.com/goodfellas4/Karshaka-Sahaayi-website/blob/main/All%20images/stock%20and%20prices.jpg?raw=true" alt="Background Image">
    <div class="heading">
        <h1><span class="green-text">Stock</span> & Prices</h1>
    </div>
</div>
</div>


<div class="options">
    <span class="select-option">Select Location:</span>
    <select name="option">
        <option value="option1">Kalady</option>
        <option value="option2">Okkal</option>
        <option value="option3">Sreemoolanagaram</option>
        <option value="option4">Angamaly</option>
    </select>
</div>

<table>
    <tr>
        <th>Serial No.</th>
        <th>Product</th>
        <th>Price(₹)</th>
        <th>Stock</th>
        <th>Last Updated</th>
    </tr>
    <?php
    $servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'demo';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$selectedOption = $_GET['option'];

$sql = "";

switch ($selectedOption) {
  case 'option1':
      $sql = "SELECT * FROM stock_update_kalady";
      break;
  case 'option2':
      $sql = "SELECT * FROM stock_update_okkal";
      break;
  case 'option3':
      $sql = "SELECT * FROM stock_update_sreemoolanagaram";
      break;
  case 'option4':
      $sql = "SELECT * FROM stock_update_angamaly";
      break;
  default:
      $sql = "SELECT * FROM stock_update_kalady";
      break;
}
$result = $conn->query($sql);

    // Loop through the fetched data and display in table rows
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["serial_no"] . "</td>"; // Adjust column names accordingly
            echo "<td>" . $row["product"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td>" . $row["stock"] . "</td>";
            echo "<td>" . $row["last_update"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No data found</td></tr>";
    }
    $conn->close();
    ?>
</table>

<footer>
    <p>&copy; 2024 My Webpage. All rights reserved.</p>
</footer>
<script>
document.getElementById('optionSelect').addEventListener('change', function() {
    var selectedOption = this.value;
    
    // Make AJAX request to fetch data based on selected option
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetch_data.php?option=' + selectedOption, true);
    
    xhr.onload = function() {
        if (xhr.status == 200) {
            document.getElementById('data-table').innerHTML = xhr.responseText;
        } else {
            console.error('Request failed. Status:', xhr.status);
        }
    };
    
    xhr.send();
});
</script>
</body>
</html>
