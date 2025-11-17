<?php
// Inicia o buffer de saída para capturar erros
ob_start();

// Define o header como JSON
header('Content-Type: application/json; charset=utf-8');

// Desabilita exibição de erros no output
ini_set('display_errors', 0);
error_reporting(E_ALL);

try {
    require_once '../sgc/conectaBd.php';
    require_once '../repositorio/AlunoRepositorio.php';
    require_once '../controller/AlunoController.php';

    // Limpa qualquer output anterior
    ob_clean();

    $repo = new AlunoRepositorio($conect);
    $controller = new AlunoController($repo);

    // Verifica se o ID foi enviado
    if (!isset($_POST['id']) || empty($_POST['id'])) {
        http_response_code(400);
        echo json_encode(['erro' => 'ID do aluno não fornecido']);
        exit;
    }

    $id = $_POST['id'];

    // Campos esperados do formulário
    $camposEsperados = [
        'nome_completo',
        'data_nascimento',
        'idade',
        'sexo',
        'naturalidade',
        'uf_naturalidade',
        'nacionalidade',
        'cor_raca',
        'cpf',
        'nis',
        'rg',
        'orgao_emissor',
        'endereco',
        'bairro',
        'cep',
        'municipio',
        'uf_endereco',
        'telefone',
        'email',
        'ano_letivo',
        'turno',
        'modalidade',
        'escola_origem',
        'municipio_escola',
        'responsavel_nome',
        'responsavel_grau_parentesco',
        'responsavel_cpf',
        'responsavel_rg',
        'responsavel_endereco',
        'responsavel_telefone',
        'responsavel_email',
        'responsavel_profissao',
        'necessidade_especifica',
        'beneficio_social',
        'medicacao_continua',
        'alergias',
        'contato_emergencia',
        'telefone_emergencia',
        'data_matricula',
        'turma',
        'numero_chamada',
        'servidor_responsavel'
    ];

    // Campos de checkbox (autorizações)
    $camposCheckbox = ['autorizacao_atividades', 'autorizacao_uso_imagem'];

    // Campos de arquivos
    $camposArquivos = [
        'foto_aluno',
        'certidao_nascimento',
        'carteira_vacinacao',
        'comprovante_residencia',
        'cartao_nis',
        'documento_aluno',
        'documento_responsavel'
    ];

    $dados = [];

    // Processa campos de texto
    foreach ($camposEsperados as $campo) {
        if (isset($_POST[$campo]) && $_POST[$campo] !== '') {
            $dados[$campo] = trim($_POST[$campo]);
        }
    }

    // Processa checkboxes (converte para 1 ou 0)
    foreach ($camposCheckbox as $campo) {
        $dados[$campo] = isset($_POST[$campo]) && $_POST[$campo] == '1' ? 1 : 0;
    }

    // Processa arquivos enviados
    if (!empty($_FILES)) {
        foreach ($camposArquivos as $campo) {
            if (isset($_FILES[$campo]) && $_FILES[$campo]['error'] === UPLOAD_ERR_OK) {
                // Diretório de upload
                $diretorioUpload = '../uploads/alunos/';

                // Cria o diretório se não existir
                if (!is_dir($diretorioUpload)) {
                    mkdir($diretorioUpload, 0755, true);
                }

                // Informações do arquivo
                $nomeArquivo = $_FILES[$campo]['name'];
                $tmpName = $_FILES[$campo]['tmp_name'];
                $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

                // Gera nome único para o arquivo
                $nomeUnico = $id . '_' . $campo . '_' . time() . '.' . $extensao;
                $caminhoCompleto = $diretorioUpload . $nomeUnico;

                // Move o arquivo
                if (move_uploaded_file($tmpName, $caminhoCompleto)) {
                    $dados[$campo] = $caminhoCompleto;
                } else {
                    throw new Exception("Erro ao fazer upload do arquivo: {$campo}");
                }
            }
        }
    }

    // Verifica se há dados para atualizar
    if (empty($dados)) {
        http_response_code(400);
        echo json_encode(['erro' => 'Nenhum dado foi enviado para atualização']);
        exit;
    }

    // Atualiza o aluno
    $sucesso = $repo->updateAluno($id, $dados);

    if ($sucesso) {
        echo json_encode([
            'sucesso' => true,
            'mensagem' => 'Aluno atualizado com sucesso!'
        ]);
    } else {
        http_response_code(500);
        echo json_encode(['erro' => 'Erro ao atualizar aluno no banco de dados']);
    }
} catch (Exception $e) {
    // Limpa o buffer
    ob_clean();

    // Log do erro (opcional)
    error_log("Erro em update_aluno.php: " . $e->getMessage());

    http_response_code(500);
    echo json_encode([
        'erro' => 'Erro ao processar a requisição',
        'detalhes' => $e->getMessage()
    ]);
}

// Finaliza o buffer
ob_end_flush();
