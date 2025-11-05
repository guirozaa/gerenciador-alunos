<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.html");
    die;
}
require_once '../sgc/conectaBd.php';
require_once '../repositorio/AlunoRepositorio.php';
require_once '../controller/AlunoController.php';

$arquivos = ['foto_aluno', 'certidao_nascimento', 'carteira_vacinacao', 'comprovante_residencia', 'cartao_nis', 'documento_aluno',  'documento_responsavel'];

$storeFolder = '../sgc/anexos/';
if (!file_exists($storeFolder)) {
    mkdir($storeFolder, 0775, true);
}

foreach ($arquivos as $chave) {
    $extensao = "";
    if (!isset($_FILES[$chave]) || $_FILES[$chave]['error'] !== UPLOAD_ERR_OK) {
        continue;
    }
    switch ($_FILES[$chave]['type']) {
        case "application/pdf":
            $extensao = "pdf";
            break;
        case "image/jpeg":
            $extensao = "jpg";
            break;
        case "image/png":
            $extensao = "png";
            break;
    }
    if ($extensao == "") {
        echo "Enviar em formato certo o anexo " . $chave . " : pdf, jpg ou png!";
        continue;
    }

    if (!file_exists($storeFolder . $_POST['cpf'])) {
        mkdir($storeFolder . $_POST['cpf'], 0775, true);
    }

    move_uploaded_file(
        $_FILES[$chave]['tmp_name'],
        $storeFolder . $_POST['cpf'] . '/' . $chave . '.' . $extensao
    );

    $novoNome =  $storeFolder . $_POST['cpf'] . '/' . $chave . '.' . $extensao;
    $_FILES[$chave]['caminho_final'] = $novoNome;
}




$dados = [
    // DADOS DO ALUNO
    'nome_completo' => $_POST['nome_completo'] ?? '',
    'data_nascimento' => $_POST['data_nascimento'] ?? '',
    'idade' => $_POST['idade'] ?? '',
    'sexo' => $_POST['sexo'] ?? '',
    'naturalidade' => $_POST['naturalidade'] ?? '',
    'uf_naturalidade' => $_POST['uf_naturalidade'] ?? '',
    'nacionalidade' => $_POST['nacionalidade'] ?? '',
    'cor_raca' => $_POST['cor_raca'] ?? '',
    'cpf' => $_POST['cpf'] ?? '',
    'nis' => $_POST['nis'] ?? '',
    'rg' => $_POST['rg'] ?? '',
    'orgao_emissor' => $_POST['orgao_emissor'] ?? '',
    'endereco' => $_POST['endereco'] ?? '',
    'bairro' => $_POST['bairro'] ?? '',
    'cep' => $_POST['cep'] ?? '',
    'municipio' => $_POST['municipio'] ?? '',
    'uf_endereco' => $_POST['uf_endereco'] ?? '',
    'telefone' => $_POST['telefone'] ?? '',
    'email' => $_POST['email'] ?? '',

    // INFORMAÇÕES ESCOLARES
    'ano_letivo' => $_POST['ano_letivo'] ?? '',
    'turno' => $_POST['turno'] ?? '',
    'modalidade' => $_POST['modalidade'] ?? '',
    'escola_origem' => $_POST['escola_origem'] ?? '',
    'municipio_escola' => $_POST['municipio_escola'] ?? '',

    // DADOS DO RESPONSÁVEL
    'responsavel_nome' => $_POST['responsavel_nome'] ?? '',
    'responsavel_grau_parentesco' => $_POST['responsavel_grau_parentesco'] ?? '',
    'responsavel_cpf' => $_POST['responsavel_cpf'] ?? '',
    'responsavel_rg' => $_POST['responsavel_rg'] ?? '',
    'responsavel_endereco' => $_POST['responsavel_endereco'] ?? '',
    'responsavel_telefone' => $_POST['responsavel_telefone'] ?? '',
    'responsavel_email' => $_POST['responsavel_email'] ?? '',
    'responsavel_profissao' => $_POST['responsavel_profissao'] ?? '',

    // SAÚDE E SITUAÇÃO FAMILIAR
    'necessidade_especifica' => $_POST['necessidade_especifica'] ?? '',
    'beneficio_social' => $_POST['beneficio_social'] ?? '',
    'medicacao_continua' => $_POST['medicacao_continua'] ?? '',
    'alergias' => $_POST['alergias'] ?? '',
    'contato_emergencia' => $_POST['contato_emergencia'] ?? '',
    'telefone_emergencia' => $_POST['telefone_emergencia'] ?? '',
    'autorizacao_atividades' => $_POST['autorizacao_atividades'] ?? '',
    'autorizacao_uso_imagem' => $_POST['autorizacao_uso_imagem'] ?? '',

    // MATRÍCULA
    'data_matricula' => $_POST['data_matricula'] ?? '',
    'turma' => $_POST['turma'] ?? '',
    'numero_chamada' => $_POST['numero_chamada'] ?? '',
    'servidor_responsavel' => $_POST['servidor_responsavel'] ?? '',

    // DOCUMENTOS
    'foto_aluno' => $_FILES['foto_aluno']['caminho_final'] ?? null,
    'certidao_nascimento' => $_FILES['certidao_nascimento']['caminho_final'] ?? null,
    'carteira_vacinacao' => $_FILES['carteira_vacinacao']['caminho_final'] ?? null,
    'comprovante_residencia' => $_FILES['comprovante_residencia']['caminho_final'] ?? null,
    'cartao_nis' => $_FILES['cartao_nis']['caminho_final'] ?? null,
    'documento_aluno' => $_FILES['documento_aluno']['caminho_final'] ?? null,
    'documento_responsavel' => $_FILES['documento_responsavel']['caminho_final'] ?? null,
];



$repo = new AlunoRepositorio($conect);
$controller = new AlunoController($repo);
$resultado = $controller->CreateAluno($dados);
