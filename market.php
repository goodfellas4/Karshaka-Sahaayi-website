
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Market Insights</title>
<style>
  body {
    font-family: Arial, sans-serif;
    padding: 20px;
  }
     .container {
      position: relative;
      max-width: 1400px;
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
  .vegetable-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px; /* Adjust the gap between vegetables */
    
    width: 100%;
  }
  .vegetable-card {
    text-align: center;
    width: calc(20% - 40px); /* 20% width minus margins */
    margin: 10px;
    padding: 10px;
  }
  .vegetable-image {
    max-height: 100px; /* Adjust the image height */
    object-fit: cover;
    margin-bottom: 10px;
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

<!-- Container for the header content -->
<div id="headerContainer"></div>
<div class="container">
    <?php
// Database credentials
$hostname = 'sql311.infinityfree.com';
$username = 'if0_36395475';
$password = 'ks142003';
$database = 'if0_36395475_karshaka_sahaayi';

// Create connection
$conn = new mysqli($sql311.infinityfree.com, $if0_36395475, $ks142003, $if0_36395475_karshaka_sahaayi);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Query to retrieve vegetable prices
$sql = "SELECT items, price FROM vegetables";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Extract vegetable name and price
        $items = $row['items'];
        $price = $row['price'];

        // Output HTML for each vegetable card with respective price
        echo '<div class="vegetable-card">';
        echo '<img src="https://github.com/goodfellas4/Karshaka-Sahaayi-website/blob/main/image/' . strtolower($items) . '.jpg" alt="' . $items . '" class="vegetable-image">';
        echo '<p style="font-weight: bold;">' . $items . '</p>';
        echo '<p>Price: ₹' . $price . ' per kg</p>';
        echo '</div>';
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>


  </div>
</div>
<footer>
    <p>&copy; 2024 My Webpage. All rights reserved.</p>
</footer>
<!-- JavaScript to load the header -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    fetch('header.html')
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.text();
      })
      .then(data => {
        document.getElementById('headerContainer').innerHTML = data;
      })
      .catch(error => {
        console.error('Error fetching header:', error);
      });
  });
</script>

</body>
</html>
