<?php
require "../model/AlunoModel.php";
class AlunoController
{
    private AlunoRepositorio $repo;
    function __construct(AlunoRepositorio $_repo)
    {
        $this->repo = $_repo;
    }

    public function CreateAluno(array $dados)
    {
        // Adicionar chamado da função procurar por cpf DO REPOSITORIO antes de criar objeto aluno!, caso venha uma resposta, echo 'CPF JA CADASTRADO'
        $aluno = new AlunoModel($dados);
        $criar = $this->repo->createAluno($aluno);
    }

    public function ListarAlunos()
    {
        $listaAluno = $this->repo->listarAlunos();
        return $listaAluno;
    }
}
