<?php 
$required = 1;
require("database.php");
$sql = "UPDATE plan set state = 0 WHERE planid=2";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
$sql = "DELETE FROM plan_content WHERE planid=2";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>