<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function to handle database connection
function connectToDatabase() {
    $hostname = 'sql311.infinityfree.com';
    $username = 'if0_36395475';
    $password = 'ks142003';
    $database = 'if0_36395475_karshaka_sahaayi';

    // Create connection
    $conn = new mysqli($hostname, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Check if the request method is GET and 'option' parameter is present
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['option'])) {
    $option = $_GET['option'];
    
    // Handle GET requests for fetching data
    switch ($option) {
        case "stock_update_kalady":
            fetchStockData("stock_update_kalady");
            break;
        case "stock_update_okkal":
            fetchStockData("stock_update_okkal");
            break;
        case "stock_update_angamaly":
            fetchStockData("stock_update_angamaly");
            break;
        case "stock_update_sreemoolanagaram":
            fetchStockData("stock_update_sreemoolanagaram");
            break;
        default:
            die('Invalid option');
    }
}

// Function to fetch stock data based on table name
function fetchStockData($tableName) {
    $conn = connectToDatabase();

    $sql = "SELECT * FROM $tableName";
    $result = $conn->query($sql);

    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    $conn->close();

    header('Content-Type: application/json');
    echo json_encode(array($tableName => $data));
    exit;
}

// Check if the request method is POST and 'option' parameter is present
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['option'])) {
    $option = $_POST['option'];

    // Handle POST requests for updating data
    switch ($option) {
        case "update_stock":
            updateStockData();
            break;
        case "delete_stock":
            deleteStockData();
            break;
        case "add_stock":
            addStockData();
            break;
        default:
            die('Invalid option');
    }
}

// Function to update stock data
function updateStockData() {
    $conn = connectToDatabase();

    // Retrieve POST data
    $tableName = $_POST['table_name'];
    $serialNo = $_POST['serial_no'];
    $product = $_POST['product'];
    $lastUpdate = $_POST['last_update'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];

    // Perform update query
    $sql = "UPDATE $tableName SET product='$product', last_update='$lastUpdate', stock='$stock', price='$price' WHERE serial_no='$serialNo'";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(array('message' => "Record updated successfully"));
    } else {
        echo json_encode(array('error' => "Error updating record: " . $conn->error));
    }

    $conn->close();
}

// Function to handle deleting stock data
function deleteStockData() {
    $conn = connectToDatabase();

    // Retrieve POST data
    $tableName = $_POST['table_name'];
    $serialNo = $_POST['serial_no'];

    // Perform delete query
    $sql = "DELETE FROM $tableName WHERE serial_no='$serialNo'";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(array('message' => "Record deleted successfully"));
    } else {
        echo json_encode(array('error' => "Error deleting record: " . $conn->error));
    }

    $conn->close();
}

