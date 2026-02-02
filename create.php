<?php

include_once "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];

    $sql = "INSERT INTO telefones (nome, telefone) VALUES ('$nome', '$telefone')";
    if($conn->query($sql) === TRUE){
        header("Location: index.php");
        exit;
    }else{
        echo "Erro: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Telefone</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-6">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">
            Adicionar Novo Telefone
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
                    required
                    class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Digite o nome"
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
                    required
                    class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="(00) 00000-0000"
                >
            </div>

            <!-- Botão -->
            <button
                type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-2 rounded-xl hover:bg-blue-700 transition duration-200"
            >
                Salvar
            </button>
        </form>
    </div>

</body>
</html>
