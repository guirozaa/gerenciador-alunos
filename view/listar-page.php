<?php
require "../sgc/verifica.php";
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
        /* Override de estilos específicos para a lista */
        body {
            background: linear-gradient(135deg, #eff6ff 0%, #e0e7ff 30%, #d1fae5 60%);
            padding: 2rem 0;
        }

        .page-header {
            text-align: center;
            margin-bottom: 3rem;
            animation: fadeInUp 0.8s ease-out;
        }

        .page-header h1 {
            font-size: 3.5rem;
            font-weight: 900;
            letter-spacing: -0.02em;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #2563eb 0%, #4f46e5 50%, #10b981 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-header p {
            font-size: 1.1rem;
            color: #6b7280;
            font-weight: 300;
        }

        /* Card da tabela */
        .table-card {
            background: rgba(255, 255, 255, 0.85);
            padding: 2rem;
            border-radius: 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(12px);
            animation: fadeInUp 0.8s ease-out 0.2s backwards;
        }

        .table-responsive {
            border-radius: 1rem;
            overflow: hidden;
        }

        .table {
            margin-bottom: 0;
            background: white;
        }

        .table thead {
            background: linear-gradient(135deg, #3b82f6 0%, #6366f1 100%);
        }

        .table thead th {
            color: white;
            font-weight: 600;
            border: none;
            padding: 1rem;
            text-transform: uppercase;
            font-size: 0.875rem;
            letter-spacing: 0.05em;
        }

        .table tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid #e5e7eb;
        }

        .table tbody tr:hover {
            background: #f9fafb;
            transform: scale(1.01);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border: none;
        }

        .table tbody td img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .table tbody tr:hover td img {
            border-color: #3b82f6;
            transform: scale(1.1);
        }

        .user-link {
            font-weight: 600;
            color: #1f2937;
            font-size: 1.1rem;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .user-link:hover {
            color: #3b82f6;
        }

        .user-subhead {
            display: block;
            color: #6b7280;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .label {
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
            font-size: 0.875rem;
        }

        .label-default {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: white;
        }

        /* Botões de ação */
        .table-link {
            display: inline-block;
            margin: 0 0.25rem;
            transition: all 0.3s ease;
        }

        .table-link:hover {
            transform: translateY(-3px);
        }

        .fa-stack {
            width: 2em;
            height: 2em;
        }

        .table-link .fa-square {
            color: #3b82f6;
            transition: all 0.3s ease;
        }

        .table-link:hover .fa-square {
            color: #2563eb;
        }

        .table-link.danger .fa-square {
            color: #ef4444;
        }

        .table-link.danger:hover .fa-square {
            color: #dc2626;
        }

        /* Modal */
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-backdrop.in {
            opacity: 0.4;
        }

        .modal {
            z-index: 1050;
        }

        .modal-dialog {
            z-index: 1051;
        }

        .modal-content {
            border-radius: 1.5rem;
            border: none;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            animation: modalFadeIn 0.3s ease-out;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-header {
            background: linear-gradient(135deg, #3b82f6 0%, #6366f1 100%);
            color: white;
            border-radius: 1.5rem 1.5rem 0 0;
            padding: 1.5rem 2rem;
            border: none;
        }

        .modal-header .close {
            color: white;
            opacity: 0.8;
            text-shadow: none;
        }

        .modal-header .close:hover {
            opacity: 1;
        }

        .modal-title {
            font-weight: 700;
            font-size: 1.5rem;
        }

        .modal-body {
            padding: 2rem;
        }

        .modal-footer {
            border-top: 1px solid #e5e7eb;
            padding: 1.5rem 2rem;
        }

        .info-section {
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .info-section:last-child {
            border-bottom: none;
        }

        .info-section h5 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #3b82f6;
            display: inline-block;
        }

        .info-row {
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
            color: #4b5563;
        }

        .info-label {
            font-weight: 600;
            color: #374151;
        }

        .download-btn {
            margin: 0.5rem 0.5rem 0.5rem 0;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
        }

        .download-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        /* Botões do modal */
        .btn-default {
            background: #f3f4f6;
            color: #374151;
            border: none;
            border-radius: 0.75rem;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-default:hover {
            background: #e5e7eb;
            transform: translateY(-2px);
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            border: none;
            border-radius: 0.75rem;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        /* Loading */
        #loadingModal {
            padding: 3rem;
        }

        #loadingModal .fa-spinner {
            color: #3b82f6;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2.5rem;
            }

            .table-card {
                padding: 1rem;
            }

            .table {
                font-size: 0.875rem;
            }

            .table thead th {
                padding: 0.75rem 0.5rem;
                font-size: 0.75rem;
            }

            .table tbody td {
                padding: 0.75rem 0.5rem;
            }
        }

        /* Animações */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <!-- Elementos decorativos -->
    <div class="bg-decoration bg-decoration-1"></div>
    <div class="bg-decoration bg-decoration-2"></div>


    <div class="container">
        <a href="./home-page.php" class="link-back-form">
            <button class="link-back btn btn-add">
                <span class="btn-text">Voltar</span>
            </button>
        </a>
        <div class="page-header">
            <h1>Alunos</h1>
            <p>Gerencie os alunos cadastrados no sistema</p>
        </div>

        <div>
            <button onclick="window.location.href='../scripts/exportar_csv.php'">
                Exportar para CSV
            </button>
        </div>
        <div class="table-card">
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
                        <!-- Dados carregados via AJAX -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal de Visualização -->
        <div id="modalAluno" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">📋 Detalhes do Aluno</h4>
                    </div>
                    <div class="modal-body">
                        <div id="loadingModal" style="text-align: center;">
                            <i class="fa fa-spinner fa-spin fa-3x"></i>
                            <p>Carregando...</p>
                        </div>
                        <div id="dadosAluno" style="display: none;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de Confirmação de Exclusão -->
        <div id="modalConfirmarExclusao" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">
                            <i class="fa fa-exclamation-triangle"></i> Confirmar Exclusão
                        </h4>
                    </div>
                    <div class="modal-body">
                        <p style="font-size: 16px;">Tem certeza que deseja excluir este aluno?</p>
                        <p class="text-danger"><strong>Esta ação não poderá ser desfeita!</strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <i class="fa fa-times"></i> Cancelar
                        </button>
                        <button type="button" id="btnConfirmarDelete" class="btn btn-danger">
                            <i class="fa fa-trash-o"></i> Deletar
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de Edição de Aluno -->
        <div class="modal fade" id="modalEditarAluno" tabindex="-1" role="dialog"
            aria-labelledby="modalEditarAlunoLabel">
            <div class="modal-dialog modal-lg" role="document" style="max-width: 90%; width: 1200px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="modalEditarAlunoLabel">
                            <i class="fa fa-edit"></i> Editar Dados do Aluno
                        </h4>
                    </div>
                    <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                        <!-- Loading -->
                        <div id="loadingModalEditar" style="text-align: center; padding: 30px;">
                            <i class="fa fa-spinner fa-spin fa-3x"></i>
                            <p>Carregando dados...</p>
                        </div>

                        <!-- Formulário -->
                        <div id="formEditarAluno" style="display: none;"></div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .info-section {
                background-color: #f9f9f9;
                padding: 20px;
                margin-bottom: 20px;
                border-radius: 5px;
                border-left: 4px solid #3c8dbc;
            }

            .info-section h5 {
                margin-top: 0;
                margin-bottom: 20px;
                color: #3c8dbc;
                font-weight: bold;
                border-bottom: 2px solid #e0e0e0;
                padding-bottom: 10px;
            }

            .form-group {
                margin-bottom: 15px;
            }

            .form-group label {
                font-weight: 600;
                color: #555;
                margin-bottom: 5px;
            }

            .form-control {
                border-radius: 4px;
            }

            .text-muted.small {
                font-size: 12px;
                margin-bottom: 5px;
            }

            .alert {
                margin-bottom: 20px;
            }

            #modalEditarAluno .modal-body {
                padding: 20px 30px;
            }

            /* Estilo para inputs de arquivo */
            input[type="file"] {
                padding: 5px;
            }

            /* Estilo para checkboxes */
            input[type="checkbox"] {
                margin-right: 8px;
            }
        </style>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        var alunoIdParaDeletar = null;

        $(document).ready(function() {
            getdata();
        });

        function getdata() {
            $.ajax({
                type: "GET",
                url: "../scripts/lista.php",
                success: function(response) {
                    $(".dados_alunos").empty();

                    $.each(response, function(key, aluno) {
                        $(".dados_alunos").append(`
                    <tr>
                        <td>
                            <img src="${aluno.fotoAluno}" alt="avatar" />
                            <a href="#" class="user-link">${aluno.nomeCompleto}</a>
                            <span class="user-subhead">${aluno.turma} - ${aluno.turno}</span>
                        </td>
                        <td class="text-center">${aluno.idade}</td>
                        <td class="text-center">
                            <span class="label label-default">${aluno.sexo}</span>
                        </td>
                        <td class="text-center">
                            <a href="#">${aluno.telefone || aluno.responsavelTelefone}</a>
                        </td>
                        <td class="text-center">
                            <a href="#" class="table-link btn-visualizar" data-cpf="${aluno.cpf}">
                                <span class="fa-stack">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                            <a href="#" class="table-link btn-editar" data-cpf="${aluno.cpf}" data-id="${aluno.id}" >
                                <span class="fa-stack">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                            <a href="#" class="table-link btn-delete danger" data-id="${aluno.id}" data-cpf="${aluno.cpf}">
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

        $(document).on('click', '.btn-visualizar', function(e) {
            e.preventDefault();

            var alunoCpf = $(this).data('cpf');

            $('#modalAluno').modal('show');
            $('#loadingModal').show();
            $('#dadosAluno').hide();

            $.ajax({
                type: "GET",
                url: "../scripts/detalhes_aluno.php",
                data: {
                    cpf: alunoCpf
                },
                dataType: "json",
                success: function(aluno) {
                    $('#loadingModal').hide();

                    let html = `
                        <div class="info-section">
                            <h5>👤 Dados Pessoais</h5>
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
                            <h5>📍 Endereço</h5>
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
                            <h5>📞 Contato</h5>
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
                            <h5>🎓 Dados Acadêmicos</h5>
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
                            <h5>👨‍👩‍👧 Responsável</h5>
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
                            <h5>🏥 Saúde</h5>
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
                            <h5>🚨 Contato de Emergência</h5>
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
                            <h5>✅ Autorizações</h5>
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
                            <h5>📄 Documentos</h5>
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

        // isso aqui vai fazer o modal com id modalConfirmarExclusao aparecer
        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            alunoIdParaDeletar = $(this).data('id');
            alunoCpfParaDeletar = $(this).data('cpf');
            $('#modalConfirmarExclusao').modal('show');
        });

        // aqui é o botão de confirmação do modal, quando é apertado aciona essa função
        $(document).on('click', '#btnConfirmarDelete', function(e) {
            e.preventDefault();

            $(this).prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Deletando...');

            $.ajax({
                type: "POST",
                url: "../scripts/delete_aluno.php",
                data: {
                    id: alunoIdParaDeletar,
                    cpf: alunoCpfParaDeletar
                },
                dataType: "json",
                success: function(response) {
                    $('#modalConfirmarExclusao').modal('hide');
                    $('#btnConfirmarDelete').prop('disabled', false).html(
                        '<i class="fa fa-trash-o"></i> Deletar');
                    alert('Aluno excluído com sucesso!');
                    $(".dados_alunos").empty();
                    getdata();
                },
                error: function(xhr, status, error) {
                    $('#modalConfirmarExclusao').modal('hide');
                    $('#btnConfirmarDelete').prop('disabled', false).html(
                        '<i class="fa fa-trash-o"></i> Deletar');
                    alert('Erro ao excluir aluno. Tente novamente.');
                    console.error("Erro:", error);
                    console.log("Resposta:", xhr.responseText);
                }
            });
        });

        $(document).on('click', '.btn-editar', function(e) {
            e.preventDefault();

            var alunoCpf = $(this).data('cpf');
            var alunoId = $(this).data('id');

            $('#modalEditarAluno').modal('show');
            $('#loadingModalEditar').show();
            $('#formEditarAluno').hide();

            // Busca os dados atuais do aluno
            $.ajax({
                type: "GET",
                url: "../scripts/detalhes_aluno.php",
                data: {
                    cpf: alunoCpf
                },
                dataType: "json",
                success: function(aluno) {
                    $('#loadingModalEditar').hide();

                    // Preenche o formulário com os dados atuais
                    let html = `
                <form id="formDadosAluno" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="${alunoId}">
                    
                    <div class="info-section">
                        <h5>👤 Dados Pessoais</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome Completo:</label>
                                    <input type="text" class="form-control" name="nome_completo" value="${aluno.nomeCompleto || ''}" required>
                                </div>
                                <div class="form-group">
                                    <label>Data de Nascimento:</label>
                                    <input type="date" class="form-control" name="data_nascimento" value="${aluno.dataNascimento || ''}" required>
                                </div>
                                <div class="form-group">
                                    <label>Idade:</label>
                                    <input type="number" class="form-control" name="idade" value="${aluno.idade || ''}" required>
                                </div>
                                <div class="form-group">
                                    <label>Sexo:</label>
                                    <select class="form-control" name="sexo" required>
                                        <option value="M" ${aluno.sexo === 'M' ? 'selected' : ''}>Masculino</option>
                                        <option value="F" ${aluno.sexo === 'F' ? 'selected' : ''}>Feminino</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Naturalidade:</label>
                                    <input type="text" class="form-control" name="naturalidade" value="${aluno.naturalidade || ''}">
                                </div>
                                <div class="form-group">
                                    <label>UF Naturalidade:</label>
                                    <input type="text" class="form-control" name="uf_naturalidade" value="${aluno.ufNaturalidade || ''}" maxlength="2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nacionalidade:</label>
                                    <input type="text" class="form-control" name="nacionalidade" value="${aluno.nacionalidade || ''}">
                                </div>
                                <div class="form-group">
                                    <label>Cor/Raça:</label>
                                    <input type="text" class="form-control" name="cor_raca" value="${aluno.corRaca || ''}">
                                </div>
                                <div class="form-group">
                                    <label>CPF:</label>
                                    <input type="text" class="form-control" name="cpf" value="${aluno.cpf || ''}" required>
                                </div>
                                <div class="form-group">
                                    <label>RG:</label>
                                    <input type="text" class="form-control" name="rg" value="${aluno.rg || ''}">
                                </div>
                                <div class="form-group">
                                    <label>Órgão Emissor:</label>
                                    <input type="text" class="form-control" name="orgao_emissor" value="${aluno.orgaoEmissor || ''}">
                                </div>
                                <div class="form-group">
                                    <label>NIS:</label>
                                    <input type="text" class="form-control" name="nis" value="${aluno.nis || ''}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="info-section">
                        <h5>📍 Endereço</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Endereço:</label>
                                    <input type="text" class="form-control" name="endereco" value="${aluno.endereco || ''}">
                                </div>
                                <div class="form-group">
                                    <label>Bairro:</label>
                                    <input type="text" class="form-control" name="bairro" value="${aluno.bairro || ''}">
                                </div>
                                <div class="form-group">
                                    <label>CEP:</label>
                                    <input type="text" class="form-control" name="cep" value="${aluno.cep || ''}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Município:</label>
                                    <input type="text" class="form-control" name="municipio" value="${aluno.municipio || ''}">
                                </div>
                                <div class="form-group">
                                    <label>UF:</label>
                                    <input type="text" class="form-control" name="uf_endereco" value="${aluno.ufEndereco || ''}" maxlength="2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="info-section">
                        <h5>📞 Contato</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telefone:</label>
                                    <input type="text" class="form-control" name="telefone" value="${aluno.telefone || ''}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>E-mail:</label>
                                    <input type="email" class="form-control" name="email" value="${aluno.email || ''}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="info-section">
                        <h5>🎓 Dados Acadêmicos</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ano Letivo:</label>
                                    <input type="text" class="form-control" name="ano_letivo" value="${aluno.anoLetivo || ''}">
                                </div>
                                <div class="form-group">
                                    <label>Turma:</label>
                                    <input type="text" class="form-control" name="turma" value="${aluno.turma || ''}">
                                </div>
                                <div class="form-group">
                                    <label>Turno:</label>
                                    <input type="text" class="form-control" name="turno" value="${aluno.turno || ''}">
                                </div>
                                <div class="form-group">
                                    <label>Modalidade:</label>
                                    <input type="text" class="form-control" name="modalidade" value="${aluno.modalidade || ''}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Escola de Origem:</label>
                                    <input type="text" class="form-control" name="escola_origem" value="${aluno.escolaOrigem || ''}">
                                </div>
                                <div class="form-group">
                                    <label>Município Escola:</label>
                                    <input type="text" class="form-control" name="municipio_escola" value="${aluno.municipioEscola || ''}">
                                </div>
                                <div class="form-group">
                                    <label>Data Matrícula:</label>
                                    <input type="date" class="form-control" name="data_matricula" value="${aluno.dataMatricula || ''}">
                                </div>
                                <div class="form-group">
                                    <label>Número Chamada:</label>
                                    <input type="text" class="form-control" name="numero_chamada" value="${aluno.numeroChamada || ''}">
                                </div>
                                <div class="form-group">
                                    <label>Servidor Responsável:</label>
                                    <input type="text" class="form-control" name="servidor_responsavel" value="${aluno.servidorResponsavel || ''}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="info-section">
                        <h5>👨‍👩‍👧 Responsável</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome:</label>
                                    <input type="text" class="form-control" name="responsavel_nome" value="${aluno.responsavelNome || ''}">
                                </div>
                                <div class="form-group">
                                    <label>Grau Parentesco:</label>
                                    <input type="text" class="form-control" name="responsavel_grau_parentesco" value="${aluno.responsavelGrauParentesco || ''}">
                                </div>
                                <div class="form-group">
                                    <label>CPF:</label>
                                    <input type="text" class="form-control" name="responsavel_cpf" value="${aluno.responsavelCpf || ''}">
                                </div>
                                <div class="form-group">
                                    <label>RG:</label>
                                    <input type="text" class="form-control" name="responsavel_rg" value="${aluno.responsavelRg || ''}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Endereço:</label>
                                    <input type="text" class="form-control" name="responsavel_endereco" value="${aluno.responsavelEndereco || ''}">
                                </div>
                                <div class="form-group">
                                    <label>Telefone:</label>
                                    <input type="text" class="form-control" name="responsavel_telefone" value="${aluno.responsavelTelefone || ''}">
                                </div>
                                <div class="form-group">
                                    <label>E-mail:</label>
                                    <input type="email" class="form-control" name="responsavel_email" value="${aluno.responsavelEmail || ''}">
                                </div>
                                <div class="form-group">
                                    <label>Profissão:</label>
                                    <input type="text" class="form-control" name="responsavel_profissao" value="${aluno.responsavelProfissao || ''}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="info-section">
                        <h5>🏥 Saúde</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Necessidade Específica:</label>
                                    <textarea class="form-control" name="necessidade_especifica" rows="2">${aluno.necessidadeEspecifica || ''}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Benefício Social:</label>
                                    <input type="text" class="form-control" name="beneficio_social" value="${aluno.beneficioSocial || ''}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Medicação Contínua:</label>
                                    <textarea class="form-control" name="medicacao_continua" rows="2">${aluno.medicacaoContinua || ''}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Alergias:</label>
                                    <textarea class="form-control" name="alergias" rows="2">${aluno.alergias || ''}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="info-section">
                        <h5>🚨 Contato de Emergência</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome:</label>
                                    <input type="text" class="form-control" name="contato_emergencia" value="${aluno.contatoEmergencia || ''}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telefone:</label>
                                    <input type="text" class="form-control" name="telefone_emergencia" value="${aluno.telefoneEmergencia || ''}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="info-section">
                        <h5>✅ Autorizações</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="autorizacao_atividades" value="1" ${aluno.autorizacaoAtividades ? 'checked' : ''}>
                                        Autorização para Atividades
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="autorizacao_uso_imagem" value="1" ${aluno.autorizacaoUsoImagem ? 'checked' : ''}>
                                        Autorização de Uso de Imagem
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="info-section">
                        <h5>📄 Documentos</h5>
                        <p class="text-muted">Envie novos arquivos apenas se desejar substituir os existentes</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Foto do Aluno:</label>
                                    ${aluno.fotoAluno ? `<div class="text-muted small">Arquivo atual: <a href="${aluno.fotoAluno}" target="_blank">Ver arquivo</a></div>` : ''}
                                    <input type="file" class="form-control" name="foto_aluno" accept="image/*">
                                </div>
                                <div class="form-group">
                                    <label>Certidão de Nascimento:</label>
                                    ${aluno.certidaoNascimento ? `<div class="text-muted small">Arquivo atual: <a href="${aluno.certidaoNascimento}" target="_blank">Ver arquivo</a></div>` : ''}
                                    <input type="file" class="form-control" name="certidao_nascimento" accept=".pdf,image/*">
                                </div>
                                <div class="form-group">
                                    <label>Carteira de Vacinação:</label>
                                    ${aluno.carteiraVacinacao ? `<div class="text-muted small">Arquivo atual: <a href="${aluno.carteiraVacinacao}" target="_blank">Ver arquivo</a></div>` : ''}
                                    <input type="file" class="form-control" name="carteira_vacinacao" accept=".pdf,image/*">
                                </div>
                                <div class="form-group">
                                    <label>Comprovante de Residência:</label>
                                    ${aluno.comprovanteResidencia ? `<div class="text-muted small">Arquivo atual: <a href="${aluno.comprovanteResidencia}" target="_blank">Ver arquivo</a></div>` : ''}
                                    <input type="file" class="form-control" name="comprovante_residencia" accept=".pdf,image/*">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Cartão NIS:</label>
                                    ${aluno.cartaoNis ? `<div class="text-muted small">Arquivo atual: <a href="${aluno.cartaoNis}" target="_blank">Ver arquivo</a></div>` : ''}
                                    <input type="file" class="form-control" name="cartao_nis" accept=".pdf,image/*">
                                </div>
                                <div class="form-group">
                                    <label>Documento do Aluno:</label>
                                    ${aluno.documentoAluno ? `<div class="text-muted small">Arquivo atual: <a href="${aluno.documentoAluno}" target="_blank">Ver arquivo</a></div>` : ''}
                                    <input type="file" class="form-control" name="documento_aluno" accept=".pdf,image/*">
                                </div>
                                <div class="form-group">
                                    <label>Documento do Responsável:</label>
                                    ${aluno.documentoResponsavel ? `<div class="text-muted small">Arquivo atual: <a href="${aluno.documentoResponsavel}" target="_blank">Ver arquivo</a></div>` : ''}
                                    <input type="file" class="form-control" name="documento_responsavel" accept=".pdf,image/*">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Salvar Alterações
                        </button>
                    </div>
                </form>
            `;

                    $('#formEditarAluno').html(html).show();
                },
                error: function(xhr, status, error) {
                    $('#loadingModalEditar').hide();

                    console.error("Erro completo:", xhr.responseText);

                    let mensagemErro = 'Erro ao carregar os dados do aluno.';

                    // Tenta fazer parse do JSON se possível
                    try {
                        let response = JSON.parse(xhr.responseText);
                        if (response.erro) {
                            mensagemErro = response.erro;
                        }
                    } catch (e) {
                        // Se não for JSON, mostra erro genérico
                        console.error("Resposta não é JSON:", xhr.responseText);
                    }

                    $('#formEditarAluno').html(
                        `<div class="alert alert-danger">
                    <i class="fa fa-exclamation-triangle"></i> ${mensagemErro}
                </div>`
                    ).show();
                }
            });
        });

        // Submissão do formulário de edição
        $(document).on('submit', '#formDadosAluno', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            // Mostra loading
            $('#formEditarAluno').prepend(
                '<div id="loadingSave" class="alert alert-info"><i class="fa fa-spinner fa-spin"></i> Salvando alterações...</div>'
            );

            // Desabilita o botão de submit
            $('#formDadosAluno button[type="submit"]').prop('disabled', true);

            $.ajax({
                type: "POST",
                url: "../scripts/update_aluno.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#loadingSave').remove();

                    // Verifica se a resposta é string e tenta fazer parse
                    if (typeof response === 'string') {
                        try {
                            response = JSON.parse(response);
                        } catch (e) {
                            console.error("Erro ao fazer parse da resposta:", response);
                            $('#formEditarAluno').prepend(
                                '<div class="alert alert-danger alert-dismissible">' +
                                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                '<i class="fa fa-exclamation-triangle"></i> Erro: Resposta inválida do servidor' +
                                '</div>'
                            );
                            $('#formDadosAluno button[type="submit"]').prop('disabled', false);
                            return;
                        }
                    }

                    // Mostra mensagem de sucesso
                    $('#formEditarAluno').prepend(
                        '<div class="alert alert-success alert-dismissible">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<i class="fa fa-check"></i> ' + (response.mensagem ||
                            'Aluno atualizado com sucesso!') +
                        '</div>'
                    );

                    // Fecha o modal após 2 segundos e recarrega a página
                    setTimeout(function() {
                        $('#modalEditarAluno').modal('hide');
                        location.reload();
                    }, 2000);
                },
                error: function(xhr, status, error) {
                    $('#loadingSave').remove();
                    $('#formDadosAluno button[type="submit"]').prop('disabled', false);

                    console.error("Erro completo:", xhr.responseText);
                    console.error("Status:", status);
                    console.error("Error:", error);

                    let mensagemErro = 'Erro ao atualizar os dados do aluno.';

                    // Tenta extrair mensagem de erro do JSON
                    try {
                        let response = JSON.parse(xhr.responseText);
                        if (response.erro) {
                            mensagemErro = response.erro;
                        }
                        if (response.detalhes) {
                            mensagemErro += ' Detalhes: ' + response.detalhes;
                        }
                    } catch (e) {
                        // Se não for JSON válido, mostra o conteúdo
                        console.error("Resposta não é JSON válido:", xhr.responseText);
                        if (xhr.responseText) {
                            mensagemErro += ' (Verifique o console para mais detalhes)';
                        }
                    }

                    $('#formEditarAluno').prepend(
                        '<div class="alert alert-danger alert-dismissible">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<i class="fa fa-exclamation-triangle"></i> ' + mensagemErro +
                        '</div>'
                    );
                }
            });
        });
    </script>
</body>

</html>