<?php
error_reporting(E_ALL & ~E_NOTICE);

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
            nome_completo, data_nascimento, idade, sexo, naturalidade, uf_naturalidade,
            nacionalidade, cor_raca, cpf, nis, rg, orgao_emissor,
            endereco, bairro, cep, municipio, uf_endereco, telefone, email, ano_letivo,
            turno, modalidade, escola_origem, municipio_escola,
            responsavel_nome, responsavel_grau_parentesco, responsavel_cpf, responsavel_rg,
            responsavel_endereco, responsavel_telefone, responsavel_email, responsavel_profissao,
            necessidade_especifica, beneficio_social, medicacao_continua, alergias,
            contato_emergencia, telefone_emergencia, autorizacao_atividades, autorizacao_uso_imagem,
            data_matricula, turma, numero_chamada, servidor_responsavel,foto_aluno ,certidao_nascimento,
            carteira_vacinacao, comprovante_residencia, cartao_nis,
            documento_aluno, documento_responsavel, data_registro
        ) VALUES (
            ? ,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
            ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
            ?, ?,?, NOW()
        )
        ");

        $stmt->bind_param(
            "sssssssssssssssssssssssssssssssssssssssssssssssssss",
            $aluno->getNomeCompleto(),
            $aluno->getDataNascimento(),
            $aluno->getIdade(),
            $aluno->getSexo(),
            $aluno->getNaturalidade(),
            $aluno->getUfNaturalidade(),
            $aluno->getNacionalidade(),
            $aluno->getCorRaca(),
            $aluno->getCpf(),
            $aluno->getNis(),
            $aluno->getRg(),
            $aluno->getOrgaoEmissor(),
            $aluno->getEndereco(),
            $aluno->getBairro(),
            $aluno->getCep(),
            $aluno->getMunicipio(),
            $aluno->getUfEndereco(),
            $aluno->getTelefone(),
            $aluno->getEmail(),
            $aluno->getAnoLetivo(),
            $aluno->getTurno(),
            $aluno->getModalidade(),
            $aluno->getEscolaOrigem(),
            $aluno->getMunicipioEscola(),
            $aluno->getResponsavelNome(),
            $aluno->getResponsavelGrauParentesco(),
            $aluno->getResponsavelCpf(),
            $aluno->getResponsavelRg(),
            $aluno->getResponsavelEndereco(),
            $aluno->getResponsavelTelefone(),
            $aluno->getResponsavelEmail(),
            $aluno->getResponsavelProfissao(),
            $aluno->getNecessidadeEspecifica(),
            $aluno->getBeneficioSocial(),
            $aluno->getMedicacaoContinua(),
            $aluno->getAlergias(),
            $aluno->getContatoEmergencia(),
            $aluno->getTelefoneEmergencia(),
            $aluno->getAutorizacaoAtividades(),
            $aluno->getAutorizacaoUsoImagem(),
            $aluno->getDataMatricula(),
            $aluno->getTurma(),
            $aluno->getNumeroChamada(),
            $aluno->getServidorResponsavel(),
            $aluno->getFotoAluno(),
            $aluno->getCertidaoNascimento(),
            $aluno->getCarteiraVacinacao(),
            $aluno->getComprovanteResidencia(),
            $aluno->getCartaoNis(),
            $aluno->getDocumentoAluno(),
            $aluno->getDocumentoResponsavel()
        );
        return $stmt->execute();
    }


    //TERMINAR FUNÇÃO PEGAR ALUNO POR CPF
    public function buscarAlunoPorCpf(string $cpf): ?AlunoModel
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM alunos_tb WHERE cpf = ? ");
            $stmt->bind_param('s', $cpf);
            $stmt->execute();
            $result = $stmt->get_result();
            $aluno = $result->fetch_assoc();

            return $aluno ? new AlunoModel($aluno) : null;
        } catch (\Throwable $e) {
            echo "Erro no banco: " . $e;
            return null;
        }
    }

    public function listarAlunos()
    {
        $stmt = $this->conn->prepare("SELECT * FROM alunos_tb");
        $stmt->execute();
        $result = $stmt->get_result();


        $alunos = $result->fetch_all(MYSQLI_ASSOC);


        return array_map(function ($aluno) {
            return new AlunoModel($aluno);
        }, $alunos);
    }

    public function updateAluno(int $idAluno, array $dados)
    {
        if (empty($dados)) {
            return false; // Nenhum dado para atualizar
        }

        // Campos permitidos para atualização (segurança)
        $camposPermitidos = [
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
            'autorizacao_atividades',
            'autorizacao_uso_imagem',
            'data_matricula',
            'turma',
            'numero_chamada',
            'servidor_responsavel',
            'foto_aluno',
            'certidao_nascimento',
            'carteira_vacinacao',
            'comprovante_residencia',
            'cartao_nis',
            'documento_aluno',
            'documento_responsavel'
        ];

        // Filtra apenas campos permitidos
        $dadosValidos = array_intersect_key($dados, array_flip($camposPermitidos));

        if (empty($dadosValidos)) {
            return false; // Nenhum campo válido
        }

        // Constrói a query dinamicamente
        $setClauses = [];
        $valores = [];
        $tipos = '';

        foreach ($dadosValidos as $campo => $valor) {
            $setClauses[] = "$campo = ?";
            $valores[] = $valor;
            $tipos .= 's'; // Assumindo strings (ajuste se tiver inteiros)
        }

        // Sempre atualiza data_registro
        $setClauses[] = "data_registro = NOW()";

        // Adiciona o ID no final
        $valores[] = $idAluno;
        $tipos .= 'i'; // ID é inteiro

        $sql = "UPDATE alunos_tb SET " . implode(', ', $setClauses) . " WHERE id = ?";

        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param($tipos, ...$valores);

        return $stmt->execute();
    }

    // Método para update completo (caso precise)
    public function updateAlunoCompleto(AlunoModel $aluno)
    {
        $stmt = $this->conn->prepare("
        UPDATE alunos_tb SET
        nome_completo = ?, data_nascimento = ?, idade = ?, sexo = ?, naturalidade = ?, uf_naturalidade = ?,
        nacionalidade = ?, cor_raca = ?, cpf = ?, nis = ?, rg = ?, orgao_emissor = ?,
        endereco = ?, bairro = ?, cep = ?, municipio = ?, uf_endereco = ?, telefone = ?, email = ?, ano_letivo = ?,
        turno = ?, modalidade = ?, escola_origem = ?, municipio_escola = ?,
        responsavel_nome = ?, responsavel_grau_parentesco = ?, responsavel_cpf = ?, responsavel_rg = ?,
        responsavel_endereco = ?, responsavel_telefone = ?, responsavel_email = ?, responsavel_profissao = ?,
        necessidade_especifica = ?, beneficio_social = ?, medicacao_continua = ?, alergias = ?,
        contato_emergencia = ?, telefone_emergencia = ?, autorizacao_atividades = ?, autorizacao_uso_imagem = ?,
        data_matricula = ?, turma = ?, numero_chamada = ?, servidor_responsavel = ?, foto_aluno = ?, certidao_nascimento = ?,
        carteira_vacinacao = ?, comprovante_residencia = ?, cartao_nis = ?, documento_aluno = ?, documento_responsavel = ?,
        data_registro = NOW()
        WHERE id = ?
    ");

        $stmt->bind_param(
            "sssssssssssssssssssssssssssssssssssssssssssssssssssi",
            $aluno->getNomeCompleto(),
            $aluno->getDataNascimento(),
            $aluno->getIdade(),
            $aluno->getSexo(),
            $aluno->getNaturalidade(),
            $aluno->getUfNaturalidade(),
            $aluno->getNacionalidade(),
            $aluno->getCorRaca(),
            $aluno->getCpf(),
            $aluno->getNis(),
            $aluno->getRg(),
            $aluno->getOrgaoEmissor(),
            $aluno->getEndereco(),
            $aluno->getBairro(),
            $aluno->getCep(),
            $aluno->getMunicipio(),
            $aluno->getUfEndereco(),
            $aluno->getTelefone(),
            $aluno->getEmail(),
            $aluno->getAnoLetivo(),
            $aluno->getTurno(),
            $aluno->getModalidade(),
            $aluno->getEscolaOrigem(),
            $aluno->getMunicipioEscola(),
            $aluno->getResponsavelNome(),
            $aluno->getResponsavelGrauParentesco(),
            $aluno->getResponsavelCpf(),
            $aluno->getResponsavelRg(),
            $aluno->getResponsavelEndereco(),
            $aluno->getResponsavelTelefone(),
            $aluno->getResponsavelEmail(),
            $aluno->getResponsavelProfissao(),
            $aluno->getNecessidadeEspecifica(),
            $aluno->getBeneficioSocial(),
            $aluno->getMedicacaoContinua(),
            $aluno->getAlergias(),
            $aluno->getContatoEmergencia(),
            $aluno->getTelefoneEmergencia(),
            $aluno->getAutorizacaoAtividades(),
            $aluno->getAutorizacaoUsoImagem(),
            $aluno->getDataMatricula(),
            $aluno->getTurma(),
            $aluno->getNumeroChamada(),
            $aluno->getServidorResponsavel(),
            $aluno->getFotoAluno(),
            $aluno->getCertidaoNascimento(),
            $aluno->getCarteiraVacinacao(),
            $aluno->getComprovanteResidencia(),
            $aluno->getCartaoNis(),
            $aluno->getDocumentoAluno(),
            $aluno->getDocumentoResponsavel(),
            $aluno->getId()
        );

        return $stmt->execute();
    }

    public function deletarAluno(int $id)
    {
        $stmt = $this->conn->prepare("DELETE FROM alunos_tb WHERE id = ? ");
        $stmt->bind_param('i', $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
