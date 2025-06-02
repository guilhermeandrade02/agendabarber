@include('painel.layouts.menu')


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Serviços</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Serviços</li>
                        <li class="breadcrumb-item active">Serviços</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Serviço</th>
                                    <th>Valor</th>                                  
                                    <th>Status</th>
                                    <th>Categoria</th>
                                    <th class="text-center">Opções</th>
                                </tr>
                            </thead>
                            @foreach ($service as $services)
                                <tbody>
                                    <tr>
                                        <td>{{ $services->name }}</td>
                                        <td>{{ $services->value }}</td>                                       
                                        <td>
                                            @if ($services->status == 'enabled')
                                                Habilitado
                                            @else
                                                Desabilitado
                                            @endif
                                        </td>
                                        <td>{{ $services->categories->name }}</td>
                                        <td class="text-center">
                                            <a href="{{ Route('service-edit', ['id' => $services->id]) }}">
                                                <i class="fas fa-edit" style="color:green; margin-right: 10px;"></i>
                                            </a>
                                            <a href="" data-toggle="modal"
                                                data-target="#modal-danger{{ $services->id }}">
                                                <i class="fas fa-trash" style="color:red"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-danger{{ $services->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-danger">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Apagar Serviço</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Tem certeza disso, não pode ser desfeito.</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-outline-light"
                                                        data-dismiss="modal">Sair</button>
                                                    <form
                                                        action="{{ route('service-destroy', ['id' => $services->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-outline-light">Deletar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('painel.layouts.footer')
