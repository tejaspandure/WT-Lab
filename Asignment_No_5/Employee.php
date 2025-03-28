<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript">
        function validateForm(event){

        var clickedButton = event.submitter.value;

        if(clickedButton === "DISPLAY" || clickedButton === "DELETE" || clickedButton === "UPDATE")
        {
            return true;
        }
        
        {
            if (document.f1.t1.value==""){
            alert("id required");
            return false;
            }

            if (document.f1.t2.value==""){
            alert("name required");
            return false;
            }

            if (document.f1.t3.value==""){
            alert("email required");
            return false;
            }

            if (document.f1.t4.value==""){
            alert("mobile No required");
            return false;
            }

            if (document.f1.t5.value==""){
            alert("address required");
            return false;
            }
            
        }
    }
    </script>
</head>
<body>
    <form method="POST" name="f1" onsubmit="return validateForm(event);">
        <table>
        <tr>
            <td>Empolyee ID:</td><td><input type="text" name="t1" value=""></td>
        </tr>
        <tr>
            <td>Empolyee Name:</td><td><input type="text" name="t2" value=""></td>
        </tr>
        <tr>
            <td>Empolyee Email:</td><td><input type="email" name="t3" value=""></td>
        </tr>
        <tr>
            <td>Empolyee Mobile No:</td><td><input type="text" name="t4" value=""></td>
        </tr>
        <tr>
            <td>Empolyee Address</td><td><input type="text" name="t5" value=""></td>
        </tr>
        </table>
        <input type="submit" name="b1" value="ADD">
        <input type="submit" name="b2" value="UPDATE">
        <input type="submit" name="b3" value="DELETE">
        <input type="submit" name="b4" value="DISPLAY">
    </form>    
</body>

<?php
         if (isset($_POST['b1'])) {
            $employee_id = $_POST['t1'];
            $name = $_POST['t2'];
            $email = $_POST['t3'];
            $mobile = $_POST['t4'];
            $address = $_POST['t5'];


             $con = mysqli_connect("localhost", "root", "", "employee_DB");
             $sql = "INSERT INTO employee VALUES ('$employee_id', '$name', '$email', '$mobile', '$address')";
             
             if (mysqli_query($con, $sql)) {
                 echo "Inserted Successfully";
             } else {
                 echo "Error: " . mysqli_error($con);
             }
             mysqli_close($con);
         }

        if (isset($_POST['b2']))
        {
            Header('Location:update.html');
        }

        if (isset($_POST['b3']))
        {
            Header('Location:delete.html');
        }

        if (isset($_POST['b4'])) {
            $con = mysqli_connect("localhost", "root", "", "employee_DB");
            $sql = "SELECT * FROM employee";
            $result = mysqli_query($con, $sql);
    
            if (mysqli_num_rows($result) > 0) {
                echo "<h2>Empolyee Records</h2>";
                echo "<table border='1'>
                        <tr>
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                        </tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['mobille']}</td>
                            <td>{$row['address']}</td>
                        </tr>";
                }
                echo "</table>";
            } else {
                echo "No records found";
            }
        }

?>
</html>