// Function to add new stock data
function addStockData() {
    $conn = connectToDatabase();

    // Retrieve POST data
    $tableName = $_POST['table_name'];
    $serialNo = $_POST['serial_no'];
    $product = $_POST['product'];
    $lastUpdate = $_POST['last_update'];
    $stock = $_POST['stock'];
    $price = floatval($_POST['price']); // Convert to float

    // Perform insert query
    $sql = "INSERT INTO $tableName (serial_no, product, last_update, stock, price) VALUES ('$serialNo', '$product', '$lastUpdate', '$stock', '$price')";

    if ($conn->query($sql) === TRUE) {
        $response = array('success' => true, 'message' => 'Record added successfully');
    } else {
        $response = array('success' => false, 'error' => 'Error adding record: ' . $conn->error);
    }

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Page - Stock Details</title>
<style>
  body {
    font-family: Arial, sans-serif;
    padding: 20px;
  }
  table {
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 20px;
  }
  table, th, td {
    border: 1px solid #ddd;
    padding: 8px;
  }
  th {
    background-color: #f2f2f2;
  }
  select, input, button {
    padding: 6px 12px;
    border-radius: 4px;
    margin-bottom: 20px;
  }
  button {
    cursor: pointer;
    background-color: #4CAF50;
    color: white;
    border: none;
  }
</style>
</head>
<body>
<h1>Admin Page - Stock Details</h1>

<!-- Option Selection Box -->
<select id="optionSelect">
  <option value="stock_update_kalady">Kalady</option>
  <option value="stock_update_okkal">Okkal</option>
  <option value="stock_update_angamaly">Angamaly</option>
  <option value="stock_update_sreemoolanagaram">Sreemoolanagaram</option>
</select>

<!-- Form to Add New Stock -->
<h2>Add New Stock</h2>
<form id="addStockForm">
  <input type="hidden" id="tableName" name="table_name">
  <input type="text" id="serialNo" name="serial_no" placeholder="Serial No" required>
  <input type="text" id="product" name="product" placeholder="Product" required>
  <input type="date" id="lastUpdate" name="last_update" required>
  <select id="stock" name="stock" required>
    <option value="in-stock">In Stock</option>
    <option value="out of stock">Out of Stock</option>
  </select>
  <input type="number" id="price" name="price" step="0.01" placeholder="Price" required>
  <button type="submit">Add Stock</button>
</form>
</section>

<!-- Stock Table Section -->
<section id="stockTableSection">
  <h2>Stock Details</h2>
  <table id="stockTable">
    <thead>
      <tr>
        <th>Serial No</th>
        <th>Product</th>
        <th>Last Update</th>
        <th>Stock</th>
        <th>Price</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="stockTableBody">
      <!-- Rows will be dynamically generated here -->
    </tbody>
  </table>
</section>

<!-- JavaScript to handle table generation and editing -->
<script>
  // Function to fetch data from PHP backend
  async function fetchDataFromServer(selectedOption) {
    try {
      const response = await fetch(`admin.php?option=${selectedOption}`);
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      const data = await response.json();
      console.log('Fetched data:', data); // Log the fetched data for debugging
      return data;
    } catch (error) {
      console.error('Error fetching data:', error);
      return null;
    }
  }

  // Function to populate stock table based on selected option
  async function populateStockTable(selectedOption) {
    const stockTableBody = document.getElementById('stockTableBody');
    const data = await fetchDataFromServer(selectedOption);
    if (!data || !data[selectedOption]) {
      stockTableBody.innerHTML = '<tr><td colspan="6">No data available</td></tr>';
      return;
    }

    // Clear existing rows
    stockTableBody.innerHTML = '';

    // Populate rows
    data[selectedOption].forEach((item) => {
      const row = document.createElement('tr');
      row.innerHTML = `
        <td>${item.serial_no}</td>
        <td contenteditable="true" onBlur="updateStock('${selectedOption}', '${item.serial_no}', 'product', this.innerText)">${item.product}</td>
        <td contenteditable="true" onBlur="updateStock('${selectedOption}', '${item.serial_no}', 'last_update', this.innerText)">${item.last_update}</td>
        <td contenteditable="true" onBlur="updateStock('${selectedOption}', '${item.serial_no}', 'stock', this.innerText)">${item.stock}</td>
        <td contenteditable="true" onBlur="updateStock('${selectedOption}', '${item.serial_no}', 'price', this.innerText)">${item.price}</td>
        <td><button onclick="deleteStock('${selectedOption}', '${item.serial_no}')">Delete</button></td>
      `;
      stockTableBody.appendChild(row);
    });
  }

  // Function to handle updating stock details
  async function updateStock(tableName, serialNo, field, newValue) {
    const data = {
      option: 'update_stock',
      table_name: tableName,
      serial_no: serialNo,
      [field]: newValue
    };

    try {
      const response = await fetch('admin.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams(data).toString()
      });
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      const result = await response.json();
      console.log(result); // Log the result of the update operation
      // Refresh the table after update
      populateStockTable(tableName);
    } catch (error) {
      console.error('Error updating data:', error);
    }
  }

  // Function to handle deleting a stock item
  async function deleteStock(tableName, serialNo) {
    if (!confirm("Are you sure you want to delete this item?")) {
      return;
    }

    const data = {
      option: 'delete_stock',
      table_name: tableName,
      serial_no: serialNo
    };

    try {
      const response = await fetch('admin.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams(data).toString()
      });
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      const result = await response.json();
      console.log(result); // Log the result of the delete operation
      // Refresh the table after delete
      populateStockTable(tableName);
    } catch (error) {
      console.error('Error deleting data:', error);
    }
  }

  // Function to handle adding a new stock item
 async function addStock() {
    const selectedOption = document.getElementById('optionSelect').value;
    const serialNo = document.getElementById('serialNo').value;
    const product = document.getElementById('product').value;
    const lastUpdate = document.getElementById('lastUpdate').value;
    const stock = document.getElementById('stock').value;
    const price = document.getElementById('price').value;

    const data = {
        option: 'add_stock',
        table_name: selectedOption,
        serial_no: serialNo,
        product: product,
        last_update: lastUpdate,
        stock: stock,
        price: price
    };

    try {
        const response = await fetch('admin.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams(data).toString()
        });

        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        const contentType = response.headers.get('content-type');
        if (contentType && contentType.indexOf('application/json') !== -1) {
            const result = await response.json();
            console.log(result); // Log the result of the add operation

            // Check if the operation was successful
            if (result.success) {
                alert('Record added successfully'); // Show alert for successful addition
                // Refresh the table after adding
                populateStockTable(selectedOption);
            } else {
                alert('Error adding record: ' + result.error); // Show alert for error
            }
        } else {
            throw new Error('Unexpected response from server');
        }
    } catch (error) {
        console.error('Error adding data:', error);
        alert('Error adding record: ' + error.message); // Show alert for unexpected error
    }
}

  // Handle form submission for adding new stock
  document.getElementById('addStockForm').addEventListener('submit', function(event) {
    event.preventDefault();
    addStock();
  });

  // Handle option selection
  document.getElementById('optionSelect').addEventListener('change', function() {
    const selectedOption = this.value;
    populateStockTable(selectedOption);
  });

  // Initial population based on default selection
  const initialOption = document.getElementById('optionSelect').value;
  populateStockTable(initialOption);
</script>

</body>
</html>
