<?php
if(isset($_POST['name'], $_POST['age'], $_POST['gender'], $_POST['email'], $_POST['phoneno']))
 {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];

    $connect = new mysqli('localhost', 'root', '', 'Salon');
    if ($connect->connect_error) 
    {
        die("Connection Failed: " . $connect->connect_error);

    } else 

    {
        $insert = $connect->query("INSERT INTO beauty(name, age, gender, email, phoneno) VALUES('$name', '$age', '$gender', '$email', '$phoneno')");

        if ($insert) 
        {
           
            header("Location: display.php");
            exit(); 
        } else {
            echo "Error: " . $connect->error;
        }
    }
    $connect->close();
} else {
    echo "something is missing in submissuion form";
}
?>
