<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $license_plate = $_POST["license_plate"];
    $gender = $_POST["gender"];

    // Insere os dados no banco de dados
    $query = "INSERT INTO cadastro (first_name, last_name, cpf, email, password, phone, address, license_plate, gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("sssssssss", $first_name, $last_name, $cpf, $email, $password, $phone, $address, $license_plate, $gender);
    
    if ($stmt->execute()) {
        echo "cadastro realizado com sucesso";
        // Redireciona para a página de entrada após 2 segundos
        header("refresh:2;url=entrar.html");
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>
