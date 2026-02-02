<?php

include_once "db.php";

$sql = "SELECT * FROM telefones";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Telefônica PHP</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen bg-gray-100 p-6">

    <!-- Container -->
    <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-lg p-6">

        <!-- Cabeçalho -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">
                📞 Lista Telefônica
            </h1>

            <a
                href="create.php"
                class="bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700 transition"
            >
                + Novo Telefone
            </a>
        </div>

        <!-- Tabela -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 text-sm uppercase">
                        <th class="px-4 py-3 text-left rounded-tl-xl">ID</th>
                        <th class="px-4 py-3 text-left">Nome</th>
                        <th class="px-4 py-3 text-left">Telefone</th>
                        <th class="px-4 py-3 text-center rounded-tr-xl">Ações</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3"><?= $row['id'] ?></td>
                            <td class="px-4 py-3 font-medium text-gray-800"><?= $row['nome'] ?></td>
                            <td class="px-4 py-3 text-gray-600"><?= $row['telefone'] ?></td>
                            <td class="px-4 py-3 text-center space-x-2">
                                <a
                                    href="edit.php?id=<?= $row['id'] ?>"
                                    class="inline-block bg-yellow-400 text-white px-3 py-1 rounded-lg hover:bg-yellow-500 transition"
                                >
                                    Editar
                                </a>

                                <a
                                    href="delete.php?id=<?= $row['id'] ?>"
                                    onclick="return confirm('Tem certeza que deseja excluir?')"
                                    class="inline-block bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition"
                                >
                                    Excluir
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>
