
<?php
$servername = "sql311.infinityfree.com";
$username = "if0_36395475";
$password = "ks142003";
$dbname = "if0_36395475_karshaka_sahaayi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT * FROM insurance_scheme";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $data[] = $row['content']; // Assuming 'content' holds the text for each box
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Expandable Text Boxes</title>
<style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      overflow-y: auto;
      transition: filter 0.3s ease; /* Smooth transition for blur effect */
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

    .heading {
      position: relative;
      bottom: 9cm;
      left: 100px;
      font-size: 30px;
      width: 10cm;
    }

    .text-box {
      padding: 10px;
      margin-bottom: 20px;
      background-color: #ffffff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      cursor: pointer;
      transition: box-shadow 0.3s ease;
    }

    .text-box:hover {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .modal-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }

    .green-text {
      color: #4d9120;
    }

    .modal-content {
      background-color: #ffffff;
      padding: 20px;
      box-shadow: 0 4px 8px #e6daa9;
      border-radius: 8px;
      max-width: 80%;
      overflow-y: auto;
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
      z-index: 1000; /* Ensure footer appears above modal */
    }
</style>
</head>
<body>
  <!-- Container for header content -->
  <div id="headerContainer"></div>
  
  <div class="container">
    <img src="https://github.com/goodfellas4/Karshaka-Sahaayi-website/blob/main/All%20images/scheme_page.jpg?raw=true" alt="Background Image">
    <div class="heading">
      <h1><span class="green-text">Schemes</span> & Insurances</h1>
    </div>
    
    <div class="container">
        <!-- Your existing HTML content -->

        <!-- Dynamically generated text boxes -->
        <?php
        // Generate text boxes using fetched data
        for ($i = 0; $i < count($data); $i++) {
            echo '<div class="text-box">' . $data[$i] . '</div>';
        }
        ?>
        
  </div>

  <!-- Modal Overlay -->
  <div class="modal-overlay" id="modal-overlay">
    <div class="modal-content" id="modal-content">
      <!-- Content of the active text box will be loaded here -->
    </div>
  </div>
   
  <!-- JavaScript to load the header -->
  <script>
    fetch('header.html')
      .then(response => response.text())
      .then(data => {
        document.getElementById('headerContainer').innerHTML = data;
      })
      .catch(error => {
        console.error('Error fetching header:', error);
      });

    // Event listener to handle text-box click and modal display
    const textBoxes = document.querySelectorAll('.text-box');
    const modalOverlay = document.getElementById('modal-overlay');

    textBoxes.forEach(textBox => {
      textBox.addEventListener('click', () => {
        const content = textBox.innerHTML;
        document.getElementById('modal-content').innerHTML = content;
        modalOverlay.style.display = 'flex';
        document.body.style.overflow = 'hidden'; // Disable scrolling on the body
      });
    });

    // Close modal when clicking outside of modal content
    modalOverlay.addEventListener('click', (event) => {
      if (event.target === modalOverlay) {
        modalOverlay.style.display = 'none';
        document.body.style.overflow = 'auto'; // Re-enable scrolling on the body
      }
    });
  </script>

  <!-- Footer -->
  <footer>
    <p>&copy; 2024 My Webpage. All rights reserved.</p>
  </footer>
</body>
</html>
