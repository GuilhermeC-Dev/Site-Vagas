<?php
include 'conexao.php';

$vaga_selecionada = null;
$vagas = [];
$total_vagas = 0;

$sql_base = "SELECT * FROM vagas";
$sql_where = [];
$params = [];
$types = "";

if (!empty($_GET['keyword'])) {
    $keyword = '%' . $_GET['keyword'] . '%';
    $sql_where[] = "(titulo LIKE ? OR empresa LIKE ? OR descricao LIKE ? OR tags LIKE ?)";
    array_push($params, $keyword, $keyword, $keyword, $keyword);
    $types .= "ssss";
}

if (!empty($_GET['localizacao'])) {
    $sql_where[] = "localizacao = ?";
    $params[] = $_GET['localizacao'];
    $types .= "s";
}

if (!empty($_GET['tipo'])) {
    $sql_where[] = "tipo = ?";
    $params[] = $_GET['tipo'];
    $types .= "s";
}

$sql_busca = $sql_base;
if (!empty($sql_where)) {
    $sql_busca .= " WHERE " . implode(" AND ", $sql_where);
}
$sql_busca .= " ORDER BY id DESC";

$stmt_busca = $conn->prepare($sql_busca);
if (!empty($params)) {
    $stmt_busca->bind_param($types, ...$params);
}
$stmt_busca->execute();
$resultado_busca = $stmt_busca->get_result();
$vagas = $resultado_busca->fetch_all(MYSQLI_ASSOC);
$total_vagas = count($vagas);
$stmt_busca->close();


