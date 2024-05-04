<?php
session_start();
if (!isset($_SESSION["email"])) {
    header('Location: loginFarmer.php');
    exit;
}

// Include the database connection file
include_once 'db_connect.php'; // Update with your actual file name

// Check if image data is received
if (isset($_POST["image"])) {
    // Get the base64 encoded image data
    $base64data = $_POST["image"];

    // Remove the data:image/jpeg;base64, prefix
    $base64data = str_replace('data:image/jpeg;base64,', '', $base64data);

    // Decode the base64 encoded image data
    $imageData = base64_decode($base64data);

    // Specify the folder where you want to save the image
    $folderPath = "imagesCapture/";

    // Generate a unique filename for the image
    $fileName = $folderPath . uniqid() . '.jpeg';

    // Save the image to the specified folder
    if (file_put_contents($fileName, $imageData)) {
        // Get the farmer's email from the session
        $farmerEmail = $_SESSION["email"];

        // Insert the image path into the database with the farmer's email
        $sql = "INSERT INTO realtimepicturetbl (farmerEmail, imagepath) VALUES ('$farmerEmail', '$fileName')";
        if ($conn->query($sql) === TRUE) {
            $response = array("success" => true, "message" => "Image saved successfully.");
            echo json_encode($response);
        } else {
            $response = array("success" => false, "message" => "Error saving image to database.");
            echo json_encode($response);
        }
    } else {
        $response = array("success" => false, "message" => "Error saving image.");
        echo json_encode($response);
    }

    // Close the database connection
    $conn->close();
    exit; // Stop further execution
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width" />
    <!-- Required library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.24/webcam.js"></script>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <title>Capture the image with real quality</title>
    <style>
        body {
            background-image: url("");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            font-family: Baskerville, "Palatino Linotype", Palatino, "Century Schoolbook L", "Times New Roman", "serif";
        }
    </style>
	<script> 
$(function(){
  $("#header").load("header.php");
});
</script>
</head>
<body>
    <div id="header"></div>
	
	<br><br><br><br><br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-6" align="center">
                <label>Capture the image with real quality</label>
                <div id="my_camera" class="pre_capture_frame"></div>
                <input type="hidden" name="captured_image_data" id="captured_image_data">
                <br>
                <input type="button" class="btn btn-info btn-round btn-file" value="Take Snapshot" onClick="take_snapshot()">
            </div>
            <div class="col-lg-6" align="center">
                <label>Result</label>
                <div id="results">
                    <img style="width: 350px;" class="after_capture_frame" src="../images/4.png" />
                </div>
                <br>
                <button type="button" class="btn btn-success" onclick="saveSnap()">Send Picture</button>
            </div>
        </div><!--  end row -->
    </div><!-- end container -->
    <br>

    <script language="JavaScript">
        // Configure a few settings and attach camera 250x187
        Webcam.set({
            width: 350,
            height: 287,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('#my_camera');

        function take_snapshot() {
            // take snapshot and get image data
            Webcam.snap(function(data_uri) {
                // display results in page
                document.getElementById('results').innerHTML =
                    '<img class="after_capture_frame" src="'+data_uri+'"/>';
                $("#captured_image_data").val(data_uri);
            });
        }

        function saveSnap() {
            var base64data = $("#captured_image_data").val();
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "capture_image_upload.php",
                data: { image: base64data },
                success: function(data) {
                    alert(data.message);
                },
                error: function(xhr, status, error) {
                    alert("Error: " + xhr.responseText);
                }
            });
        }
    </script>
</body>
</html>
