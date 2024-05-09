<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $connect = new mysqli('localhost', 'root', '', 'Salon');
    if ($connect->connect_error) {
        die("Connection Failed: " . $connect->connect_error);
    } else {
        $delete = $connect->query("DELETE FROM beauty WHERE srno='$id'");
        if ($delete) {
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting record: " . $connect->error;
        }
    }
    $connect->close();
} else {
    echo "ID not provided.";
}
?>
