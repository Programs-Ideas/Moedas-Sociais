<?php

// 1. Conexão com o banco de dados
require_once 'conexao.php';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// 1.1  Criando variáveis 
//turma = 4 caracteres matricula = 202328771060881 (15 caracteres)

$nome = "";
$turma = 0;
$matricula = 0; 

// 2. Recebe os dados do formulário
$nome = trim($_POST['nome'] ?? '');
$turma = trim($_POST['turma'] ?? '');
$matricula = trim($_POST['matricula'] ?? '');
$moeda_sugerida = trim($_POST['sugestao'] ?? '');

// 3. Validação básica
if (empty($nome) || empty($turma) || empty($moeda_sugerida)) {
    die("Por favor, preencha todos os campos obrigatórios.");
}

//if ($nome >)

// 4. Geração de login/senha automáticos
$user_login = strtolower(str_replace(' ', '', $nome)) . rand(100, 999);
$senha_gerada = substr(md5(time()), 0, 8); // senha randômica de 8 caracteres
$senha_hash = password_hash($senha_gerada, PASSWORD_DEFAULT); // hash seguro

// 5. Upload do logo
$logo_nome = '';

if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
    $ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
    $logo_nome = uniqid('logo_') . '.' . $ext;
    $destino = 'uploads/' . $logo_nome;

    if (!move_uploaded_file($_FILES['logo']['tmp_name'], $destino)) {
        die("Erro ao salvar o logo.");
    }
}

// 6. Inserção no banco
$sql = "INSERT INTO alunos_moedas_sociais (nome, turma, moeda_sugerida, logo, user_login, senha) 
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $nome, $turma, $moeda_sugerida, $logo_nome, $user_login, $senha_hash);

if ($stmt->execute()) {
    echo "<h2>Cadastro realizado com sucesso!</h2><br />";
    echo "⚠️ Leve esses dados até a coordenação para ativar seu acesso.</p> <br />";
    echo "<p>Seu login é: <strong>$username</strong> e sua senha é: <strong>$password</strong></p> <br />";
    echo "<p><strong>Login:</strong> $login</p> <br />";
    echo "<p><strong>Senha:</strong> $senha_gerada</p> <br />";
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>
