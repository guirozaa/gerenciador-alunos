<?php
require_once '../sgc/conectaBd.php';
require_once '../repositorio/AlunoRepositorio.php';
require_once '../controller/AlunoController.php';
require "../sgc/verifica.php";

$repo = new AlunoRepositorio($conect);
$controller = new AlunoController($repo);

$alunos = $controller->ListarAlunos();

$result = array_map(function (AlunoModel $aluno) {
    return [
        'id' => $aluno->getId(),
        'nomeCompleto' => $aluno->getNomeCompleto(),
        'dataNascimento' => $aluno->getDataNascimento(),
        'idade' => $aluno->getIdade(),
        'sexo' => $aluno->getSexo(),
        'naturalidade' => $aluno->getNaturalidade(),
        'ufNaturalidade' => $aluno->getUfNaturalidade(),
        'nacionalidade' => $aluno->getNacionalidade(),
        'corRaca' => $aluno->getCorRaca(),
        'cpf' => $aluno->getCpf(),
        'nis' => $aluno->getNis(),
        'rg' => $aluno->getRg(),
        'orgaoEmissor' => $aluno->getOrgaoEmissor(),
        'endereco' => $aluno->getEndereco(),
        'bairro' => $aluno->getBairro(),
        'cep' => $aluno->getCep(),
        'municipio' => $aluno->getMunicipio(),
        'ufEndereco' => $aluno->getUfEndereco(),
        'telefone' => $aluno->getTelefone(),
        'email' => $aluno->getEmail(),
        'anoLetivo' => $aluno->getAnoLetivo(),
        'turno' => $aluno->getTurno(),
        'modalidade' => $aluno->getModalidade(),
        'escolaOrigem' => $aluno->getEscolaOrigem(),
        'municipioEscola' => $aluno->getMunicipioEscola(),
        'responsavelNome' => $aluno->getResponsavelNome(),
        'responsavelGrauParentesco' => $aluno->getResponsavelGrauParentesco(),
        'responsavelCpf' => $aluno->getResponsavelCpf(),
        'responsavelRg' => $aluno->getResponsavelRg(),
        'responsavelEndereco' => $aluno->getResponsavelEndereco(),
        'responsavelTelefone' => $aluno->getResponsavelTelefone(),
        'responsavelEmail' => $aluno->getResponsavelEmail(),
        'responsavelProfissao' => $aluno->getResponsavelProfissao(),
        'necessidadeEspecifica' => $aluno->getNecessidadeEspecifica(),
        'beneficioSocial' => $aluno->getBeneficioSocial(),
        'medicacaoContinua' => $aluno->getMedicacaoContinua(),
        'alergias' => $aluno->getAlergias(),
        'contatoEmergencia' => $aluno->getContatoEmergencia(),
        'telefoneEmergencia' => $aluno->getTelefoneEmergencia(),
        'autorizacaoAtividades' => $aluno->getAutorizacaoAtividades(),
        'autorizacaoUsoImagem' => $aluno->getAutorizacaoUsoImagem(),
        'dataMatricula' => $aluno->getDataMatricula(),
        'turma' => $aluno->getTurma(),
        'numeroChamada' => $aluno->getNumeroChamada(),
        'servidorResponsavel' => $aluno->getServidorResponsavel(),
        'certidaoNascimento' => $aluno->getCertidaoNascimento(),
        'fotoAluno' => $aluno->getFotoAluno(),
        'carteiraVacinacao' => $aluno->getCarteiraVacinacao(),
        'comprovanteResidencia' => $aluno->getComprovanteResidencia(),
        'cartaoNis' => $aluno->getCartaoNis(),
        'documentoAluno' => $aluno->getDocumentoAluno(),
        'documentoResponsavel' => $aluno->getDocumentoResponsavel(),
    ];
}, $alunos);


$resultJson = json_encode($result);
header("Content-type: application/json");
echo $resultJson;