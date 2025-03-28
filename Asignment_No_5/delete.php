<?php
    $employee_id=$_POST['t1'];
    $con=mysqli_connect("localhost","root","","employee_db");
    $sql="delete from employee where id='$employee_id'";

    if(mysqli_query($con,$sql))
    {
        echo"Data deleted successfully"; 
    }
    
    echo"<form action='Employee.php'>";
    echo"<input type='submit' type='b1' value='Back' />";
    echo"</form>";

    
?>