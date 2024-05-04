<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<title>View Captured Images</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        grid-gap: 20px;
    }

    .image-card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .image-card:hover {
        transform: translateY(-5px);
    }

    .image-card img {
        width: 100%;
        height: auto;
        display: block;
    }

    .image-card p {
        margin: 10px 0;
    }

    .email-link {
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
    }

    .email-link:hover {
        text-decoration: underline;
    }
</style>
<script> 
$(function(){
  $("#header").load("headerCompany.php");
});
</script>
</head>
<body>
<div id="header"></div><br><br><br><br>
<div class="container">
    <?php
    // Include the database connection file
    include_once 'db_connect.php'; // Update with your actual file name

    // Fetch all records from realtimepicturetbl
    $sql = "SELECT * FROM realtimepicturetbl";
    $result = $conn->query($sql);

    // Display the captured images and their respective farmer emails
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='image-card'>";
            // Open the image in a new window when clicked
            echo "<a href='" . $row["imagepath"] . "' target='_blank'><img src='" . $row["imagepath"] . "' /></a>";
            echo "<p>Farmer Email: <a href='mailto:" . $row["farmerEmail"] . "' class='email-link'>" . $row["farmerEmail"] . "</a></p>";
            echo "</div>";
        }
    } else {
        echo "<p>No captured images found.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>
</div>

</body>
</html>

