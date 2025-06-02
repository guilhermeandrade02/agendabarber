@extends('schedule.layout')

@section('content')
    <div class="" style="height: 600px; overflow-y: auto;">
        <header>
            <center>
                <div class="mes"></div>
            </center>
            <div class="semana-wrapper">
                <button class="btn btn-primary semana-anterior">&lt;</button>
                <div class="dias-semana"> </div>
                <button class="btn btn-primary semana-seguinte">&gt;</button>
            </div>
        </header><br>
        <hr class="my-4 hr">
        <div class="mt-5">
            <h6 style="margin-right: 20px;">Selecione um profissional:</h6>
            <div class="mt-4" style="display: flex; align-items: center;">
                @foreach ($employees as $employee)
                    <div class="payment-method nome"
                        onclick="toggleOptionMarca('{{ $employee->id }}', '{{ $employee->name }}')"
                        data-option="{{ $employee->name }}">
                        {{ $employee->name }}
                    </div>
                @endforeach
            </div>
        </div>
        <hr class="my-4 hr">
        @foreach ($employees as $employee)
            <div id="{{ $employee->name }}Options" class="optioMarca" style="display: none;">
                <h6 style="margin-right: 20px;">Horários disponíveis para {{ $employee->name }}</h6>
                <div class="container-fluid">
                    <div class="row mx-auto mt-3">
                        <div class="mt-1" id="col-{{ $employee->id }}">
                            <!-- Aqui serão inseridos os horários disponíveis conforme o profissional selecionado -->
                        </div>
                    </div>
                    <!-- Botão para enviar os dados selecionados -->
                    {{-- <button class="btn btn-primary mt-3 agendar-btn" onclick="agendarHorario('{{ $employee->id }}')">Agendar</button> --}}
                    <button class="btn btn-primary mt-3 agendar-btn" id="botao-agendar{{ $employee->id }}"
                        data-professional-id="{{ $employee->id }}">Agendar</button>

                </div>
            </div>
            <div id="modal-agendamento{{ $employee->id }}" class="modal" style="display: none;">
                <div class="modal-conteudo-confirmacao" style="height: 550px;">
                    <button type="button" class="close" aria-label="Close" onclick="fecharModal('{{ $employee->id }}')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="profissional">
                        <iconify-icon icon="octicon:feed-person-16" style="font-size:60px;"></iconify-icon>
                        <div class="info-profissional">
                            <div>
                                <span class="nome-profissional"><b>{{ $employee->name }}</b></span>
                            </div>
                            <div>
                                <span class="observacao" id="data"></span>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4 hr mt-1">
                    <h5>{{ $service->title }}</h5>
                    <p>{{ $employee->id }} - {{ $service->name }}</p>
                    <p>R$ {{ $service->value }}</p>
                    <p id="horario"></p>
                    <p id="datas"></p>
                    <hr class="my-4 hr">
                    <div class="observacao">
                        <label for="observacao">Alguma observação?</label>
                        <input type="text" class="form-control " placeholder="observação" aria-label="Username"
                            aria-describedby="basic-addon1" style="background: #0a021d;color: white;">
                    </div>
                    <div class="modal-footer d-flex justify-content-center align-items-center">
                        <button class="btn btn-primary mt-3 agendar-btn"
                            onclick="agendarHorario('{{ $employee->id }}')">Agendar</button>
                    </div>



                </div>
            </div>
        @endforeach


    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Função para fechar o modal
        function fecharModal(employeeId) {
            var modalId = 'modal-agendamento' + employeeId;
            var modal = document.getElementById(modalId);
            modal.style.display = 'none';
        }
        var horarioSelecionado = null;
        var mesSelecionado = null;
        var diaSelecionadoNum = null; // Definida como variável global
        var employeeIdSelecionado = null; // Definindo employeeIdSelecionado globalmente
        var semanaAtual = moment(); // Definindo semanaAtual globalmente
        var service = {{ $service->id }};
        var mes = null;

        // Função para enviar os dados selecionados via AJAX
        function agendarHorario(employeeId) {
            if (diaSelecionado !== null && employeeIdSelecionado !== null) {
                diaSelecionadoNum = parseInt(diaSelecionado.querySelector('.numero-dia').textContent, 10);
                mesSelecionado = semanaAtual.month() + 1; // Mês atual

                // Capturar o horário selecionado
                horarioSelecionado = null;
                var horarios = document.querySelectorAll('#col-' + employeeId + ' button');
                horarios.forEach(function(button) {
                    if (button.classList.contains('horario-selecionado')) {
                        horarioSelecionado = button.textContent.trim();
                    }
                });

                if (horarioSelecionado === null) {
                    alert('Selecione um horário antes de agendar.');
                    return;
                }

                // Realizar a requisição AJAX
                $.ajax({
                    url: '/agendarHorario',
                    method: 'POST',
                    data: {
                        employeeId: employeeIdSelecionado,
                        mes: mesSelecionado,
                        dia: diaSelecionadoNum,
                        service: service,
                        horario: horarioSelecionado,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert('Horário agendado com sucesso!');
                        // Aqui você pode adicionar lógica adicional após o agendamento
                    },
                    error: function() {
                        alert('Erro ao agendar horário');
                    }
                });
            } else {
                alert('Selecione um dia e um profissional antes de agendar.');
            }
        }

        // Função para buscar os horários disponíveis
        function buscarHorarios(employeeId, mes, dia) {
            $.ajax({
                url: '/getHorarios/' + employeeId,
                method: 'GET',
                data: {
                    mes: mes,
                    dia: dia,
                    service: service
                },
                success: function(data) {

                    var colElement = document.getElementById('col-' + employeeId);
                    colElement.innerHTML = ''; // Limpa os horários anteriores

                    // Adiciona os novos horários
                    data.forEach(function(horario) {
                        // Extrair a hora e os minutos da string de horário
                        var horaMinutos = horario.slice(0,
                            5); // Extrai os primeiros 5 caracteres (hh:mm)

                        // Criar o botão com a hora e minutos formatados
                        var horarioButton = document.createElement('button');
                        horarioButton.classList.add('btn', 'btn-primary', 'm-1', 'col-3');
                        horarioButton.textContent =
                            horaMinutos; // Define o texto do botão como hora:minutos

                        // Adicionar evento de clique para selecionar o horário
                        horarioButton.addEventListener('click', function() {
                            // Remover a seleção do horário anterior
                            var horariosAnteriores = colElement.querySelectorAll('button');
                            horariosAnteriores.forEach(function(btn) {
                                btn.classList.remove('horario-selecionado');
                            });

                            // Adicionar seleção ao novo horário
                            this.classList.add('horario-selecionado');
                            horarioSelecionado = this.textContent.trim();
                        });

                        // Adicionar o botão à coluna (colElement é onde você está anexando os botões)
                        colElement.appendChild(horarioButton);
                    });

                },
                error: function() {
                    alert('Erro ao buscar horários');
                }
            });
        }

        // Função para alternar a seleção de profissional
        function toggleOptionMarca(employeeId, nome) {
            var options = document.getElementsByClassName('optioMarca');
            for (var i = 0; i < options.length; i++) {
                options[i].style.display = 'none';
            }

            var selectedOptions = document.getElementById(nome + 'Options');
            if (selectedOptions) {
                selectedOptions.style.display = 'block';
            }

            var allNames = document.querySelectorAll('.nome');
            allNames.forEach(function(elem) {
                elem.classList.remove('selected');
            });

            var selectedName = document.querySelector('.nome[data-option="' + nome + '"]');
            if (selectedName) {
                selectedName.classList.add('selected');
            }

            employeeIdSelecionado = employeeId;

            // Verificar se há diaSelecionado definido
            if (diaSelecionado !== null) {
                diaSelecionadoNum = parseInt(diaSelecionado.querySelector('.numero-dia').textContent, 10);
                mesSelecionado = semanaAtual.month() +
                    1; // Adiciona 1 ao mês para obter o mês correto (Moment.js retorna de 0 a 11)

                // Se ambos dia e profissional estiverem selecionados, buscar horários
                if (employeeIdSelecionado !== null) {
                    buscarHorarios(employeeIdSelecionado, mesSelecionado, diaSelecionadoNum);
                }
            }
        }

        // Carregar a página
        document.addEventListener('DOMContentLoaded', function() {
            var diasDaSemanaElemento = document.querySelector('.dias-semana');
            var mesElemento = document.querySelector('.mes');

            // Função para renderizar os dias da semana
            function renderizarSemana() {
                diasDaSemanaElemento.innerHTML = '';
                for (var i = 0; i < 7; i++) {
                    var dia = semanaAtual.clone().startOf('week').add(i, 'days');
                    var divDia = document.createElement('div');
                    divDia.classList.add('dia');
                    divDia.innerHTML = '<div class="nome-dia">' + dia.format('ddd').charAt(0).toUpperCase() + dia
                        .format('ddd').slice(1) + '</div><div class="numero-dia">' + dia.format('DD') + '</div>';

                    // Adicionar evento de clique para selecionar o dia
                    divDia.addEventListener('click', function() {
                        // Remover a seleção do dia anterior
                        if (diaSelecionado) {
                            diaSelecionado.classList.remove('dia-selecionado');
                        }

                        // Adicionar seleção ao novo dia
                        this.classList.add('dia-selecionado');
                        diaSelecionado = this;

                        // Atualizar o mês selecionado
                        mesSelecionado = semanaAtual.month() +
                            1; // Adiciona 1 ao mês para obter o mês correto (Moment.js retorna de 0 a 11)

                        // Enviar dados via AJAX
                        diaSelecionadoNum = parseInt(this.querySelector('.numero-dia').textContent, 10);

                        // Se ambos dia e profissional estiverem selecionados, buscar horários
                        if (employeeIdSelecionado !== null) {
                            buscarHorarios(employeeIdSelecionado, mesSelecionado, diaSelecionadoNum);
                        }
                    });

                    diasDaSemanaElemento.appendChild(divDia);
                }
                var mes = semanaAtual.format('MMMM');
                mesElemento.textContent = mes.charAt(0).toUpperCase() + mes.slice(1);

                // Selecionar o dia atual automaticamente ao carregar a página
                var diaAtual = moment().date(); // Obtém o dia atual
                var diaAtualElemento = Array.from(document.querySelectorAll('.numero-dia')).find(el => parseInt(el
                    .textContent, 10) === diaAtual);
                if (diaAtualElemento) {
                    diaAtualElemento.parentElement.classList.add('dia-selecionado');
                    diaSelecionado = diaAtualElemento.parentElement;

                    // Atualizar o mês selecionado para o dia atual
                    mesSelecionado = semanaAtual.month() + 1;

                    // Buscar horários do profissional selecionado para o dia atual
                    if (employeeIdSelecionado !== null) {
                        diaSelecionadoNum = parseInt(diaSelecionado.querySelector('.numero-dia').textContent, 10);
                        buscarHorarios(employeeIdSelecionado, mesSelecionado, diaSelecionadoNum);
                    }
                }
            }

            renderizarSemana(); // Renderizar os dias da semana ao carregar a página

            // Evento para semana anterior
            document.querySelector('.semana-anterior').addEventListener('click', function() {
                semanaAtual.subtract(1, 'week');
                renderizarSemana();
            });

            // Evento para semana seguinte
            document.querySelector('.semana-seguinte').addEventListener('click', function() {
                semanaAtual.add(1, 'week');
                renderizarSemana();
            });

            // Evento de clique no botão "Agendar"
            // Evento de clique no botão "Agendar"
            var agendarBtns = document.querySelectorAll('.agendar-btn');
            agendarBtns.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var mesSelecionad = mesSelecionado - 1;
                    console.log(mesSelecionad);
                    var diaSelecionadoNovo = diaSelecionadoNum;
                    // Exemplo de dia selecionado (número)
                    var numeroMesSelecionado =
                        mesSelecionad; // Exemplo de número do mês (0 para Janeiro, 11 para Dezembro)
                    var ano = 2024; // Exemplo de ano

                    // Supondo que você tenha uma variável horarioSelecionado com o horário selecionado
                    var horarioSelecionados = horarioSelecionado; // Exemplo de horário selecionado

                    // Converter o horário selecionado para minutos
                    var partesHorario = horarioSelecionados.split(':');
                    var horas = parseInt(partesHorario[0], 10);
                    var minutos = parseInt(partesHorario[1], 10);
                    var totalMinutos = horas * 60 + minutos;

                    // Adicionar 30 minutos
                    totalMinutos += 30;

                    // Converter de volta para o formato "HH:mm"
                    var novaHora = Math.floor(totalMinutos / 60);
                    var novosMinutos = totalMinutos % 60;

                    // Formatar para o formato "HH:mm"
                    var novoHorario = (novaHora < 10 ? '0' : '') + novaHora + ':' + (novosMinutos <
                        10 ? '0' : '') + novosMinutos;

                    var horariosExibicao = horarioSelecionados + " - " + novoHorario + " (30 min)";

                    // Atualizar o conteúdo do modal com o novo horário calculado
                    var professionalId = this.getAttribute('data-professional-id');
                    var modalId = 'modal-agendamento' + professionalId;
                    var modal = document.getElementById(modalId);

                    var horarioElement = modal.querySelector('#horario');
                    horarioElement.textContent = horariosExibicao;

                    // Função para obter o nome do mês a partir do número do mês
                    function obterNomeMes(numeroMes) {
                        var meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
                            'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
                        ];
                        return meses[numeroMes];
                    }

                    // Função para obter o dia da semana
                    function obterDiaSemana(ano, numeroMes, dia) {
                        var data = new Date(ano, numeroMes, dia);
                        var diasSemana = ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira',
                            'Quinta-feira', 'Sexta-feira', 'Sábado'
                        ];
                        return diasSemana[data.getDay()];
                    }

                    var mesSelecionadoTexto = obterNomeMes(
                        numeroMesSelecionado); // Obter o nome do mês

                    var diaDaSemana = obterDiaSemana(ano, numeroMesSelecionado, diaSelecionadoNovo);

                    var dataExibicao = diaDaSemana + "  " + diaSelecionadoNovo + "  " +
                        mesSelecionadoTexto + "  " + ano;

                    var dataElement = modal.querySelector('#data');
                    dataElement.textContent = dataExibicao;

                    var dataElement = modal.querySelector('#datas');
                    dataElement.textContent = dataExibicao;

                    // Exibir o modal
                    modal.style.display = 'block';

                });
            });




            document.getElementById('botao-agendar').onclick = function() {
                document.getElementById('modal-agendamento').style.display = 'block';
            }
        });
    </script>
@endsection
