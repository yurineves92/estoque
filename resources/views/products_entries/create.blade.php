@extends('layout.main')
@section('content')
<section class="content-header">
      <br>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/products_entries"><i class="fa fa-plus-circle"></i> Entrada de Produtos</a></li>
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
		        {!!Form::open(array('url'=>'products_entries','method'=>'POST','autocomplete'=>'off', 'files'=>'true'))!!}
            {{Form::token()}}
            <div class="row">

            	<div class="col-lg-4 col-sm-4 col-xs-12">
            		<div class="form-group">
            		  <label>Produtos</label>
            		    <select name="product_id" class="form-control">
	            		    @foreach($products as $p)
                        <option value="{{$p->id}}">{{$p->name}}</option>
	            		    @endforeach
            		</select>
            		</div>
            	</div>

              <div class="col-lg-4 col-sm-4 col-xs-12">
                <div class="form-group">
                  <label for="estoque">Quantidade</label>
                    <input type="number" name="amount" required class="form-control" placeholder="Quantidade...">
                </div>      
              </div>

              <div class="col-lg-4 col-sm-4 col-xs-12">
                <div class="form-group">
                  <label>Tipo de Movimento</label>
                    <select name="type_movement" class="form-control">
                        <option value="1">Compra</option>
                        <option value="2">Acerto</option>
                        <option value="3">Transferência</option>
                        <option value="4">Devolução</option>
                        <option value="5">Troca</option>
                        <option value="6">Nota Fiscal</option>
                    </select>
                </div>
              </div>

              <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="estoque">Descrição</label>
                      <textarea name="note" class="form-control" rows="4" cols="70"></textarea>
                </div>      
              </div>

              <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label>Fornecedor</label>
                    <select name="supplier_id" class="form-control">
                      @foreach($suppliers as $s)
                      <option value="{{$s->id}}">{{$s->name}}</option>
                  @endforeach
                </select>
                </div>
              </div>

              <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="estoque">Data de Entrada</label>
                      <input type="date" name="date_entry" required  class="form-control" placeholder="Data de entrada...">
                </div>      
              </div>

            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Salvar</button>
            	<a href="/products_entries" class="btn btn-default">Cancelar</a>
            </div>
		        {!!Form::close()!!}		
      </div>
</div>
</section>
@stop