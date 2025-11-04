<?php
require_once __DIR__ . '/../sgc/conectaBd.php';

class AlunoRepositorio
{
    private $conn;
    public function __construct($conexao)
    {
        $this->conn = $conexao;
    }

    public function createAluno(AlunoModel $aluno)
    {
        $stmt = $this->conn->prepare("
            INSERT INTO alunos_tb (
            ano_letivo, numero_matricula, foto_aluno,
            nome_completo, data_nascimento, idade, sexo, naturalidade, uf_naturalidade,
            nacionalidade, cor_raca, certidao_nascimento, cpf, nis, rg, orgao_emissor,
            endereco, bairro, cep, municipio, uf_endereco, telefone, email,
            serie_ano, turno, modalidade, escola_origem, municipio_escola,
            responsavel_nome, responsavel_grau_parentesco, responsavel_cpf, responsavel_rg,
            responsavel_endereco, responsavel_telefone, responsavel_email, responsavel_profissao,
            necessidade_especifica, beneficio_social, medicacao_continua, alergias,
            contato_emergencia, telefone_emergencia, autorizacao_atividades, autorizacao_uso_imagem,
            data_matricula, turma, numero_chamada, servidor_responsavel,
            carteira_vacinacao, comprovante_residencia, cartao_nis,
            documento_aluno, documento_responsavel, data_registro
        ) VALUES (
            ? ,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
            ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
            ?, ?, ?, ?, ?, NOW()
        )
        ");

        $stmt->bind_param(
            "sssssssssssssssssssssssssssssssssssssssssssssssssssss",
            $aluno->ano_letivo,
            $aluno->numero_matricula,
            $aluno->foto_aluno,
            $aluno->nome_completo,
            $aluno->data_nascimento,
            $aluno->idade,
            $aluno->sexo,
            $aluno->naturalidade,
            $aluno->uf_naturalidade,
            $aluno->nacionalidade,
            $aluno->cor_raca,
            $aluno->certidao_nascimento,
            $aluno->cpf,
            $aluno->nis,
            $aluno->rg,
            $aluno->orgao_emissor,
            $aluno->endereco,
            $aluno->bairro,
            $aluno->cep,
            $aluno->municipio,
            $aluno->uf_endereco,
            $aluno->telefone,
            $aluno->email,
            $aluno->serie_ano,
            $aluno->turno,
            $aluno->modalidade,
            $aluno->escola_origem,
            $aluno->municipio_escola,
            $aluno->responsavel_nome,
            $aluno->responsavel_grau_parentesco,
            $aluno->responsavel_cpf,
            $aluno->responsavel_rg,
            $aluno->responsavel_endereco,
            $aluno->responsavel_telefone,
            $aluno->responsavel_email,
            $aluno->responsavel_profissao,
            $aluno->necessidade_especifica,
            $aluno->beneficio_social,
            $aluno->medicacao_continua,
            $aluno->alergias,
            $aluno->contato_emergencia,
            $aluno->telefone_emergencia,
            $aluno->autorizacao_atividades,
            $aluno->autorizacao_uso_imagem,
            $aluno->data_matricula,
            $aluno->turma,
            $aluno->numero_chamada,
            $aluno->servidor_responsavel,
            $aluno->carteira_vacinacao,
            $aluno->comprovante_residencia,
            $aluno->cartao_nis,
            $aluno->documento_aluno,
            $aluno->documento_responsavel
        );



        return $stmt->execute();
    }


    //TERMINAR FUNÇÃO PEGAR ALUNO POR CPF
    public function pegarAlunoPorCpf(string $CPF)
    {
        return $CPF;
    }
}
