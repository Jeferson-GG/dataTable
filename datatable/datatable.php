<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable Responsivo com Bootstrap 5 e Input de Busca</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.0/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.0/js/dataTables.bootstrap5.min.js"></script>
    <!-- DataTables Responsive JS -->
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>
    <!-- DataTables Buttons CSS -->
    <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <style>
        .dataTables_length {
            margin-bottom: 10px;
            /* Adiciona uma margem inferior entre o seletor e os botões */
        }

        .dt-buttons {
            margin: 10px;
            /* Adiciona uma margem à esquerda dos botões para afastá-los do seletor */
        }

        .dt-buttons .btn {
            background-color: transparent !important;
            /* Remove o background */
            border: none;
            /* Remove a borda */
            color: inherit;
            /* Mantém a cor do texto */
            box-shadow: none;
            /* Remove sombras */
        }

        .dt-buttons .btn:hover {
            background-color: rgba(0, 0, 0, 0.2) !important;
            /* Adiciona um efeito de hover leve */
        }

        .no-bg-arrow {
            background-color: transparent !important;
            /* Remove o background */
            border: none;
            /* Remove a borda */
            box-shadow: none;
            /* Remove sombras */
        }

        /* Remove a seta padrão do dropdown */
        .no-bg-arrow::after {
            display: none !important;
        }

        /* Adiciona o hover */
        .no-bg-arrow:hover {
            background-color: rgba(0, 0, 0, 0.1) !important;
            /* Adiciona um fundo leve no hover */
            border-radius: 5px;
            /* Opcional: arredonda os cantos do botão no hover */
        }

        .dataTables_length,
        .dt-buttons {
            display: none;
            /* Oculta o seletor de quantidade e os botões por padrão */
        }
    </style>

</head>

<body>
    <div class="container mt-5">
        <h2>DataTable Responsivo com Input de Busca Bootstrap 5</h2>

        <!-- Modal -->
        <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="infoModalLabel">Informações Detalhadas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modalBodyContent">
                        <!-- Informações complementares serão inseridas aqui -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="d-flex justify-content-between mb-3">
            <!-- Campo de busca personalizado à esquerda -->
            <div class="flex-grow-1">
                <input type="text" id="customSearch" class="form-control" placeholder="Buscar..." style="width: 100%;">
            </div>

            <!-- Dropdown à direita -->
            <div class="ms-1">
                <div class="dropdown d-inline-block">
                    <button class="dropdown-toggle no-bg-arrow" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="assets/icons/dropdown.svg" alt="opções" style="height: 35px;">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#" id="toggleVisibility">Exibir Seletor e Botões</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Posição</th>
                        <th>Escritório</th>
                        <th>Idade</th>
                        <th>Data de Início</th>
                        <th>Salário</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>João Silva</td>
                        <td>Desenvolvedor</td>
                        <td>São Paulo</td>
                        <td>35</td>
                        <td>2022/03/15</td>
                        <td>R$ 5000</td>
                    </tr>
                    <tr>
                        <td>Ana Souza</td>
                        <td>Analista</td>
                        <td>Rio de Janeiro</td>
                        <td>28</td>
                        <td>2021/07/10</td>
                        <td>R$ 4500</td>
                    </tr>
                    <!-- Adicione mais linhas conforme necessário -->
                </tbody>
            </table>
        </div>

    </div>

    <script>
        $(document).ready(function () {
            // Inicializa DataTables
            var table = $('#example').DataTable({
                responsive: true,
                language: {
                    "url": "https://cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json",
                    "paginate": {
                        "first": "<<", // Setas para "Primeiro"
                        "last": ">>",  // Setas para "Último"
                        "next": ">",   // Seta para "Próximo"
                        "previous": "<" // Seta para "Anterior"
                    }
                },
                pagingType: "full_numbers",
                dom: 'lBrtip', // Seletor de quantidade e botões de exportação (ocultos por padrão)
                buttons: [
                    {
                        extend: 'csv',
                        text: '<img src="assets/icons/csv.svg" alt="CSV" style="height: 40px;">',
                    },
                    {
                        extend: 'excel',
                        text: '<img src="assets/icons/xls.svg" alt="Excel" style="height: 40px;">',
                    },
                    {
                        extend: 'pdf',
                        text: '<img src="assets/icons/pdf.svg" alt="PDF" style="height: 40px;">',
                    },
                    {
                        extend: 'print',
                        text: '<img src="assets/icons/impressora.svg" alt="Imprimir" style="height: 40px;">',
                    }
                ]
            });

            // Campo de busca personalizado
            $('#customSearch').on('keyup', function () {
                table.search(this.value).draw();
            });

            // Alternar visibilidade do seletor e dos botões
            $('#toggleVisibility').on('click', function (e) {
                e.preventDefault();
                var lengthControl = $('.dataTables_length');
                var buttons = $('.dt-buttons');

                if (lengthControl.is(':visible') && buttons.is(':visible')) {
                    lengthControl.hide();
                    buttons.hide();
                    $('#toggleVisibility').text('Exibir Seletor e Botões');
                } else {
                    lengthControl.show();
                    buttons.show();
                    $('#toggleVisibility').text('Ocultar Seletor e Botões');
                }
            });

            // Função para desativar a expansão padrão ao clicar no ícone "+"
            $('#example tbody').on('click', 'td.dtr-control', function (e) {
                e.stopImmediatePropagation(); // Bloqueia o comportamento padrão da expansão

                var tr = $(this).closest('tr'); // Obtém a linha clicada
                var row = table.row(tr); // Obtém os dados da linha

                // Captura os dados da linha e preenche o modal
                var data = row.data();
                var content = `
                    <p><strong>Nome:</strong> ${data[0]}</p>
                    <p><strong>Posição:</strong> ${data[1]}</p>
                    <p><strong>Escritório:</strong> ${data[2]}</p>
                    <p><strong>Idade:</strong> ${data[3]}</p>
                    <p><strong>Data de Início:</strong> ${data[4]}</p>
                    <p><strong>Salário:</strong> ${data[5]}</p>
                `;
                $('#modalBodyContent').html(content);

                // Abre o modal
                $('#infoModal').modal('show');
            });
        });
    </script>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

</body>

</html>