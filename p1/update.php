<?php
if(isset($_GET['id']))
 {
    $id = $_GET['id'];
    
    
    if(isset($_POST['submit'])) 
    {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phoneno = $_POST['phoneno'];

        $connect = new mysqli('localhost', 'root', '', 'Salon');
        if ($connect->connect_error) {
            die("Connection Failed: " . $connect->connect_error);
        }
         else 
        {
            $update = $connect->query("UPDATE beauty SET name='$name', age='$age', gender='$gender', email='$email', phoneno='$phoneno' WHERE srno='$id'");

            if ($update) 
            
       {
                echo "Record updated successfully.";
            } 
        
            else 
       {
                echo "Error updating record: " . $connect->error;
            }
        }

        $connect->close();
      
    } 
    else {
       
        $connect = new mysqli('localhost', 'root', '', 'Salon');
        if ($connect->connect_error) {
            die("Connection Failed: " . $connect->connect_error);
        } else {
            $query = $connect->query("SELECT * FROM beauty WHERE srno='$id'");
            $row = $query->fetch_assoc();
?>
            <form method="post">
                Name: <input type="text" name="name" value="<?php echo $row['name']; ?>">
                <br>
                <br>
                Age: <input type="number" name="age" value="<?php echo $row['age']; ?>">
                <br>
                <br>
                Gender: <select name="gender">
                <option value="female" <?php if($row['gender'] == 'female') echo 'selected'; ?>>Female</option>
                <option value="male" <?php if($row['gender'] == 'male') echo 'selected'; ?>>Male</option>
                    </select>
                    <br>
                    <br>
                Email: <input type="email" name="email" value="<?php echo $row['email']; ?>">
                <br>
                <br>
                Contact: <input type="tel" name="phoneno" pattern="[0-9]{10}" value="<?php echo $row['phoneno']; ?>">
                <br>
                <br>
                <input type="submit" name="submit" value="Update">
            </form>
<?php
        }
        $connect->close();
    }
} else {
    echo "ID not provided.";
}
?>
