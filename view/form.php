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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ficha de Matrícula Escolar</title>
    <link rel="stylesheet" href="../styles/style-primePage.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800;900&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Decoração de fundo -->
    <div class="bg-decoration bg-decoration-1"></div>
    <div class="bg-decoration bg-decoration-2"></div>

    <div class="container">
        <main class="main-content">
            <div class="content-wrapper">
                <section class="logo-section">
                    <a href="./home-page.php" class="link-back-form">
                        <button class="link-back btn btn-add">
                            <span class="btn-text">Voltar</span>
                        </button>
                    </a>
                    <h1>Matrícula Escolar</h1>
                    <p class="subtitle">Ficha de Inscrição do Aluno</p>
                </section>

                <form action="../scripts/index.php" method="POST" enctype="multipart/form-data" class="formulario">
                    <!-- DADOS DO ALUNO -->
                    <fieldset>
                        <legend>Dados do Aluno</legend>

                        <div class="form-grid">
                            <label>Ano Letivo:</label>
                            <input type="text" name="ano_letivo" required>

                            <label>Nº de Matrícula:</label>
                            <input type="text" name="numero_matricula" required>

                            <label>Foto do Aluno:</label>
                            <input type="file" name="foto_aluno" accept="image/*">

                            <label>Nome Completo:</label>
                            <input type="text" name="nome_completo" required>

                            <label>Data de Nascimento:</label>
                            <input type="date" name="data_nascimento" required>

                            <label>Idade:</label>
                            <input type="number" name="idade" required>

                            <label>Sexo:</label>
                            <select name="sexo" required>
                                <option value="">Selecione</option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>

                            <label>Naturalidade:</label>
                            <input type="text" name="naturalidade" required>

                            <label>UF:</label>
                            <input type="text" name="uf_naturalidade" maxlength="2" required>

                            <label>Nacionalidade:</label>
                            <input type="text" name="nacionalidade" required>

                            <label>Cor/Raça:</label>
                            <input type="text" name="cor_raca" required>

                            <label>Certidão de Nascimento:</label>
                            <input type="text" name="certidao_nascimento">

                            <label>CPF:</label>
                            <input type="text" name="cpf" required>

                            <label>NIS:</label>
                            <input type="text" name="nis">

                            <label>RG:</label>
                            <input type="text" name="rg" required>

                            <label>Órgão Emissor:</label>
                            <input type="text" name="orgao_emissor" required>

                            <label>Endereço:</label>
                            <input type="text" name="endereco" required>

                            <label>Bairro:</label>
                            <input type="text" name="bairro" required>

                            <label>CEP:</label>
                            <input type="text" name="cep" required>

                            <label>Município:</label>
                            <input type="text" name="municipio" required>

                            <label>UF:</label>
                            <input type="text" name="uf_endereco" maxlength="2" required>

                            <label>Telefone:</label>
                            <input type="text" name="telefone" required>

                            <label>E-mail:</label>
                            <input type="email" name="email">
                        </div>
                    </fieldset>

                    <!-- ESCOLARIDADE -->
                    <fieldset>
                        <legend>Informações Escolares</legend>

                        <div class="form-grid">
                            <label>Série/Ano:</label>
                            <input type="text" name="serie_ano" required>

                            <label>Turno:</label>
                            <select name="turno" required>
                                <option value="">Selecione</option>
                                <option value="Matutino">Matutino</option>
                                <option value="Vespertino">Vespertino</option>
                                <option value="Noturno">Noturno</option>
                            </select>

                            <label>Modalidade:</label>
                            <select name="modalidade" required>
                                <option value="">Selecione</option>
                                <option value="Regular">Regular</option>
                                <option value="EJA">EJA</option>
                                <option value="Educação Especial">Educação Especial</option>
                            </select>

                            <label>Escola de Origem:</label>
                            <input type="text" name="escola_origem" required>

                            <label>Município/UF:</label>
                            <input type="text" name="municipio_uf_origem" required>
                        </div>
                    </fieldset>

                    <!-- RESPONSÁVEL -->
                    <fieldset>
                        <legend>Dados do Responsável</legend>

                        <div class="form-grid">
                            <label>Nome Completo:</label>
                            <input type="text" name="responsavel_nome" required>

                            <label>Grau de Parentesco:</label>
                            <input type="text" name="responsavel_grau_parentesco" required>

                            <label>CPF:</label>
                            <input type="text" name="responsavel_cpf" required>

                            <label>RG:</label>
                            <input type="text" name="responsavel_rg" required>

                            <label>Endereço:</label>
                            <input type="text" name="responsavel_endereco">

                            <label>Telefone:</label>
                            <input type="text" name="responsavel_telefone" required>

                            <label>E-mail:</label>
                            <input type="email" name="responsavel_email">

                            <label>Profissão/Ocupação:</label>
                            <input type="text" name="responsavel_profissao" required>
                        </div>
                    </fieldset>

                    <!-- SAÚDE -->
                    <fieldset>
                        <legend>Situação Familiar e Saúde</legend>

                        <div class="form-grid">
                            <label>Possui necessidade específica?</label>
                            <input type="text" name="necessidade_especifica" required>

                            <label>Recebe benefício social?</label>
                            <input type="text" name="beneficio_social" required>

                            <label>Usa medicação contínua?</label>
                            <input type="text" name="medicacao_continua" required>

                            <label>Alergias:</label>
                            <input type="text" name="alergias">

                            <label>Contato de Emergência:</label>
                            <input type="text" name="contato_emergencia" required>

                            <label>Telefone de Emergência:</label>
                            <input type="text" name="telefone_emergencia" required>

                            <label>Autoriza atividades extraclasse?</label>
                            <select name="autorizacao_atividades" required>
                                <option value="Sim">Sim</option>
                                <option value="Não">Não</option>
                            </select>

                            <label>Autoriza uso de imagem?</label>
                            <select name="autorizacao_imagem" required>
                                <option value="Sim">Sim</option>
                                <option value="Não">Não</option>
                            </select>
                        </div>
                    </fieldset>

                    <!-- MATRÍCULA -->
                    <fieldset>
                        <legend>Dados da Matrícula</legend>

                        <div class="form-grid">
                            <label>Data da Matrícula:</label>
                            <input type="date" name="data_matricula" required>

                            <label>Turma:</label>
                            <input type="text" name="turma" required>

                            <label>Nº de Chamada:</label>
                            <input type="number" name="numero_chamada" required>

                            <label>Servidor Responsável:</label>
                            <input type="text" name="servidor_responsavel" required>
                        </div>
                    </fieldset>

                    <div class="buttons-container">
                        <button type="submit" class="btn btn-submit btn-add">
                            <span class="btn-icon">📄</span>
                            <span class="btn-text">Enviar Matrícula</span>
                        </button>
                    </div>
                </form>
            </div>
        </main>

        <footer>
            <p>© 2025 Secretaria de Educação | Sistema de Matrículas</p>
        </footer>
    </div>

</body>

</html>