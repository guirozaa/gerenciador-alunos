<?php

class AlunoModel
{
    private ?int $id = null;
    private string $ano_letivo = '';
    private string $foto_aluno = '';
    private string $nome_completo = '';
    private string $data_nascimento = '';
    private int $idade = 0;
    private string $sexo = '';
    private string $naturalidade = '';
    private string $uf_naturalidade = '';
    private string $nacionalidade = '';
    private string $cor_raca = '';
    private ?string $certidao_nascimento = null;
    private string $cpf = '';
    private ?string $nis = null;
    private string $rg = '';
    private string $orgao_emissor = '';
    private string $endereco = '';
    private string $bairro = '';
    private string $cep = '';
    private string $municipio = '';
    private string $uf_endereco = '';
    private string $telefone = '';
    private ?string $email = null;
    private string $turno = '';
    private string $modalidade = '';
    private string $escola_origem = '';
    private string $municipio_escola = '';
    private string $responsavel_nome = '';
    private string $responsavel_grau_parentesco = '';
    private string $responsavel_cpf = '';
    private string $responsavel_rg = '';
    private ?string $responsavel_endereco = null;
    private string $responsavel_telefone = '';
    private ?string $responsavel_email = null;
    private string $responsavel_profissao = '';
    private string $necessidade_especifica = '';
    private string $beneficio_social = '';
    private string $medicacao_continua = '';
    private ?string $alergias = null;
    private string $contato_emergencia = '';
    private string $telefone_emergencia = '';
    private bool $autorizacao_atividades = false;
    private bool $autorizacao_uso_imagem = false;
    private string $data_matricula = '';
    private string $turma = '';
    private int $numero_chamada = 0;
    private string $servidor_responsavel = '';
    private string $carteira_vacinacao = '';
    private string $comprovante_residencia = '';
    private ?string $cartao_nis = null;
    private string $documento_aluno = '';
    private string $documento_responsavel = '';
    private ?string $date = null;

    public function __construct(array $dados = [])
    {
        foreach ($dados as $chave => $valor) {
            if (property_exists($this, $chave)) {
                $this->$chave = $valor;
            }
        }
    }

    // Getters e Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getAnoLetivo(): string
    {
        return $this->ano_letivo;
    }

    public function setAnoLetivo(string $ano_letivo): void
    {
        $this->ano_letivo = $ano_letivo;
    }

    public function getFotoAluno(): string
    {
        return $this->foto_aluno;
    }

    public function setFotoAluno(string $foto_aluno): void
    {
        $this->foto_aluno = $foto_aluno;
    }

    public function getNomeCompleto(): string
    {
        return $this->nome_completo;
    }

    public function setNomeCompleto(string $nome_completo): void
    {
        $this->nome_completo = $nome_completo;
    }

    public function getDataNascimento(): string
    {
        return $this->data_nascimento;
    }

    public function setDataNascimento(string $data_nascimento): void
    {
        $this->data_nascimento = $data_nascimento;
    }

    public function getIdade(): int
    {
        return $this->idade;
    }

    public function setIdade(int $idade): void
    {
        $this->idade = $idade;
    }

    public function getSexo(): string
    {
        return $this->sexo;
    }

    public function setSexo(string $sexo): void
    {
        $this->sexo = $sexo;
    }

    public function getNaturalidade(): string
    {
        return $this->naturalidade;
    }

    public function setNaturalidade(string $naturalidade): void
    {
        $this->naturalidade = $naturalidade;
    }

    public function getUfNaturalidade(): string
    {
        return $this->uf_naturalidade;
    }

    public function setUfNaturalidade(string $uf_naturalidade): void
    {
        $this->uf_naturalidade = $uf_naturalidade;
    }

    public function getNacionalidade(): string
    {
        return $this->nacionalidade;
    }

    public function setNacionalidade(string $nacionalidade): void
    {
        $this->nacionalidade = $nacionalidade;
    }

    public function getCorRaca(): string
    {
        return $this->cor_raca;
    }

    public function setCorRaca(string $cor_raca): void
    {
        $this->cor_raca = $cor_raca;
    }

