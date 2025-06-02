@include('painel.layouts.menu')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Informação do funcionário</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Funcionários</li>
                        <li class="breadcrumb-item active">Informação do funcionário</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-body">
                    <form action="{{ route('service-update', $service->id) }}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $service->name }}" style="width: 100%;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Valor</label>
                                    <input type="text" class="form-control" name="value"
                                        value="{{ $service->value }}" style="width: 100%;">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <select class="form-control" name="category_id" style="width: 100%;">
                                        @foreach ($category as $categories)
                                            <option value="{{ $categories->id }}"
                                                {{ $service->category_id == $categories->id ? 'selected' : '' }}>
                                                {{ $categories->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" style="width: 100%;">
                                        <option value="enabled"
                                            {{ $service->status == 'enabled' ? 'selected' : '' }}>Habilitado
                                        </option>
                                        <option value="disabled"
                                            {{ $service->status == 'disabled' ? 'selected' : '' }}>Desabilitado
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Atualizar</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
    </section>
</div>

@include('painel.layouts.footer')
