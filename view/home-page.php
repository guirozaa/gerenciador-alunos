<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.html");
    die;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StuManager - Gestão de Estudantes</title>

    <!-- Google Fonts -->
    <link href__="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../styles/style-primePage.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body>
    <!-- Elementos decorativos de fundo -->
    <div class="bg-decoration bg-decoration-1"></div>
    <div class="bg-decoration bg-decoration-2"></div>

    <!-- Container principal -->
    <div class="container">
        <!-- Conteúdo principal -->
        <main class="main-content">
            <div class="content-wrapper">
                <!-- Logo e título -->
                <div class="logo-section">
                    <h1>StuManager</h1>
                    <p class="subtitle">Gestão Inteligente de Estudantes</p>
                </div>

                <!-- Botões principais -->
                <div class="buttons-container">
                    <!-- Botão Ver Estudantes -->
                    <a href="./listar-page.php" class="link-form">
                        <button class="btn btn-view">
                            <div class="btn-icon">
                                <i class="ph ph-eye"></i>
                            </div>
                            <span class="btn-text">Ver Estudantes</span>
                        </button>
                    </a>
                    <a href="./form.php" class="link-form">
                        <button class="btn btn-add">
                            <div class="btn-icon">
                                <i class="ph ph-user-plus"></i>
                            </div>
                            <span class="btn-text">Adicionar Estudante</span>
                        </button>

                    </a>
                    <!-- Botão Adicionar Estudante -->

                </div>

                <!-- Features -->
                <div class="features">
                    <div class="feature-card">
                        <div class="feature-icon">⚡</div>
                        <h3 class="feature-title">Rápido</h3>
                        <p class="feature-description">Acesse informações instantaneamente</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">🔒</div>
                        <h3 class="feature-title">Seguro</h3>
                        <p class="feature-description">Seus dados protegidos sempre</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">📊</div>
                        <h3 class="feature-title">Intuitivo</h3>
                        <p class="feature-description">Interface simples e poderosa</p>
                    </div>
                </div>
            </div>
        </main>

        <!-- Rodapé -->
        <footer>
            <p>© 2025 StuManager - Todos os direitos reservados</p>
        </footer>
    </div>

</body>

</html>