    public function getCertidaoNascimento(): ?string
    {
        return $this->certidao_nascimento;
    }

    public function setCertidaoNascimento(?string $certidao_nascimento): void
    {
        $this->certidao_nascimento = $certidao_nascimento;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }

    public function getNis(): ?string
    {
        return $this->nis;
    }

    public function setNis(?string $nis): void
    {
        $this->nis = $nis;
    }

    public function getRg(): string
    {
        return $this->rg;
    }

    public function setRg(string $rg): void
    {
        $this->rg = $rg;
    }

    public function getOrgaoEmissor(): string
    {
        return $this->orgao_emissor;
    }

    public function setOrgaoEmissor(string $orgao_emissor): void
    {
        $this->orgao_emissor = $orgao_emissor;
    }

    public function getEndereco(): string
    {
        return $this->endereco;
    }

    public function setEndereco(string $endereco): void
    {
        $this->endereco = $endereco;
    }

    public function getBairro(): string
    {
        return $this->bairro;
    }

    public function setBairro(string $bairro): void
    {
        $this->bairro = $bairro;
    }

    public function getCep(): string
    {
        return $this->cep;
    }

    public function setCep(string $cep): void
    {
        $this->cep = $cep;
    }

    public function getMunicipio(): string
    {
        return $this->municipio;
    }

    public function setMunicipio(string $municipio): void
    {
        $this->municipio = $municipio;
    }

    public function getUfEndereco(): string
    {
        return $this->uf_endereco;
    }

