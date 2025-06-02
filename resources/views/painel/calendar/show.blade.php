@include('painel.layouts.menu')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Calendário</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Início</a></li>
                        <li class="breadcrumb-item active">Calendário</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="sticky-top mb-3">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Agendar</h3>
                            </div>
                            <div class="card-body">
                                <!-- /btn-group -->
                                <div class="input-group">
                                    <input type="text" id="new-event" name="new-event" class="form-control"
                                        placeholder="Nome Clinte">
                                    <select class="form-control mt-2" id="service_id" name="service_id"
                                        style="width: 100%;">
                                        <option>Selecione o serviço</option>
                                        @foreach ($service as $services)
                                            <option value="{{ $services->id }}">{{ $services->name }}</option>
                                        @endforeach
                                    </select>

                                    <div class="input-group date mt-2" id="reservationdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="event_date"
                                            data-target="#reservationdate" placeholder="DD/MM/YYYY" />
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <select class="form-control mt-2" id="employee_id" name="employee_id"
                                        style="width: 100%;">
                                        <option>Selecione o profissional</option>
                                        @foreach ($employee as $employees)
                                            <option value="{{ $employees->id }}">{{ $employees->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="available-times" class="mt-3">
                                        <!-- Aqui serão exibidos os horários disponíveis -->
                                    </div>
                                    <!-- Botão de envio adicionado -->
                                    <div class="text-center">
                                        <button id="add-new-event" class="btn btn-primary mt-2"
                                            type="button">Agendar</button>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <!-- THE CALENDAR -->
                            <div id='external-events'>
                                <h4>Eventos Externos</h4>
                                <select id="select-person">
                                    @foreach ($employee as $employees)
                                        <option value="{{ $employees->id }}">{{ $employees->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id='calendar'></div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- jQuery UI -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<!-- fullCalendar 2.2.5 -->

<!-- Bootstrap Switch -->
<script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar/main.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar-daygrid/main.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar-timegrid/main.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar-interaction/main.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar-bootstrap/main.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar/locales/pt-br.js') }}"></script>
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<script>
    $(function() {
        $('#employee_id, #event_date').change(function() {
            var employeeId = $('#employee_id').val();
            var eventDate = $('#event_date').val();
            // Verificar se ambos os campos estão preenchidos
            if (employeeId && eventDate) {
                // Dados para enviar via AJAX
                var requestData = {
                    employee_id: employeeId,
                    event_date: eventDate
                };
                // Enviar requisição AJAX para carregar os horários disponíveis
                $.ajax({
                    url: '/painel/events/available/times', // URL da sua rota Laravel para carregar horários disponíveis
                    method: 'GET',
                    data: requestData,
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        // Limpar horários disponíveis anteriores
                        $('#available-times').empty();
                        // Mostrar os horários disponíveis
                        if (response.times.length > 0) {
                            var timesHtml =
                                '<select class="form-control mt-2" id="event_time" name="event_time">';
                            timesHtml += '<option>Selecione o horário</option>';
                            $.each(response.times, function(index, time) {
                                timesHtml += '<option value="' + time + '">' +
                                    time +
                                    '</option>';
                            });
                            timesHtml += '</select>';
                            $('#available-times').html(timesHtml);
                        } else {
                            $('#available-times').html(
                                '<p>Nenhum horário disponível encontrado.</p>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Erro ao carregar horários disponíveis:', error);
                        $('#available-times').html(
                            '<p>Erro ao carregar horários disponíveis.</p>');
                    }
                });
            } else {
                alert(
                    'Por favor, selecione um profissional e uma data antes de carregar os horários disponíveis.'
                );
            }
        });

        $('#add-new-event').click(function() {
            var clientName = $('#new-event').val(); // Captura o nome do cliente (se necessário)
            var serviceId = $('#service_id').val(); // Captura o ID do serviço selecionado
            var employeeId = $('#employee_id').val(); // Captura o ID do profissional selecionado
            var eventDate = $('#event_date').val(); // Captura a data do evento selecionada
            var eventTime = $('#event_time').val(); // Captura o horário do evento selecionado
            // Validar se todos os campos necessários estão preenchidos
            if (serviceId && employeeId && eventDate && eventTime) {
                // Dados para enviar via AJAX
                var eventData = {
                    client_name: clientName, // Se necessário, ajuste para capturar corretamente o nome do cliente
                    service_id: serviceId,
                    employee_id: employeeId,
                    event_date: eventDate,
                    event_time: eventTime,
                    _token: '{{ csrf_token() }}'
                };
                // Enviar dados via AJAX para adicionar o evento
                $.ajax({
                    url: '/painel/events/add', // URL da sua rota Laravel para adicionar eventos
                    method: 'POST',
                    data: eventData,
                    dataType: 'json',
                    success: function(response) {
                        alert('Cliente agendado.');
                    },
                    error: function(xhr, status, error) {
                        // Lógica de erro, se necessário
                        console.error('Erro ao adicionar evento:', error);
                    }
                });
            } else {
                alert('Por favor, preencha todos os campos necessários.');
            }
        });

    });

    $(function() {
        $('#reservationdate').datetimepicker({
            format: 'DD-MM-YYYY',
        });
    })

    $(function() {
        // Inicializar eventos arrastáveis
        function ini_events(ele) {
            ele.each(function() {
                var eventObject = {
                    title: $.trim($(this).text()) // usar o texto do elemento como título do evento
                }
                // armazenar o objeto de evento no elemento DOM
                $(this).data('eventObject', eventObject)
                // tornar o evento arrastável usando jQuery UI
                $(this).draggable({
                    zIndex: 1070,
                    revert: true, // fará com que o evento volte à sua posição original após o arrasto
                    revertDuration: 0 // tempo de reversão
                })
            })
        }

        ini_events($('#external-events div.external-event'))
        var containerEl = document.getElementById('external-events');
        var calendarEl = document.getElementById('calendar');
        var selectPersonEl = document.getElementById('select-person');
        // inicializar os eventos externos
        new FullCalendarInteraction.Draggable(containerEl, {
            itemSelector: '.external-event',
            eventData: function(eventEl) {
                return {
                    title: eventEl.innerText,
                    backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                        'background-color'),
                    borderColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                        'background-color'),
                    textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
                };
            }
        });

        function loadEventsForEmployee(employeeId) {
            return $.ajax({
                url: '/painel/events', // URL da sua rota Laravel
                method: 'GET',
                data: {
                    employeeId: employeeId
                },
                dataType: 'json'
            });
        }

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['timeGrid'],
            locale: 'pt-br',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            themeSystem: 'bootstrap',
            initialView: 'timeGridDay', // Definir a visualização inicial para timeGridDay
            scrollTime: '08:00:00', // Definir a hora inicial para rolagem automática
            editable: true,
            droppable: true,
            minTime: '08:00:00',
            maxTime: '19:30:00',
            slotDuration: '00:30:00',
            slotLabelInterval: '00:30:00',
            slotLabelFormat: {
                hour: 'numeric',
                minute: '2-digit',
                meridiem: false,
                hour12: false,
                formatter: (info) => {
                    return info.date.getHours() + 'H';
                }
            },
            events: [],
            eventRender: function(info) {
                var tooltip = info.event.extendedProps.client_name + ' - ' + info.event
                    .extendedProps.service_name;
                info.el.setAttribute('title', tooltip);
                // Construir o conteúdo HTML com horário, nome do cliente e serviço
                var eventInfo = '<div>' +
                    '<strong>' + info.event.title + '</strong>' +
                    '<small>' + info.event.start.toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit'
                    }) + ' - ' +
                    info.event.extendedProps.client_name + ' - ' + info.event.extendedProps
                    .service_name +
                    '</small>' +
                    '</div>';
                // Atualizar a renderização do evento conforme necessário
                $(info.el).find('.fc-content').html(eventInfo);
            },
        });

        calendar.render();

        $('#select-person').on('change', function() {
            var selectedEmployeeId = $(this).val();
            loadEventsForEmployee(selectedEmployeeId).done(function(events) {
                calendar.removeAllEvents();
                calendar.addEventSource(events);
            });
        });
        // Carregar eventos para o funcionário 1 ao iniciar
        loadEventsForEmployee(1).done(function(events) {
            calendar.addEventSource(events);
        });
    });
</script>
