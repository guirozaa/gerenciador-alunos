<?php
require "../model/AlunoModel.php";
require "../sgc/verifica.php";
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

    public function buscarAlunoCpf($cpf)
    {
        $aluno = $this->repo->buscarAlunoPorCpf($cpf);
        return $aluno;
    }

    public function ListarAlunos()
    {
        $listaAluno = $this->repo->listarAlunos();
        return $listaAluno;
    }

    public function updateAluno(int $id, array $dados)
    {
        $this->repo->updateAluno($id, $dados);
    }

    public function deletarAluno($id)
    {
        if (!isset($id)) {
            return false;
        }
        $this->repo->deletarAluno($id);
        return true;
    }
}
