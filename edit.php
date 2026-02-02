<?php

include_once "db.php";

$id = $_GET['id'];
$sql = "SELECT * FROM telefones WHERE id = $id";
$result = $conn->query($sql);
$telefone = $result->fetch_assoc();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];

    $sql = "UPDATE telefones SET nome='$nome', telefone='$telefone' WHERE id = $id";
    if($conn->query($sql) === TRUE){
        header("Location: index.php");
        exit;
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Telefone</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center">

    <!-- Card -->
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-6">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">
            ✏️ Editar Telefone
        </h1>

        <form method="POST" class="space-y-4">
            <!-- Nome -->
            <div>
                <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">
                    Nome
                </label>
                <input
                    type="text"
                    id="nome"
                    name="nome"
                    value="<?= htmlspecialchars($telefone['nome']) ?>"
                    required
                    class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                >
            </div>

            <!-- Telefone -->
            <div>
                <label for="telefone" class="block text-sm font-medium text-gray-700 mb-1">
                    Telefone
                </label>
                <input
                    type="tel"
                    id="telefone"
                    name="telefone"
                    value="<?= htmlspecialchars($telefone['telefone']) ?>"
                    required
                    class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                >
            </div>

            <!-- Botões -->
            <div class="flex items-center justify-between pt-4">
                <a
                    href="index.php"
                    class="text-gray-600 hover:text-gray-800 transition"
                >
                    ← Voltar
                </a>

                <button
                    type="submit"
                    class="bg-blue-600 text-white font-semibold px-6 py-2 rounded-xl hover:bg-blue-700 transition"
                >
                    Salvar Alterações
                </button>
            </div>
        </form>
    </div>

</body>
</html>
