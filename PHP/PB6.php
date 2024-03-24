<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "bca";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
// Function to add customer information
if (isset($_POST['add_customer'])) {
$customer_id = $_POST['customer_id'];
$customer_name = $_POST['customer_name'];
$item_purchased = $_POST['item_purchased'];
$mobile_number = $_POST['mobile_number'];
// Validate mobile number
if (strlen($mobile_number) != 10 || !ctype_digit($mobile_number)) {
echo "Invalid mobile number";
} else {
$sql = "INSERT INTO customer (custid, cname, itemname, mobileno) VALUES
('$customer_id', '$customer_name', '$item_purchased', '$mobile_number')";
if ($conn->query($sql) === TRUE) {
echo "Customer added successfully"."<br>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
}
}
/// Function to delete customer record
if (isset($_POST['delete_customer'])) {
$customer_id = $_POST['customer_id'];
$sql = "DELETE FROM customer WHERE custid='$customer_id'";
if ($conn->query($sql) === TRUE) {
if ($conn->affected_rows > 0) {
echo "Customer deleted successfully";
} else {
echo "Error: Customer with ID " . $customer_id . " not found";
}
} else {
echo "Error deleting customer: " . $conn->error;
}
}
// Function to search for particular entries
if (isset($_POST['search_customer'])) {
$customer_id = $_POST['customer_id'];
$sql = "SELECT * FROM customer WHERE custid='$customer_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
echo "Customer ID: " . $row['custid'] . ", Name: " . $row['cname'] . ", Item Purchased:
" . $row['itemname'] . ", Mobile Number: " . $row['mobileno'] . "<br>";
}
} else {
echo "No results found";
}
}
// Function to display all records
if (isset($_POST['display_all'])) {
$sql = "SELECT * FROM customer";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
echo "Customer ID: " . $row['custid'] . ", Name: " . $row['cname'] . ", Item Purchased:
" . $row['itemname'] . ", Mobile Number: " . $row['mobileno'] . "<br>";
}
} else {
echo "No results found";
}
}
// Function to sort database based on customer id and display all records
if (isset($_POST['sort_and_display'])) {
$sql = "SELECT * FROM customer ORDER BY cname";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
echo "Customer ID: " . $row['custid'] . ", Name: " . $row['cname'] . ", Item Purchased:
" . $row['itemname'] . ", Mobile Number: " . $row['mobileno'] . "<br>";
}
} else {
echo "No results found";
}
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
<title>Customer Management System</title>
</head>
<body>
<button onclick="document.getElementById('addForm').style.display = 'block'">Add
Customer Information</button>
<button onclick="document.getElementById('deleteForm').style.display = 'block'">Delete
Customer Records</button>
<button onclick="document.getElementById('searchForm').style.display = 'block'">Search
for Particular Entries</button>
<form id="sortForm" method="post" style="display: inline;">
<input type="hidden" name="sort_and_display" value="true">
<input type="submit" value="Sort Database and Display All Records">
</form>
<form id="displayForm" method="post" style="display: inline;">
<input type="hidden" name="display_all" value="true">
<input type="submit" value="Display All Records">
</form>
<div id="addForm" style="display: none;">
<form method="post">
Customer ID: <input type="text" name="customer_id" required><br>
Customer Name: <input type="text" name="customer_name" required><br>
Item Purchased: <input type="text" name="item_purchased" required><br>
Mobile Number: <input type="text" name="mobile_number" required><br>
<input type="submit" name="add_customer" value="Add Customer">
</form>
</div>
<div id="deleteForm" style="display: none;">
<form method="post">
Customer ID: <input type="text" name="customer_id" required><br>
<input type="submit" name="delete_customer" value="Delete Customer">
</form>
</div>
<div id="searchForm" style="display: none;">
<form method="post">
Customer ID: <input type="text" name="customer_id" required><br>
<input type="submit" name="search_customer" value="Search Customer">
</form>
</div>
</body>
</html>
