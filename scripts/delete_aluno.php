<?php
require_once '../sgc/conectaBd.php';
require_once '../repositorio/AlunoRepositorio.php';
require_once '../controller/AlunoController.php';

$repo = new AlunoRepositorio($conect);
$controller = new AlunoController($repo);

$id = $_POST['id'];


if ($id) {
    $del = $controller->deletarAluno($id);

    echo json_encode(['success' => true, 'message' => 'Aluno excluído']);
} else {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'ID inválido']);
}
