<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ename = $_POST['ename'];
    $desig = $_POST['desig'];
    $dept = $_POST['dept'];
    $doj = $_POST['doj'];
    $salary = $_POST['salary'];

    // Validate that all fields are filled
    if (empty($ename) || empty($desig) || empty($dept) || empty($doj) || empty($salary)) {
        echo "All fields are required.";
    } else {
        $stmt = $conn->prepare("INSERT INTO EMPDETAILS (ENAME, DESIG, DEPT, DOJ, SALARY) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssd", $ename, $desig, $dept, $doj, $salary);

        if ($stmt->execute()) {
            echo "Employee information successfully added.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!-- HTML Form for inserting employee information -->
<!DOCTYPE html>
<html>
<body>
    <h1>Insert Employee Information</h1>
    <form method="POST" action="insert_employee.php">
        Name: <input type="text" name="ename" required><br>
        Designation: <input type="text" name="desig" required><br>
        Department: <input type="text" name="dept" required><br>
        Date of Joining (YYYY-MM-DD): <input type="date" name="doj" required><br>
        Salary: <input type="number" step="0.01" name="salary" required><br>
        <input type="submit" value="Add Employee">
    </form>
</body>
</html>
