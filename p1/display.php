<?php
$connect = new mysqli('localhost', 'root', '', 'Salon');
if ($connect->connect_error) {
    die("Connection Failed: " . $connect->connect_error);
}

$query = "SELECT * FROM beauty";
$result = $connect->query($query);

if ($result->num_rows > 0) {
    echo "<table border='1'>
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Action</th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row['name'] . "</td>
            <td>" . $row['age'] . "</td>
            <td>" . $row['gender'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['phoneno'] . "</td>
            <td>
                <a href='update.php?id=" . $row['srno'] . "'>Update</a>
                <a href='delete.php?id=" . $row['srno'] . "'>Delete</a>
            </td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}
$connect->close();
?>
