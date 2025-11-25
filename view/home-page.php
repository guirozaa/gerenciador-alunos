<?php
require "../sgc/verifica.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StuManager - Gestão de Estudantes</title>

    <link href__="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../styles/style-primePage.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body>
    <div class="bg-decoration bg-decoration-1"></div>
    <div class="bg-decoration bg-decoration-2"></div>

    <div class="container">
        <main class="main-content">
            <div class="content-wrapper">
                <div class="logo-section">
                    <h1>StuManager</h1>
                    <p class="subtitle">Gestão Inteligente de Estudantes</p>
                </div>

                <div class="buttons-container">
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
                </div>


            </div>
        </main>
        <footer>
            <p>© 2025 StuManager - Todos os direitos reservados</p>
        </footer>
    </div>

</body>

</html>