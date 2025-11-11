<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.html");
    die;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lista de Alunos</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../styles/style-list.css">
</head>

<body>
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 20px">Lista de Alunos</h2>
        <div class="table-responsive">
            <table class="table user-list table-hover">
                <thead>
                    <tr>
                        <th class="text-center"><span>Usuário</span></th>
                        <th class="text-center"><span>Idade</span></th>
                        <th class="text-center"><span>Sexo</span></th>
                        <th class="text-center"><span>Email</span></th>
                        <th class="text-center"><span>Ações</span></th>
                    </tr>
                </thead>
                <tbody class="dados_alunos">

                </tbody>
            </table>
        </div>

        <ul class="pagination pull-right">
            <li>
                <a href="#"><i class="fa fa-chevron-left"></i></a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
                <a href="#"><i class="fa fa-chevron-right"></i></a>
            </li>
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            getdata();
        });

        function getdata() {
            $.ajax({
                type: "GET",
                url: "../scripts/lista.php",
                success: function(response) {
                    $.each(response, function(key, aluno) {
                        $(".dados_alunos").append(`
                        <tr>
                            <td>
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar" />
                                <a href="#" class="user-link">${aluno.nomeCompleto}</a>
                                <span class="user-subhead">${aluno.turma} - ${aluno.turno}</span>
                            </td>
                            <td>${aluno.idade}</td>
                            <td class="text-center">
                                <span class="label label-default">${aluno.sexo}</span>
                            </td>
                            <td>
                                <a href="#">${aluno.email || 'Sem email'}</a>
                            </td>
                            <td>
                                <a href="#" class="table-link">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="#" class="table-link">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="#" class="table-link danger">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </td>
                        </tr>
                    `);
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Erro ao carregar dados:", error);
                    console.log("Resposta:", xhr.responseText);
                }
            });
        }
    </script>
</body>

</html>