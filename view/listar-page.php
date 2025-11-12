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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../styles/style-list.css">
    <style>
    .info-section {
        margin-bottom: 20px;
    }

    .info-section h5 {
        border-bottom: 2px solid #5bc0de;
        padding-bottom: 5px;
        margin-bottom: 15px;
    }

    .info-row {
        margin-bottom: 8px;
    }

    .info-label {
        font-weight: 600;
    }

    .download-btn {
        margin: 5px 5px 5px 0;
    }
    </style>
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
                        <th class="text-center"><span>Telefone</span></th>
                        <th class="text-center"><span>Ações</span></th>
                    </tr>
                </thead>
                <tbody class="dados_alunos">

                </tbody>
            </table>
        </div>

        <div id="modalAluno" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Detalhes do Aluno</h4>
                    </div>
                    <div class="modal-body">
                        <div id="loadingModal" style="text-align: center;">
                            <i class="fa fa-spinner fa-spin fa-3x"></i>
                            <p>Carregando...</p>
                        </div>
                        <div id="dadosAluno" style="display: none;">
                            <!-- Os dados serão preenchidos aqui -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS (IMPORTANTE!) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
                            <img src="${aluno.fotoAluno}" alt="avatar" />
                            <a href="#" class="user-link">${aluno.nomeCompleto}</a>
                            <span class="user-subhead">${aluno.turma} - ${aluno.turno}</span>
                        </td>
                        <td>${aluno.idade}</td>
                        <td class="text-center">
                            <span class="label label-default">${aluno.sexo}</span>
                        </td>
                        <td>
                            <a href="#">${aluno.telefone || aluno.responsavelTelefone}</a>
                        </td>
                        <td>
                            <a href="#" class="table-link btn-visualizar" data-cpf="${aluno.cpf}">
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

    // Evento de clique no botão de visualizar
    $(document).on('click', '.btn-visualizar', function(e) {
        e.preventDefault();

        var alunoCpf = $(this).data('cpf');

        // Mostra o modal
        $('#modalAluno').modal('show');

        // Mostra o loading e esconde os dados
        $('#loadingModal').show();
        $('#dadosAluno').hide();

        // Faz a requisição AJAX para buscar os detalhes do aluno
        $.ajax({
            type: "GET",
            url: "../scripts/detalhes_aluno.php",
            data: {
                cpf: alunoCpf
            },
            dataType: "json",
            success: function(aluno) {
                $('#loadingModal').hide();

                // Monta o HTML com os dados do aluno
                let html = `
                        <div class="info-section">
                            <h5>Dados Pessoais</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-row"><span class="info-label">Nome:</span> ${aluno.nomeCompleto}</div>
                                    <div class="info-row"><span class="info-label">Data de Nascimento:</span> ${aluno.dataNascimento}</div>
                                    <div class="info-row"><span class="info-label">Idade:</span> ${aluno.idade} anos</div>
                                    <div class="info-row"><span class="info-label">Sexo:</span> ${aluno.sexo === 'M' ? 'Masculino' : 'Feminino'}</div>
                                    <div class="info-row"><span class="info-label">Naturalidade:</span> ${aluno.naturalidade} - ${aluno.ufNaturalidade}</div>
                                    <div class="info-row"><span class="info-label">Nacionalidade:</span> ${aluno.nacionalidade}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-row"><span class="info-label">Cor/Raça:</span> ${aluno.corRaca}</div>
                                    <div class="info-row"><span class="info-label">CPF:</span> ${aluno.cpf}</div>
                                    <div class="info-row"><span class="info-label">RG:</span> ${aluno.rg}</div>
                                    <div class="info-row"><span class="info-label">Órgão Emissor:</span> ${aluno.orgaoEmissor}</div>
                                    <div class="info-row"><span class="info-label">NIS:</span> ${aluno.nis}</div>
                                </div>
                            </div>
                        </div>

                        <div class="info-section">
                            <h5>Endereço</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-row"><span class="info-label">Endereço:</span> ${aluno.endereco}</div>
                                    <div class="info-row"><span class="info-label">Bairro:</span> ${aluno.bairro}</div>
                                    <div class="info-row"><span class="info-label">CEP:</span> ${aluno.cep}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-row"><span class="info-label">Município:</span> ${aluno.municipio}</div>
                                    <div class="info-row"><span class="info-label">UF:</span> ${aluno.ufEndereco}</div>
                                </div>
                            </div>
                        </div>

                        <div class="info-section">
                            <h5>Contato</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-row"><span class="info-label">Telefone:</span> ${aluno.telefone}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-row"><span class="info-label">E-mail:</span> ${aluno.email}</div>
                                </div>
                            </div>
                        </div>

                        <div class="info-section">
                            <h5>Dados Acadêmicos</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-row"><span class="info-label">Ano Letivo:</span> ${aluno.anoLetivo}</div>
                                    <div class="info-row"><span class="info-label">Turma:</span> ${aluno.turma}</div>
                                    <div class="info-row"><span class="info-label">Turno:</span> ${aluno.turno}</div>
                                    <div class="info-row"><span class="info-label">Modalidade:</span> ${aluno.modalidade}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-row"><span class="info-label">Escola de Origem:</span> ${aluno.escolaOrigem}</div>
                                    <div class="info-row"><span class="info-label">Município Escola:</span> ${aluno.municipioEscola}</div>
                                    <div class="info-row"><span class="info-label">Data Matrícula:</span> ${aluno.dataMatricula}</div>
                                    <div class="info-row"><span class="info-label">Número Chamada:</span> ${aluno.numeroChamada}</div>
                                    <div class="info-row"><span class="info-label">Servidor Responsável:</span> ${aluno.servidorResponsavel}</div>
                                </div>
                            </div>
                        </div>

                        <div class="info-section">
                            <h5>Responsável</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-row"><span class="info-label">Nome:</span> ${aluno.responsavelNome}</div>
                                    <div class="info-row"><span class="info-label">Grau Parentesco:</span> ${aluno.responsavelGrauParentesco}</div>
                                    <div class="info-row"><span class="info-label">CPF:</span> ${aluno.responsavelCpf}</div>
                                    <div class="info-row"><span class="info-label">RG:</span> ${aluno.responsavelRg}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-row"><span class="info-label">Endereço:</span> ${aluno.responsavelEndereco}</div>
                                    <div class="info-row"><span class="info-label">Telefone:</span> ${aluno.responsavelTelefone}</div>
                                    <div class="info-row"><span class="info-label">E-mail:</span> ${aluno.responsavelEmail}</div>
                                    <div class="info-row"><span class="info-label">Profissão:</span> ${aluno.responsavelProfissao}</div>
                                </div>
                            </div>
                        </div>

                        <div class="info-section">
                            <h5>Saúde</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="info-row"><span class="info-label">Necessidade Específica:</span> ${aluno.necessidadeEspecifica}</div>
                                    <div class="info-row"><span class="info-label">Benefício Social:</span> ${aluno.beneficioSocial}</div>
                                    <div class="info-row"><span class="info-label">Medicação Contínua:</span> ${aluno.medicacaoContinua}</div>
                                    <div class="info-row"><span class="info-label">Alergias:</span> ${aluno.alergias}</div>
                                </div>
                            </div>
                        </div>

                        <div class="info-section">
                            <h5>Contato de Emergência</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-row"><span class="info-label">Nome:</span> ${aluno.contatoEmergencia}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-row"><span class="info-label">Telefone:</span> ${aluno.telefoneEmergencia}</div>
                                </div>
                            </div>
                        </div>

                        <div class="info-section">
                            <h5>Autorizações</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-row"><span class="info-label">Atividades:</span> ${aluno.autorizacaoAtividades ? '<span class="label label-success">Sim</span>' : '<span class="label label-danger">Não</span>'}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-row"><span class="info-label">Uso de Imagem:</span> ${aluno.autorizacaoUsoImagem ? '<span class="label label-success">Sim</span>' : '<span class="label label-danger">Não</span>'}</div>
                                </div>
                            </div>
                        </div>

                        <div class="info-section">
                            <h5>Documentos</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    ${aluno.certidaoNascimento ? `<a href="${aluno.certidaoNascimento}" class="btn btn-sm btn-info download-btn" download target="_blank"><i class="fa fa-download"></i> Certidão de Nascimento</a>` : ''}
                                    ${aluno.fotoAluno ? `<a href="${aluno.fotoAluno}" class="btn btn-sm btn-info download-btn" download target="_blank"><i class="fa fa-download"></i> Foto do Aluno</a>` : ''}
                                    ${aluno.carteiraVacinacao ? `<a href="${aluno.carteiraVacinacao}" class="btn btn-sm btn-info download-btn" download target="_blank"><i class="fa fa-download"></i> Carteira de Vacinação</a>` : ''}
                                    ${aluno.comprovanteResidencia ? `<a href="${aluno.comprovanteResidencia}" class="btn btn-sm btn-info download-btn" download target="_blank"><i class="fa fa-download"></i> Comprovante de Residência</a>` : ''}
                                    ${aluno.cartaoNis ? `<a href="${aluno.cartaoNis}" class="btn btn-sm btn-info download-btn" download target="_blank"><i class="fa fa-download"></i> Cartão NIS</a>` : ''}
                                    ${aluno.documentoAluno ? `<a href="${aluno.documentoAluno}" class="btn btn-sm btn-info download-btn" download target="_blank"><i class="fa fa-download"></i> Documento do Aluno</a>` : ''}
                                    ${aluno.documentoResponsavel ? `<a href="${aluno.documentoResponsavel}" class="btn btn-sm btn-info download-btn" download target="_blank"><i class="fa fa-download"></i> Documento do Responsável</a>` : ''}
                                </div>
                            </div>
                        </div>
                    `;

                $('#dadosAluno').html(html).show();
            },
            error: function(xhr, status, error) {
                $('#loadingModal').hide();
                $('#dadosAluno').html(
                    '<p class="text-danger">Erro ao carregar os dados do aluno.</p>').show();
                console.error("Erro:", error);
            }
        });
    });
    </script>
</body>

</html>