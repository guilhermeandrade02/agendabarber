@extends('schedule.layout')


@section('content')
    <div class="row">
        <div class="col-md-6">
            <h4 class="">Nome da Barbeiaria</h4>
            <h6 class=""><iconify-icon icon="twemoji:star"></iconify-icon> 5.0</h6>
        </div>
        <div class="col-md-6 text-md-right">
            <button class="btn btn-warning">Agendar</button>
        </div>
        <div class="col-md-8">
            {{-- <div class="fundo-quadrado text-center">

                <img src="{{ asset('storage/img/img1.png') }}" class="img-fluid" alt="Imagem">
            </div> --}}

            <div id="opcoes" class="opcoes mt-4">
                <div class="nome" onclick="toggleOptions('servico')" data-option="servico">Serviços</div>
                <div class="nome" onclick="toggleOptions('profissionais')" data-option="profissionais">Profissionais</div>
                <div class="nome" onclick="toggleOptions('fidelidade')" data-option="fidelidade">Fidelidade</div>
                <div class="nome" onclick="toggleOptions('produtos')" data-option="produtos">Produtos</div>
                <div class="nome" onclick="toggleOptions('pacotes')" data-option="pacotes">Pacotes</div>
                <div class="nome" onclick="toggleOptions('assinaturas')" data-option="assinaturas">Assinaturas</div>
                <div class="nome" onclick="toggleOptions('avaliacoes')" data-option="avaliacoes">Avaliações</div>

                <hr class="my-4 hr">
                <div id="servicoOptions" class="options" style="display: none;">
                    <div class="mt-5">
                        <h4>Serviços</h4>
                        <h6>Categorias</h6>
                        <div class="mt-4">
                            @foreach ($category as $categorys)
                                <div class="payment-method" onclick="toggleOptio('{{ $categorys->name }}')"
                                    data-option="{{ $categorys->name }}">{{ $categorys->name }}</div>
                            @endforeach
                            @foreach ($category as $categorys)
                                <div id="{{ $categorys->name }}Optio" class="optio" style="display: none;">
                                    @foreach ($categorys->service as $services)
                                        <div class="servico-cate">
                                            <iconify-icon icon="octicon:feed-person-16"
                                                style="font-size:40px"></iconify-icon>
                                            <div class="info-profissional">
                                                <div>
                                                    <span class="nome-profissional"><b>{{ $services->name }}</b></span>
                                                </div>
                                                <div>
                                                    <span class="observacao">R${{ $services->value }}</span>
                                                </div>
                                            </div>
                                            <div class="button-agenda">
                                                <div class="avaliacao-container">
                                                    <a href="{{ Route('schedule', ['service' => $services->id]) }}">
                                                        <button type="button" class="btn btn-primary">Agendar</button> </a>
                                                </div>
                                            </div>
                                        </div>
    
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


                <div id="profissionaisOptions" class="options" style="display: none;">
                    <div class="mt-5">
                        <h4>Profissionais</h4>
                        <div class="mt-4">
                            @foreach ($employee as $employees)
                                <div class="profissional">
                                    <iconify-icon icon="octicon:feed-person-16" style="font-size:60px"></iconify-icon>
                                    <div class="info-profissional">
                                        <div>
                                            <span class="nome-profissional">0{{ $loop->index + 1 }} -
                                                {{ $employees->name }} </span>
                                        </div>
                                        <div>
                                            <span class="observacao">Observação</span>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4 hr">
                            @endforeach

                        </div>
                    </div>
                </div>
                <div id="fidelidadeOptions" class="options" style="display: none;">
                    <div class="mt-5">
                        <h4>Fidelidade</h4>
                        <div class="mt-4">
                            <div class="payment-method">Todos</div>
                            <div class="payment-method">Produtos</div>
                            <div class="payment-method">Serviços</div>
                        </div>
                    </div>
                </div>
                <div id="produtosOptions" class="options" style="display: none;">
                    <div class="mt-5">
                        <h4>Produtos</h4>
                        <div class="mt-4">
                            <div class="payment-method">Todos</div>
                            <div class="payment-method">Produtos</div>
                            <div class="payment-method">Serviços</div>
                        </div>
                    </div>
                </div>
                <div id="pacotesOptions" class="options" style="display: none;">
                    <div class="mt-5">
                        <h4>Pacotes</h4>
                        <div class="mt-4">
                            <div class="payment-method">Todos</div>
                            <div class="payment-method">Produtos</div>
                            <div class="payment-method">Serviços</div>
                        </div>
                    </div>
                </div>
                <div id="assinaturasOptions" class="options" style="display: none;">
                    <div class="mt-5">
                        <h4>Assinaturas</h4>
                        <div class="mt-4">
                            <div class="payment-method">Todos</div>
                            <div class="payment-method">Produtos</div>
                            <div class="payment-method">Serviços</div>
                        </div>
                    </div>
                </div>
                <div id="avaliacoesOptions" class="options" style="display: none;">
                    <div class="mt-5">
                        <h4>Avaliações</h4>
                        <div class="mt-4">
                            <div class="profissional">
                                <iconify-icon icon="octicon:feed-person-16" style="font-size:40px"></iconify-icon>
                                <div class="info-profissional">
                                    <div>
                                        <span class="nome-profissional"><b>Guilherme Carlos</b></span>
                                    </div>
                                    <div>
                                        <span class="observacao">30/04/2024 13:39</span>
                                    </div>
                                </div>
                                <div class="avaliacao">
                                    <div class="avaliacao-container">
                                        <span class="nota-text">Avaliação</span>
                                        <span class="nota">★★★★★</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p>Excelente, 5 estrelas fácil! </p>
                            </div>
                            <hr class="my-4 hr">
                            <div class="profissional">
                                <iconify-icon icon="octicon:feed-person-16" style="font-size:40px"></iconify-icon>
                                <div class="info-profissional">
                                    <div>
                                        <span class="nome-profissional"><b>Guilherme Carlos</b></span>
                                    </div>
                                    <div>
                                        <span class="observacao">30/04/2024 13:39</span>
                                    </div>
                                </div>
                                <div class="avaliacao">
                                    <div class="avaliacao-container">
                                        <span class="nota-text">Avaliação</span>
                                        <span class="nota">★★★★★</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p>Excelente, 5 estrelas fácil! </p>
                            </div>
                            <hr class="my-4 hr-final">
                            <h6>Avaliar estabelecimento</h6>
                            <div class="rating">
                                <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                            </div>

                            <div class="comment">
                                <textarea class="comment-text" id="comment" name="comment" rows="4" cols="100" maxlength="200"></textarea>
                                <div class="text-right">
                                    <div class="char-count">200 caracteres restantes</div>
                                    <button class="btn btn-success mt-2"> Enviar avaliação</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class=" jumbotron" style=" background: #0a021d;">
                <h6>Horário de atendimento</h6>
                @php
                    date_default_timezone_set('America/Sao_Paulo');
                    use Carbon\Carbon;
                    $currentDay = Carbon::now()->format('l');                  
                    $weekDays = [
                        'Monday' => 'Segunda-Feira',
                        'Tuesday' => 'Terça-Feira',
                        'Wednesday' => 'Quarta-Feira',
                        'Thursday' => 'Quinta-Feira',
                        'Friday' => 'Sexta-Feira',
                        'Saturday' => 'Sábado',
                     
                    ];
                @endphp
                <ul class="list-unstyled mt-3">
                    @foreach ($weekDays as $englishDay => $portugueseDay)
                        <li
                            class="d-flex justify-content-between {{ $currentDay === $englishDay ? 'font-weight-bold text-primary' : '' }}">
                            <span class="day">{{ $portugueseDay }}</span>
                            <span class="hours">09:00 - 20:00</span>
                        </li>
                    @endforeach
                </ul>
                <hr class="my-4 hr">
                <h6>Formas de pagamento</h6>
                <div class="mt-4">
                    <div class="payment-method">Dinheiro</div>
                    <div class="payment-method">Cartão de Crédito</div>
                    <div class="payment-method">Cartão de Débito</div>
                    <div class="payment-method">PIX</div>
                </div>
                <hr class="my-4 hr">
                <h6>Localização</h6>
                <p class="mt-4">Avenida Jacob Macanhan ,1092 Pinhais/PR</p>
                <hr class="my-4 hr">
                <h6>Contato</h6>
                <div class="contato mt-4">
                    <iconify-icon nify-icon icon="bi:phone" style="font-size:25px;"
                        class="icon-contatos "></iconify-icon>
                    <p> (41) 99627-6146 </p>
                </div>
                <div class="contato">
                    <iconify-icon icon="gg:phone" style="font-size:25px;" class="icon-contatos "></iconify-icon>
                    <p>(41) 3267-6098</p>
                </div>
                <div class="contato">
                    <iconify-icon icon="ic:outline-email" style="font-size:25px;" class="icon-contatos "></iconify-icon>
                    <p> godevolpmeto@gmail.com</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/pt-br.min.js"></script>

    <script src="{{ asset('js.js') }}"></script>
@endsection
