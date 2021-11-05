<?php if(isset($_POST['initdb'])){
    $username = $_SESSION['username'];
    $stm = "CREATE TABLE $username LIKE users";
    $sql = mysqli_query($conn, $stm);
    if (!$sql) {echo "failure";}
    else {echo "success";}
}
?>