@extends('layout.main')
@section('content')
<section class="content-header">
      <br>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/products_outputs"><i class="fa fa-plus-circle"></i> Entrada de Produtos</a></li>
        <li class="active"><i class="fa fa-plus"></i> Formulário</li>
      </ol>
</section>
<section class="content">
      <div class="box box-default">
            <div class="row">
                  <div class="box-header with-border">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                              <h3>Formulário</h3>
                        </div>
                  </div>
            </div>
            <div class="box-body">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                @if (count($errors)>0)
                <div class="alert alert-danger">
                  <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                  @endforeach
                  </ul>
                </div>
                @endif

              </div>
            </div>
            {!!Form::model($products_outputs, ['method'=>'PATCH', 'route'=>['products_outputs.update', $products_outputs->id]])!!}
            {{Form::token()}}
            <div class="row">

              <div class="col-lg-4 col-sm-4 col-xs-12">
                <div class="form-group">
                  <label>Produtos</label>
                    <select name="product_id" class="form-control">
                      @foreach($products as $p)
                        @if($p->id == $products_outputs->product_id)
                          <option value="{{$p->id}}" selected>{{$p->name}}</option>
                        @else
                          <option value="{{$p->id}}">{{$p->name}}</option>
                        @endif
                      @endforeach
                </select>
                </div>
              </div>

              <div class="col-lg-4 col-sm-4 col-xs-12">
                <div class="form-group">
                  <label for="estoque">Quantidade</label>
                    <input type="number" name="amount" required value="{{$products_outputs->amount}}" class="form-control" placeholder="Quantidade...">
                </div>      
              </div>

              <div class="col-lg-4 col-sm-4 col-xs-12">
                <div class="form-group">
                  <label>Tipo de Movimento</label>
                    <select name="type_movement" class="form-control">
                        @if($products_outputs->type_movement == 1)
                          <option value="1" selected>Venda</option>
                          <option value="2">Consumo Interno</option>
                          <option value="3">Devolução</option>
                          <option value="4">Ordem de Serviço</option>
                          <option value="5">Troca</option>
                          <option value="6">Nota Fiscal</option>
                        @elseif($products_outputs->type_movement == 2)
                          <option value="1">Venda</option>
                          <option value="2" selected>Consumo Interno</option>
                          <option value="3">Devolução</option>
                          <option value="4">Ordem de Serviço</option>
                          <option value="5">Troca</option>
                          <option value="6">Nota Fiscal</option>
                        @elseif($products_outputs->type_movement == 3)
                          <option value="1">Venda</option>
                          <option value="2">Consumo Interno</option>
                          <option value="3" selected>Devolução</option>
                          <option value="4">Ordem de Serviço</option>
                          <option value="5">Troca</option>
                          <option value="6">Nota Fiscal</option>
                        @elseif($products_outputs->type_movement == 4)
                          <option value="1">Venda</option>
                          <option value="2">Consumo Interno</option>
                          <option value="3">Devolução</option>
                          <option value="4" selected>Ordem de Serviço</option>
                          <option value="5">Troca</option>
                          <option value="6">Nota Fiscal</option>
                        @elseif($products_outputs->type_movement == 5)
                          <option value="1">Venda</option>
                          <option value="2">Consumo Interno</option>
                          <option value="3">Devolução</option>
                          <option value="4">Ordem de Serviço</option>
                          <option value="5" selected>Troca</option>
                          <option value="6">Nota Fiscal</option>
                        @elseif($products_outputs->type_movement == 6)
                          <option value="1">Venda</option>
                          <option value="2">Consumo Interno</option>
                          <option value="3">Devolução</option>
                          <option value="4">Ordem de Serviço</option>
                          <option value="5">Troca</option>
                          <option value="6" selected>Nota Fiscal</option>
                        @endif
                    </select>
                </div>
              </div>

              <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="estoque">Descrição</label>
                      <textarea name="note" class="form-control" rows="4" cols="70">{{$products_outputs->note}}</textarea>
                </div>      
              </div>

              <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label>Cliente</label>
                    <select name="client_id" class="form-control">
                      @foreach($clients as $c)
                       @if($c->id == $products_outputs->supplier_id)
                          <option value="{{$c->id}}" selected>{{$c->name}}</option>
                        @else
                          <option value="{{$c->id}}">{{$c->name}}</option>
                        @endif
                      @endforeach
                </select>
                </div>
              </div>

              <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="estoque">Data de Saída</label>
                      <input type="date" name="date_output" required value="{{$products_outputs->date_output}}" class="form-control" placeholder="Data de saída...">
                </div>      
              </div>

            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit">Salvar</button>
              <a href="/products_outputs" class="btn btn-default">Cancelar</a>
            </div>
            {!!Form::close()!!}   
      </div>
</div>
</section>
@stop