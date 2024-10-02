<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empid = $_POST['empid'];
    $ename = $_POST['ename'];
    $desig = $_POST['desig'];
    $dept = $_POST['dept'];
    $doj = $_POST['doj'];
    $salary = $_POST['salary'];

    if (empty($empid) || empty($ename) || empty($desig) || empty($dept) || empty($doj) || empty($salary)) {
        echo "All fields are required.";
    } else {
        $stmt = $conn->prepare("UPDATE EMPDETAILS SET ENAME=?, DESIG=?, DEPT=?, DOJ=?, SALARY=? WHERE EMPID=?");
        $stmt->bind_param("ssssdi", $ename, $desig, $dept, $doj, $salary, $empid);

        if ($stmt->execute()) {
            echo "Employee information successfully updated.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!-- HTML Form for updating employee information -->
<!DOCTYPE html>
<html>
<body>
    <h1>Update Employee Information</h1>
    <form method="POST" action="update_employee.php">
        Employee ID: <input type="number" name="empid" required><br>
        Name: <input type="text" name="ename" required><br>
        Designation: <input type="text" name="desig" required><br>
        Department: <input type="text" name="dept" required><br>
        Date of Joining (YYYY-MM-DD): <input type="date" name="doj" required><br>
        Salary: <input type="number" step="0.01" name="salary" required><br>
        <input type="submit" value="Update Employee">
    </form>
</body>
</html>