    public function setUfEndereco(string $uf_endereco): void
    {
        $this->uf_endereco = $uf_endereco;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getTurno(): string
    {
        return $this->turno;
    }

    public function setTurno(string $turno): void
    {
        $this->turno = $turno;
    }

    public function getModalidade(): string
    {
        return $this->modalidade;
    }

    public function setModalidade(string $modalidade): void
    {
        $this->modalidade = $modalidade;
    }

    public function getEscolaOrigem(): string
    {
        return $this->escola_origem;
    }

    public function setEscolaOrigem(string $escola_origem): void
    {
        $this->escola_origem = $escola_origem;
    }

    public function getMunicipioEscola(): string
    {
        return $this->municipio_escola;
    }

    public function setMunicipioEscola(string $municipio_escola): void
    {
        $this->municipio_escola = $municipio_escola;
    }

    public function getResponsavelNome(): string
    {
        return $this->responsavel_nome;
    }

    public function setResponsavelNome(string $responsavel_nome): void
    {
        $this->responsavel_nome = $responsavel_nome;
    }

    public function getResponsavelGrauParentesco(): string
    {
        return $this->responsavel_grau_parentesco;
    }

    public function setResponsavelGrauParentesco(string $responsavel_grau_parentesco): void
    {
        $this->responsavel_grau_parentesco = $responsavel_grau_parentesco;
    }

    public function getResponsavelCpf(): string
    {
        return $this->responsavel_cpf;
    }

    public function setResponsavelCpf(string $responsavel_cpf): void
    {
        $this->responsavel_cpf = $responsavel_cpf;
    }

    public function getResponsavelRg(): string
    {
        return $this->responsavel_rg;
    }

    public function setResponsavelRg(string $responsavel_rg): void
    {
        $this->responsavel_rg = $responsavel_rg;
    }

    public function getResponsavelEndereco(): ?string
    {
        return $this->responsavel_endereco;
    }

    public function setResponsavelEndereco(?string $responsavel_endereco): void
    {
        $this->responsavel_endereco = $responsavel_endereco;
    }

    public function getResponsavelTelefone(): string
    {
        return $this->responsavel_telefone;
    }

    public function setResponsavelTelefone(string $responsavel_telefone): void
    {
        $this->responsavel_telefone = $responsavel_telefone;
    }

    public function getResponsavelEmail(): ?string
    {
        return $this->responsavel_email;
    }

    public function setResponsavelEmail(?string $responsavel_email): void
    {
        $this->responsavel_email = $responsavel_email;
    }

    public function getResponsavelProfissao(): string
    {
        return $this->responsavel_profissao;
    }

    public function setResponsavelProfissao(string $responsavel_profissao): void
    {
        $this->responsavel_profissao = $responsavel_profissao;
    }

    public function getNecessidadeEspecifica(): string
    {
        return $this->necessidade_especifica;
    }

    public function setNecessidadeEspecifica(string $necessidade_especifica): void
    {
        $this->necessidade_especifica = $necessidade_especifica;
    }

    public function getBeneficioSocial(): string
    {
        return $this->beneficio_social;
    }

    public function setBeneficioSocial(string $beneficio_social): void
    {
        $this->beneficio_social = $beneficio_social;
    }

    public function getMedicacaoContinua(): string
    {
        return $this->medicacao_continua;
    }

    public function setMedicacaoContinua(string $medicacao_continua): void
    {
        $this->medicacao_continua = $medicacao_continua;
    }

    public function getAlergias(): ?string
    {
        return $this->alergias;
    }

    public function setAlergias(?string $alergias): void
    {
        $this->alergias = $alergias;
    }

    public function getContatoEmergencia(): string
    {
        return $this->contato_emergencia;
    }

    public function setContatoEmergencia(string $contato_emergencia): void
    {
        $this->contato_emergencia = $contato_emergencia;
    }

    public function getTelefoneEmergencia(): string
    {
        return $this->telefone_emergencia;
    }

    public function setTelefoneEmergencia(string $telefone_emergencia): void
    {
        $this->telefone_emergencia = $telefone_emergencia;
    }

    public function getAutorizacaoAtividades(): bool
    {
        return $this->autorizacao_atividades;
    }

    public function setAutorizacaoAtividades(bool $autorizacao_atividades): void
    {
        $this->autorizacao_atividades = $autorizacao_atividades;
    }

    public function getAutorizacaoUsoImagem(): bool
    {
        return $this->autorizacao_uso_imagem;
    }

    public function setAutorizacaoUsoImagem(bool $autorizacao_uso_imagem): void
    {
        $this->autorizacao_uso_imagem = $autorizacao_uso_imagem;
    }

    public function getDataMatricula(): string
    {
        return $this->data_matricula;
    }

    public function setDataMatricula(string $data_matricula): void
    {
        $this->data_matricula = $data_matricula;
    }

    public function getTurma(): string
    {
        return $this->turma;
    }

    public function setTurma(string $turma): void
    {
        $this->turma = $turma;
    }

    public function getNumeroChamada(): int
    {
        return $this->numero_chamada;
    }

    public function setNumeroChamada(int $numero_chamada): void
    {
        $this->numero_chamada = $numero_chamada;
    }

    public function getServidorResponsavel(): string
    {
        return $this->servidor_responsavel;
    }

    public function setServidorResponsavel(string $servidor_responsavel): void
    {
        $this->servidor_responsavel = $servidor_responsavel;
    }

    public function getCarteiraVacinacao(): string
    {
        return $this->carteira_vacinacao;
    }

    public function setCarteiraVacinacao(string $carteira_vacinacao): void
    {
        $this->carteira_vacinacao = $carteira_vacinacao;
    }

    public function getComprovanteResidencia(): string
    {
        return $this->comprovante_residencia;
    }

    public function setComprovanteResidencia(string $comprovante_residencia): void
    {
        $this->comprovante_residencia = $comprovante_residencia;
    }

    public function getCartaoNis(): ?string
    {
        return $this->cartao_nis;
    }

    public function setCartaoNis(?string $cartao_nis): void
    {
        $this->cartao_nis = $cartao_nis;
    }

    public function getDocumentoAluno(): string
    {
        return $this->documento_aluno;
    }

    public function setDocumentoAluno(string $documento_aluno): void
    {
        $this->documento_aluno = $documento_aluno;
    }

    public function getDocumentoResponsavel(): string
    {
        return $this->documento_responsavel;
    }

    public function setDocumentoResponsavel(string $documento_responsavel): void
    {
        $this->documento_responsavel = $documento_responsavel;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(?string $date): void
    {
        $this->date = $date;
    }
}
