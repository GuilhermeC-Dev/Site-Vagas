<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Nova Vaga</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-stone-100 text-stone-800">

    <header class="bg-white shadow-sm">
        <nav class="container mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
            <a href="index.php" class="text-2xl font-bold text-indigo-600">VagasDev</a>
            <a href="index.php" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Voltar para o site</a>
        </nav>
    </header>

    <main class="container mx-auto p-4 sm:p-6 lg:px-8 max-w-2xl mt-10">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-center text-stone-900 mb-6">Cadastrar Nova Vaga</h1>
            <!-- O formulário agora aponta para o .php e usa o método POST -->
            <form action="add_vagas.php" method="POST" class="space-y-4">
                
                <div>
                    <label for="titulo" class="block text-sm font-medium text-stone-700 mb-1">Título da Vaga</label>
                    <input type="text" name="titulo" id="titulo" required class="w-full px-3 py-2 border border-stone-300 rounded-md">
                </div>
                
                <div>
                    <label for="empresa" class="block text-sm font-medium text-stone-700 mb-1">Nome da Empresa</label>
                    <input type="text" name="empresa" id="empresa" required class="w-full px-3 py-2 border border-stone-300 rounded-md">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="localizacao" class="block text-sm font-medium text-stone-700 mb-1">Localização</label>
                        <input type="text" name="localizacao" id="localizacao" required placeholder="Ex: Remoto" class="w-full px-3 py-2 border border-stone-300 rounded-md">
                    </div>
                    <div>
                        <label for="tipo" class="block text-sm font-medium text-stone-700 mb-1">Tipo de Contrato</label>
                        <input type="text" name="tipo" id="tipo" required placeholder="Ex: CLT, PJ" class="w-full px-3 py-2 border border-stone-300 rounded-md">
                    </div>
                </div>

                <div>
                    <label for="descricao" class="block text-sm font-medium text-stone-700 mb-1">Descrição da Vaga</label>
                    <textarea name="descricao" id="descricao" rows="5" required class="w-full px-3 py-2 border border-stone-300 rounded-md"></textarea>
                </div>

                <div>
                    <label for="requisitos" class="block text-sm font-medium text-stone-700 mb-1">Requisitos (um por linha)</label>
                    <textarea name="requisitos" id="requisitos" rows="5" required class="w-full px-3 py-2 border border-stone-300 rounded-md"></textarea>
                </div>

                <div>
                    <label for="tags" class="block text-sm font-medium text-stone-700 mb-1">Tags (separadas por vírgula)</label>
                    <input type="text" name="tags" id="tags" placeholder="Ex: React,PHP,Node.js" class="w-full px-3 py-2 border border-stone-300 rounded-md">
                </div>
                
                <button type="submit" class="w-full bg-indigo-600 text-white font-bold px-8 py-3 rounded-md hover:bg-indigo-700 transition-colors">Cadastrar Vaga</button>
            </form>
        </div>
    </main>

</body>
</html>
