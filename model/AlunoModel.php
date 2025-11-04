<?php

class AlunoModel
{
    private ?int $id = null;
    private string $ano_letivo;
    private string $numero_matricula;
    private string $foto_aluno;
    private string $nome_completo;
    private string $data_nascimento;
    private int $idade;
    private string $sexo;
    private string $naturalidade;
    private string $uf_naturalidade;
    private string $nacionalidade;
    private string $cor_raca;
    private ?string $certidao_nascimento;
    private string $cpf;
    private ?string $nis;
    private string $rg;
    private string $orgao_emissor;
    private string $endereco;
    private string $bairro;
    private string $cep;
    private string $municipio;
    private string $uf_endereco;
    private string $telefone;
    private ?string $email;
    private string $serie_ano;
    private string $turno;
    private string $modalidade;
    private string $escola_origem;
    private string $municipio_escola;
    private string $responsavel_nome;
    private string $responsavel_grau_parentesco;
    private string $responsavel_cpf;
    private string $responsavel_rg;
    private ?string $responsavel_endereco;
    private string $responsavel_telefone;
    private ?string $responsavel_email;
    private string $responsavel_profissao;
    private string $necessidade_especifica;
    private string $beneficio_social;
    private string $medicacao_continua;
    private ?string $alergias;
    private string $contato_emergencia;
    private string $telefone_emergencia;
    private bool $autorizacao_atividades;
    private bool $autorizacao_uso_imagem;
    private string $data_matricula;
    private string $turma;
    private int $numero_chamada;
    private string $servidor_responsavel;
    private string $carteira_vacinacao;
    private string $comprovante_residencia;
    private ?string $cartao_nis;
    private string $documento_aluno;
    private string $documento_responsavel;
    private ?string $date;

    public function __construct(array $dados = [])
    {
        foreach ($dados as $chave => $valor) {
            if (property_exists($this, $chave)) {
                $this->$chave = $valor;
            }
        }
    }


    public function __get($nome)
    {
        return $this->$nome ?? null;
    }

    public function __set($nome, $valor)
    {
        if (property_exists($this, $nome)) {
            $this->$nome = $valor;
        }
    }
}
