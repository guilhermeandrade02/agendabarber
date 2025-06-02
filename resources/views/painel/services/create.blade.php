@include('painel.layouts.menu')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cadastro de serviço</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Serviço</li>
                        <li class="breadcrumb-item active">Cadastro de serviço</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-body">
                    <form action="{{ route('service-store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" name="name" style="width: 100%;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Valor</label>
                                    <input type="text" class="form-control" name="value" style="width: 100%;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" style="width: 100%;">
                                        <option value="enabled" selected="selected">Habilitado</option>
                                        <option value="disabled" >Desabilitado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Categorias</label>
                                    <select class="form-control" name="category_id" style="width: 100%;">
                                        <option>Selecione a categoria</option>
                                        @foreach ($category as $categorys )
                                            <option value="{{$categorys->id}}" >{{$categorys->name}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                        </div>                       

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </section>
</div>

@include('painel.layouts.footer')
