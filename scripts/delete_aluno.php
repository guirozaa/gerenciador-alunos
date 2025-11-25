<?php
require_once '../sgc/conectaBd.php';
require_once '../repositorio/AlunoRepositorio.php';
require_once '../controller/AlunoController.php';
require "../sgc/verifica.php";

$repo = new AlunoRepositorio($conect);
$controller = new AlunoController($repo);
$storeFolder = '../sgc/anexos/';

$id = $_POST['id'];
$cpf = $_POST['cpf'];

if (file_exists($storeFolder . $cpf)) {
    if (!is_dir($storeFolder . $cpf)) {
        return false;
    }

    $files = array_diff(scandir($storeFolder . $cpf), ['.', '..']);

    foreach ($files as $file) {
        $path = $storeFolder . $cpf . '/' . $file;

        if (!is_dir($path)) {
            unlink($path);
        }
    }

    rmdir($storeFolder . $cpf);
}


if ($id) {
    $del = $controller->deletarAluno($id);

    echo json_encode(['success' => true, 'message' => 'Aluno excluído']);
} else {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'ID inválido']);
}
