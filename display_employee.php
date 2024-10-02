<?php
include 'db_connection.php';

$sql = "SELECT * FROM EMPDETAILS";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Employee Details</h1>";
    echo "<table border='1'>
            <tr>
                <th>EMPID</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Department</th>
                <th>Date of Joining</th>
                <th>Salary</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["EMPID"] . "</td>
                <td>" . $row["ENAME"] . "</td>
                <td>" . $row["DESIG"] . "</td>
                <td>" . $row["DEPT"] . "</td>
                <td>" . $row["DOJ"] . "</td>
                <td>" . $row["SALARY"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No employee information found.";
}

$conn->close();
?>
