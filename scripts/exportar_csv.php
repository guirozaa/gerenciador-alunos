<?php
require_once '../sgc/conectaBd.php';

// Query para buscar todos os alunos
$sql = "SELECT * FROM alunos_tb";
$result = mysqli_query($conect, $sql);

if (!$result) {
    die('Erro na consulta: ' . mysqli_error($conect));
}

// Verificar se há registros
if (mysqli_num_rows($result) === 0) {
    die('Nenhum aluno encontrado para exportar.');
}

// Configurar headers para download do arquivo CSV
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=alunos_' . date('Y-m-d_H-i-s') . '.csv');
header('Pragma: no-cache');
header('Expires: 0');

// Criar o output para o CSV
$output = fopen('php://output', 'w');

// Adicionar BOM para UTF-8 (para o Excel reconhecer acentos corretamente)
fprintf($output, chr(0xEF) . chr(0xBB) . chr(0xBF));

// Cabeçalhos das colunas (em português)
$headers = [
    'Nome Completo',
    'Data de Nascimento',
    'Idade',
    'Sexo',
    'Naturalidade',
    'UF Naturalidade',
    'Nacionalidade',
    'Cor/Raça',
    'CPF',
    'NIS',
    'RG',
    'Órgão Emissor',
    'Endereço',
    'Bairro',
    'CEP',
    'Município',
    'UF Endereço',
    'Telefone',
    'E-mail',
    'Ano Letivo',
    'Turno',
    'Modalidade',
    'Escola de Origem',
    'Município da Escola',
    'Nome do Responsável',
    'Grau de Parentesco',
    'CPF do Responsável',
    'RG do Responsável',
    'Endereço do Responsável',
    'Telefone do Responsável',
    'E-mail do Responsável',
    'Profissão do Responsável',
    'Necessidade Específica',
    'Benefício Social',
    'Medicação Contínua',
    'Alergias',
    'Contato de Emergência',
    'Telefone de Emergência',
    'Autorização Atividades',
    'Autorização Uso de Imagem',
    'Data da Matrícula',
    'Turma',
    'Número de Chamada',
    'Servidor Responsável',
    'Foto do Aluno',
    'Certidão de Nascimento',
    'Carteira de Vacinação',
    'Comprovante de Residência',
    'Cartão NIS',
    'Documento do Aluno',
    'Documento do Responsável'
];

// Escrever cabeçalhos
fputcsv($output, $headers, ';', '"', '\\');

// Escrever dados dos alunos
while ($aluno = mysqli_fetch_assoc($result)) {
    $linha = [
        $aluno['nome_completo'],
        $aluno['data_nascimento'],
        $aluno['idade'],
        $aluno['sexo'],
        $aluno['naturalidade'],
        $aluno['uf_naturalidade'],
        $aluno['nacionalidade'],
        $aluno['cor_raca'],
        $aluno['cpf'],
        $aluno['nis'],
        $aluno['rg'],
        $aluno['orgao_emissor'],
        $aluno['endereco'],
        $aluno['bairro'],
        $aluno['cep'],
        $aluno['municipio'],
        $aluno['uf_endereco'],
        $aluno['telefone'],
        $aluno['email'],
        $aluno['ano_letivo'],
        $aluno['turno'],
        $aluno['modalidade'],
        $aluno['escola_origem'],
        $aluno['municipio_escola'],
        $aluno['responsavel_nome'],
        $aluno['responsavel_grau_parentesco'],
        $aluno['responsavel_cpf'],
        $aluno['responsavel_rg'],
        $aluno['responsavel_endereco'],
        $aluno['responsavel_telefone'],
        $aluno['responsavel_email'],
        $aluno['responsavel_profissao'],
        $aluno['necessidade_especifica'],
        $aluno['beneficio_social'],
        $aluno['medicacao_continua'],
        $aluno['alergias'],
        $aluno['contato_emergencia'],
        $aluno['telefone_emergencia'],
        $aluno['autorizacao_atividades'],
        $aluno['autorizacao_uso_imagem'],
        $aluno['data_matricula'],
        $aluno['turma'],
        $aluno['numero_chamada'],
        $aluno['servidor_responsavel'],
        $aluno['foto_aluno'],
        $aluno['certidao_nascimento'],
        $aluno['carteira_vacinacao'],
        $aluno['comprovante_residencia'],
        $aluno['cartao_nis'],
        $aluno['documento_aluno'],
        $aluno['documento_responsavel']
    ];

    fputcsv($output, $linha, ';', '"', '\\');
}

fclose($output);
mysqli_free_result($result);
mysqli_close($conect);
exit();
