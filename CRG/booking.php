<?php
$conn = new mysqli("localhost", "root", "", "ajetdb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$required_fields = ['first_name', 'last_name', 'email', 'phone', 'departure_location', 'destination', 'date', 'time', 'jet_category', 'jet_model', 'passengers'];

foreach ($required_fields as $field) {
    if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
        die("Please fill in all required fields.");
    }
}

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$departure_location = $_POST['departure_location'];
$destination = $_POST['destination'];
$date = $_POST['date'];
$time = $_POST['time'];
$jet_category = $_POST['jet_category'];
$jet_model = $_POST['jet_model'];
$passengers = $_POST['passengers'];

$stmt = $conn->prepare("INSERT INTO bookings (first_name, last_name, email, phone, departure_location, destination, date, time, jet_category, jet_model, passengers) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssi", $first_name, $last_name, $email, $phone, $departure_location, $destination, $date, $time, $jet_category, $jet_model, $passengers);

if ($stmt->execute()) {
    echo "Booking successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
