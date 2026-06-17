<?php
$host = 'ilan-database1.cx248m4we6k7.us-east-1.rds.amazonaws.com';
$user = 'admin';
$password = '***';
$dbname = 'new_schema';

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");

$sql = "SELECT id, email, pass, date_add FROM breached";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

echo "<h1>Breached</h1>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Email</th><th>Password</th><th>Date Added</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>" . htmlspecialchars($row['email']) . "</td>
        <td>" . htmlspecialchars($row['pass']) . "</td>
        <td>{$row['date_add']}</td>
    </tr>";
}

echo "</table>";

mysqli_close($conn);
?>
