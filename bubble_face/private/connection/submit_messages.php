<!--private/connection/submit_messages.php-->
<?php
include("connection.php");
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $sender = $_POST['sender'];
    $receiver = $_POST['receiver'];
    $message = $_POST['message'];

    // Usando Prepared Statement para evitar erros de aspas e SQL Injection

    $query = "INSERT INTO lim_messages (sender, receiver, message) VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($con, $query);

    if($stmt){
        mysqli_stmt_bind_param($stmt, "sss", $sender, $receiver, $message);
        mysqli_stmt_execute($stmt);
        echo "Sucesso";
    } else {
        echo "Erro no banco: " . $stmt->error;
    }
    
    $stmt->close();
    $con->close();
}
?>
