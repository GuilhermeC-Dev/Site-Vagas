<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VagasDev - Template Visual</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { 
            font-family: 'Inter', sans-serif; 
        }
        .job-card:hover {
            box-shadow: 0 0 0 2px #4f46e5;
            border-color: #4f46e5;
            background-color: #eef2ff;
        }
        .hero-banner {
            position: relative; 
            background-image: url('https://images.unsplash.com/photo-1522252234503-e356532cafd5');
            background-size: cover;
            background-position: center;
            border-radius: 0.5rem; 
            overflow: hidden; 
            padding-top: 4rem;
            padding-bottom: 4rem;
        }
    
        .hero-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(28, 25, 23, 0.6); 
            z-index: 1;
        }
        .hero-banner > * {
            position: relative;
            z-index: 2;
        }
    </style>
</head>
<body class="bg-stone-100 text-stone-800">

    <header class="bg-white shadow-sm sticky top-0 z-20">
        <nav class="container mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
            <a href="#" class="text-2xl font-bold text-indigo-600">VagasDev</a>
        </nav>
    </header>

    <main class="container mx-auto p-4 sm:p-6 lg:px-8">
    
        <section class="hero-banner text-center mb-8">
            <h1 class="text-4xl font-extrabold text-white mb-2">Encontre sua Próxima Oportunidade</h1>
            <p class="text-lg text-stone-300 max-w-2xl mx-auto">O portal de vagas exclusivo para profissionais de tecnologia.</p>
        </section>

        <form class="mb-8 p-6 bg-white rounded-lg shadow">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="md:col-span-2">
                    <label for="keyword" class="block text-sm font-medium text-stone-700 mb-1">Palavra-chave</label>
                    <input type="text" name="keyword" id="keyword" placeholder="Ex: React, Node, PHP" class="w-full px-3 py-2 border border-stone-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label for="location" class="block text-sm font-medium text-stone-700 mb-1">Localização</label>
                    <select name="location" id="location" class="w-full px-3 py-2 border border-stone-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">Todas</option>
                        <option value="Remoto">Remoto</option>
                    </select>
                </div>
                <div>
                    <label for="type" class="block text-sm font-medium text-stone-700 mb-1">Tipo de Contrato</label>
                    <select name="type" id="type" class="w-full px-3 py-2 border border-stone-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">Todos</option>
                        <option value="CLT">CLT</option>
                    </select>
                </div>
            </div>
            <div class="text-right mt-4">
                <button type="submit" class="bg-indigo-600 text-white font-bold px-8 py-2 rounded-md hover:bg-indigo-700 transition-colors">Filtrar Vagas</button>
            </div>
        </form>

        <section class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1">
                <h3 class="text-xl font-bold mb-4">Vagas Encontradas (3)</h3>
                <div class="space-y-4 max-h-[65vh] overflow-y-auto pr-2">
                    
                    <a href="#" class="job-card block bg-white p-4 rounded-lg border border-stone-200 hover:border-indigo-500 transition-all duration-200">
                        <h4 class="font-bold text-lg text-stone-800">Desenvolvedor Frontend Pleno</h4>
                        <p class="text-stone-600 text-sm">InovaTech Solutions</p>
                    </a>

                    <a href="#" class="job-card block bg-white p-4 rounded-lg border border-stone-200 hover:border-indigo-500 transition-all duration-200">
                        <h4 class="font-bold text-lg text-stone-800">Desenvolvedor Backend Sênior</h4>
                        <p class="text-stone-600 text-sm">Future Systems</p>
                    </a>

                    <a href="#" class="job-card block bg-white p-4 rounded-lg border border-stone-200 hover:border-indigo-500 transition-all duration-200">
                        <h4 class="font-bold text-lg text-stone-800">Engenheiro de Software (PHP)</h4>
                        <p class="text-stone-600 text-sm">Legacy Code Inc.</p>
                    </a>
                </div>
            </div>
            
            <div class="lg:col-span-2">
                <div class="bg-white p-6 rounded-lg shadow sticky top-24 min-h-[400px] flex items-center justify-center">
                   <div class="text-center text-stone-500">
                       <h3 class="text-xl font-semibold mb-2">Nenhuma vaga selecionada</h3>
                       <p>Clique em uma vaga na lista ao lado para ver os detalhes.</p>
                   </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-stone-800 text-white mt-16">
        <div class="container mx-auto py-6 px-4 text-center">
            <p>&copy; 2025 VagasDev. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>
</html>

