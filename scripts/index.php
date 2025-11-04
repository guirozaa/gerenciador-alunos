<?php
// MODIFICAR VARIOS PONTOS COMO CAMINHOS



// falta ajeitar ❌
//require_once '../model/AlunoModel.php';
require_once '../sgc/conectaBd.php';
require_once '../repositorio/AlunoRepositorio.php';
require_once '../controller/AlunoController.php';

// --- MONTAR OS ARQUIVOS( AINDA FALTA ❌)---
// $foto_nome = null;
// if (!empty($_FILES['foto_aluno']['name'])) {
//     $upload_dir = 'uploads/';
//     if (!is_dir($upload_dir)) {
//         mkdir($upload_dir, 0777, true);
//     }

//     $foto_nome = uniqid('foto_') . '_' . basename($_FILES['foto_aluno']['name']);
//     move_uploaded_file($_FILES['foto_aluno']['tmp_name'], $upload_dir . $foto_nome);
// }

// // --- MONTA O ARRAY DE DADOS ---
// $dados = [
//     'ano_letivo' => $_POST['ano_letivo'] ?? '',
//     'numero_matricula' => $_POST['numero_matricula'] ?? '',
//     'foto_aluno' => $foto_nome,
//     'nome_completo' => $_POST['nome_completo'] ?? '',
//     'data_nascimento' => $_POST['data_nascimento'] ?? '',
//     'idade' => $_POST['idade'] ?? '',
//     'sexo' => $_POST['sexo'] ?? '',
//     'naturalidade' => $_POST['naturalidade'] ?? '',
//     'uf_naturalidade' => $_POST['uf_naturalidade'] ?? '',
//     'nacionalidade' => $_POST['nacionalidade'] ?? '',
//     'cor_raca' => $_POST['cor_raca'] ?? '',
//     'certidao_nascimento' => $_POST['certidao_nascimento'] ?? null,
//     'cpf' => $_POST['cpf'] ?? '',
//     'nis' => $_POST['nis'] ?? null,
//     'rg' => $_POST['rg'] ?? '',
//     'orgao_emissor' => $_POST['orgao_emissor'] ?? '',
//     'endereco' => $_POST['endereco'] ?? '',
//     'bairro' => $_POST['bairro'] ?? '',
//     'cep' => $_POST['cep'] ?? '',
//     'municipio' => $_POST['municipio'] ?? '',
//     'uf_endereco' => $_POST['uf_endereco'] ?? '',
//     'telefone' => $_POST['telefone'] ?? '',
//     'email' => $_POST['email'] ?? null,
//     'serie_ano' => $_POST['serie_ano'] ?? '',
//     'turno' => $_POST['turno'] ?? '',
//     'modalidade' => $_POST['modalidade'] ?? '',
//     'escola_origem' => $_POST['escola_origem'] ?? '',
//     'municipio_uf_origem' => $_POST['municipio_uf_origem'] ?? '',
//     'responsavel_nome' => $_POST['responsavel_nome'] ?? '',
//     'responsavel_grau_parentesco' => $_POST['responsavel_grau_parentesco'] ?? '',
//     'responsavel_cpf' => $_POST['responsavel_cpf'] ?? '',
//     'responsavel_rg' => $_POST['responsavel_rg'] ?? '',
//     'responsavel_endereco' => $_POST['responsavel_endereco'] ?? null,
//     'responsavel_telefone' => $_POST['responsavel_telefone'] ?? '',
//     'responsavel_email' => $_POST['responsavel_email'] ?? null,
//     'responsavel_profissao' => $_POST['responsavel_profissao'] ?? '',
//     'necessidade_especifica' => $_POST['necessidade_especifica'] ?? '',
//     'beneficio_social' => $_POST['beneficio_social'] ?? '',
//     'medicacao_continua' => $_POST['medicacao_continua'] ?? '',
//     'alergias' => $_POST['alergias'] ?? null,
//     'contato_emergencia' => $_POST['contato_emergencia'] ?? '',
//     'telefone_emergencia' => $_POST['telefone_emergencia'] ?? '',
//     'autorizacao_atividades' => $_POST['autorizacao_atividades'] ?? '',
//     'autorizacao_imagem' => $_POST['autorizacao_imagem'] ?? '',
//     'data_matricula' => $_POST['data_matricula'] ?? '',
//     'turma' => $_POST['turma'] ?? '',
//     'numero_chamada' => $_POST['numero_chamada'] ?? '',
//     'servidor_responsavel' => $_POST['servidor_responsavel'] ?? '',
//     'data_hora_registro' => date('Y-m-d H:i:s')
// ];

$dados = [
    'ano_letivo' => '2025',
    'numero_matricula' => 'MAT2025001',
    'foto_aluno' => 'uploads/fotos/aluno1.jpg',

    'nome_completo' => 'João Pedro da Silva',
    'data_nascimento' => '2010-03-15',
    'idade' => 15,
    'sexo' => 'M',
    'naturalidade' => 'São Paulo',
    'uf_naturalidade' => 'SP',
    'nacionalidade' => 'Brasileira',
    'cor_raca' => 'Parda',
    'certidao_nascimento' => '123456789',
    'cpf' => '123.456.789-00',
    'nis' => '12345678900',
    'rg' => '4567890',
    'orgao_emissor' => 'SSP-SP',
    'endereco' => 'Rua das Flores, 123',
    'bairro' => 'Centro',
    'cep' => '01010-000',
    'municipio' => 'São Paulo',
    'uf_endereco' => 'SP',
    'telefone' => '(11) 91234-5678',
    'email' => 'joaopedro@example.com',

    'serie_ano' => '9º Ano',
    'turno' => 'Matutino',
    'modalidade' => 'Ensino Fundamental II',
    'escola_origem' => 'Escola Municipal Jardim das Rosas',
    'municipio_escola' => 'São Paulo',

    'responsavel_nome' => 'Maria da Silva',
    'responsavel_grau_parentesco' => 'Mãe',
    'responsavel_cpf' => '987.654.321-00',
    'responsavel_rg' => '1234567',
    'responsavel_endereco' => 'Rua das Flores, 123',
    'responsavel_telefone' => '(11) 99876-5432',
    'responsavel_email' => 'mariadasilva@example.com',
    'responsavel_profissao' => 'Professora',

    'necessidade_especifica' => 'Nenhuma',
    'beneficio_social' => 'Bolsa Família',
    'medicacao_continua' => 'Não',
    'alergias' => 'Nenhuma',
    'contato_emergencia' => 'Carlos Silva (tio)',
    'telefone_emergencia' => '(11) 97777-8888',

    'autorizacao_atividades' => true,
    'autorizacao_uso_imagem' => true,

    'data_matricula' => '2025-02-10',
    'turma' => '9A',
    'numero_chamada' => 12,
    'servidor_responsavel' => 'Ana Pereira',

    'carteira_vacinacao' => 'uploads/documentos/carteira_vacinacao.pdf',
    'comprovante_residencia' => 'uploads/documentos/comprovante_residencia.pdf',
    'cartao_nis' => 'uploads/documentos/cartao_nis.pdf',
    'documento_aluno' => 'uploads/documentos/documento_aluno.pdf',
    'documento_responsavel' => 'uploads/documentos/documento_responsavel.pdf'
];


// --- CRIA O CONTROLLER E ENVIA OS DADOS --- ❌
$repo = new AlunoRepositorio($conect);
$controller = new AlunoController($repo);
$resultado = $controller->CreateAluno($dados);
