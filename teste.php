<?php
require "./model/AlunoModel.php";
require "./repositorio/AlunoRepositorio.php";

$repositorio = new AlunoRepositorio($conect);

// Captura o retorno do método
$aluno = $repositorio->pegarAlunoPorCpf("06410834322");

// Verifica se encontrou o aluno
if ($aluno !== null) {
    echo "Aluno encontrado:\n";
    echo "Nome: " . $aluno->nome_completo . "\n";
    echo "CPF: " . $aluno->cpf . "\n";
    echo "Telefone: " . $aluno->telefone . "\n";
} else {
    echo "Aluno não encontrado!\n";
}


var_dump($aluno);
