<?php

require_once 'conexao.php'; // Include the database connection

// Recieve the data from the POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $turma = $_POST['turma'];
    $moeda = $_POST['moeda_sugerida'];
    
    // Validate the inputs
    if (empty($nome) || empty($turma) || empty($moeda)) {
        die("Todos os campos são obrigatórios.");
    }

    // Upload image / logo

    $logo = $_FILES['logo']['name'];
    $logo_tmp = $_FILES['logo']['tmp_name'];
    $caminho_logo = 'uploads/' . $logo;

    $move_uploaded_file($logo_tmp, $caminho_logo);

    // Check if the logo file is uploaded
    if (!isset($_FILES['logo']) || $_FILES['logo']['error'] !== UPLOAD_ERR_OK) {
        die("Erro ao enviar o arquivo de logo.");
    }

    // Generate a unique username and password
    $username = strtolower(substr($nome, 0, 4)) . rand(1000, 9999);
    $password = substr(md5(time()), 0, 8); // Generate a random password

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO alunos (nome, turma, moeda_sugerida, logo_url, email, senha_hash)
    VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $nome, $turma, $moeda, $caminho_logo, $username, $password);

    // The PDO connection will be closed automatically when the script ends

    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso! Acesse seus dados posteriormente com login: $login e senha: $senha";
        echo "<p>Seu login é: <strong>$username</strong> e sua senha é: <strong>$password</strong></p>";
        echo "⚠️ Leve esses dados até a coordenação para ativar seu acesso.</p>";
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    
    }
?>
