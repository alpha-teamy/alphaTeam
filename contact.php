<?php
 $servername = "if0_38176358";
$username = "sql306.infinityfree.com";
$password = "AI8RGHkXjWN7M ";  
$dbname = "if0_38176358_XXX";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

     $conn = new mysqli($servername, $username, $password, $dbname);

     if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

     $sql = "INSERT INTO message (full_name, email, subject, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssss", $full_name, $email, $subject, $message);

        if ($stmt->execute()) {
            echo "Message sent successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    $conn->close();
}
?>
