<title>Relatório</title>
<style>
  table, td, th {
    text-align: center;
    border: 1px solid black;
  }

  table {
      border-collapse: collapse;
      width: 100%;
  }

  th {
      height: 25px;
  }

</style>
<div>
  <h2 class="text-center">Entrada de Produtos</h2>
  <h4 class="text-center"><p>Relatório tirado no dia: {{ date('d/m/Y', strtotime($date)) }} </p></h4>
  <hr/>
</div>
<div class="table-responsive">
  <table class="table-striped table-bordered table-hover table" style="font-size:12px;">
    <thead>
      <tr>
        <th>ID</th>
        <th>Produto</th>
        <th>Descrição</th>
        <th>Fornecedor</th>
        <th>Data de Entrada</th>
        <th>Quantidade</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($products_entries as $p)
      <tr>
        <td>{{ $p->id}}</td>
        <td>{{ $p->product->name}}</td>
        <td>{{ $p->note}}</td>
        <td>{{ $p->supplier->name}}</td>
        <td>{{ date('d/m/Y', strtotime($p->date_entry)) }}</td>
        <td>{{ $p->amount}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>