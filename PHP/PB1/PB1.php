<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Information</title>
</head>
<body>
<h2>Student Information</h2>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
echo "<p><strong>First Name:</strong> " . $_POST["firstName"] . "</p>";
echo "<p><strong>Last Name:</strong> " . $_POST["lastName"] . "</p>";
echo "<p><strong>Address:</strong> " . $_POST["address"] . "</p>";
echo "<p><strong>E-Mail:</strong> " . $_POST["email"] . "</p>";
echo "<p><strong>Mobile:</strong> " . $_POST["mobile"] . "</p>";
echo "<p><strong>City:</strong> " . $_POST["city"] . "</p>";
echo "<p><strong>State:</strong> " . $_POST["state"] . "</p>";
echo "<p><strong>Gender:</strong> " . $_POST["gender"] . "</p>";
if (!empty($_POST["hobbies"])) {
echo "<p><strong>Hobbies:</strong> " . implode(", ", $_POST["hobbies"]) . "</p>";
}
echo "<p><strong>Blood Group:</strong> " . $_POST["bloodGroup"] . "</p>";
}
?>
</body>
</html>