if (isset($_GET['id'])) {
    $id_vaga = intval($_GET['id']);
    
    $sql_vaga_unica = "SELECT * FROM vagas WHERE id = ?";
    $stmt_vaga_unica = $conn->prepare($sql_vaga_unica);
    $stmt_vaga_unica->bind_param("i", $id_vaga);
    $stmt_vaga_unica->execute();
    
    $resultado_vaga = $stmt_vaga_unica->get_result();
    
    if ($resultado_vaga->num_rows > 0) {
        $vaga_selecionada = $resultado_vaga->fetch_assoc();
    }
    $stmt_vaga_unica->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VagasDev - Encontre sua vaga!</title>
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
        .job-card.active {
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
        .job-details ul {
            list-style-type: disc;
            padding-left: 20px;
            margin-top: 8px;
        }
        .job-details li {
            margin-bottom: 4px;
        }
    </style>
</head>
<body class="bg-stone-100 text-stone-800">

    <header class="bg-white shadow-sm sticky top-0 z-20">
        <nav class="container mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
            <a href="index.php" class="text-2xl font-bold text-indigo-600">VagasDev</a>
            <!-- O botão "Cadastrar Vaga" foi removido daqui -->
        </nav>
    </header>

    <main class="container mx-auto p-4 sm:p-6 lg:px-8">
    
        <section class="hero-banner text-center mb-8">
            <h1 class="text-4xl font-extrabold text-white mb-2">Encontre sua Próxima Oportunidade</h1>
            <p class="text-lg text-stone-300 max-w-2xl mx-auto">O portal de vagas exclusivo para profissionais de tecnologia.</p>
        </section>

        <form action="index.php" method="GET" class="mb-8 p-6 bg-white rounded-lg shadow">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="md:col-span-2">
                    <label for="keyword" class="block text-sm font-medium text-stone-700 mb-1">Palavra-chave</label>
                    <input type="text" name="keyword" id="keyword" placeholder="Ex: React, Node, PHP" class="w-full px-3 py-2 border border-stone-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" value="<?php echo htmlspecialchars($_GET['keyword'] ?? ''); ?>">
                </div>
                <div>
                    <label for="localizacao" class="block text-sm font-medium text-stone-700 mb-1">Localização</label>
                    <input type="text" name="localizacao" id="localizacao" placeholder="Ex: Remoto" class="w-full px-3 py-2 border border-stone-300 rounded-md" value="<?php echo htmlspecialchars($_GET['localizacao'] ?? ''); ?>">
                </div>
                <div>
                    <label for="tipo" class="block text-sm font-medium text-stone-700 mb-1">Tipo de Contrato</label>
                    <input type="text" name="tipo" id="tipo" placeholder="Ex: CLT" class="w-full px-3 py-2 border border-stone-300 rounded-md" value="<?php echo htmlspecialchars($_GET['tipo'] ?? ''); ?>">
                </div>
            </div>
            <div class="text-right mt-4">
                <a href="index.php" class="text-sm text-stone-600 hover:text-indigo-500 mr-4">Limpar filtros</a>
                <button type="submit" class="bg-indigo-600 text-white font-bold px-8 py-2 rounded-md hover:bg-indigo-700 transition-colors">Filtrar Vagas</button>
            </div>
        </form>

        <section class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1">
                <h3 class="text-xl font-bold mb-4">Vagas Encontradas (<?php echo $total_vagas; ?>)</h3>
                <div class="space-y-4 max-h-[65vh] overflow-y-auto pr-2">
                    
                    <?php if (empty($vagas)): ?>
                        <p class="text-stone-600">Nenhuma vaga encontrada com os filtros atuais.</p>
                    <?php else: ?>
                        <?php foreach ($vagas as $vaga): ?>
                            <?php
                                $is_active = ($vaga_selecionada && $vaga_selecionada['id'] == $vaga['id']);
                                $active_class = $is_active ? 'active' : '';

                                $query_params = $_GET;
                                $query_params['id'] = $vaga['id'];
                                $link_href = 'index.php?' . http_build_query($query_params);
                            ?>
                            <a href="<?php echo $link_href; ?>" class="job-card <?php echo $active_class; ?> block bg-white p-4 rounded-lg border border-stone-200 transition-all duration-200">
                                <h4 class="font-bold text-lg text-stone-800"><?php echo htmlspecialchars($vaga['titulo']); ?></h4>
                                <p class="text-stone-600 text-sm"><?php echo htmlspecialchars($vaga['empresa']); ?></p>
                                <div class="text-xs text-stone-500 mt-2 flex gap-2">
                                    <span class="bg-stone-200 px-2 py-0.5 rounded-full"><?php echo htmlspecialchars($vaga['localizacao']); ?></span>
                                    <span class="bg-stone-200 px-2 py-0.5 rounded-full"><?php echo htmlspecialchars($vaga['tipo']); ?></span>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            </div>
            
            <div class="lg:col-span-2">
                <div class="job-details bg-white p-6 rounded-lg shadow sticky top-24 min-h-[400px]">
                   
                   <?php if ($vaga_selecionada): ?>
                        <h2 class="text-2xl font-bold text-stone-900 mb-2"><?php echo htmlspecialchars($vaga_selecionada['titulo']); ?></h2>
                        <p class="text-lg font-medium text-indigo-600 mb-4"><?php echo htmlspecialchars($vaga_selecionada['empresa']); ?></p>
                        
                        <div class="flex gap-4 text-sm text-stone-700 mb-6">
                            <span><strong class="font-semibold">Local:</strong> <?php echo htmlspecialchars($vaga_selecionada['localizacao']); ?></span>
                            <span><strong class="font-semibold">Contrato:</strong> <?php echo htmlspecialchars($vaga_selecionada['tipo']); ?></span>
                        </div>
                        
                        <h4 class="text-lg font-semibold text-stone-800 mb-2">Descrição da Vaga</h4>
                        <p class="text-stone-700 mb-4 whitespace-pre-line"><?php echo nl2br(htmlspecialchars($vaga_selecionada['descricao'])); ?></p>
                        
                        <h4 class="text-lg font-semibold text-stone-800 mb-2">Requisitos</h4>
                        <ul class="text-stone-700 mb-4 whitespace-pre-line">
                            <?php 
                                $requisitos = explode("\n", $vaga_selecionada['requisitos']);
                                foreach ($requisitos as $req) {
                                    if (!empty(trim($req))) {
                                        echo '<li>' . htmlspecialchars(trim($req)) . '</li>';
                                    }
                                }
                            ?>
                        </ul>

                        <?php if (!empty($vaga_selecionada['tags'])): ?>
                            <h4 class="text-lg font-semibold text-stone-800 mb-2">Tags</h4>
                            <div class="flex flex-wrap gap-2">
                                <?php 
                                    $tags = explode(",", $vaga_selecionada['tags']);
                                    foreach ($tags as $tag) {
                                        if (!empty(trim($tag))) {
                                            echo '<span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-3 py-1 rounded-full">' . htmlspecialchars(trim($tag)) . '</span>';
                                        }
                                    }
                                ?>
                            </div>
                        <?php endif; ?>

                   <?php else: ?>
                       <div class="text-center text-stone-500 flex flex-col items-center justify-center h-full min-h-[400px]">
                           <h3 class="text-xl font-semibold mb-2">Nenhuma vaga selecionada</h3>
                           <p>Clique em uma vaga na lista ao lado para ver os detalhes.</p>
                       </div>
                   <?php endif; ?>

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


