<form action="{{ route('rastreio.consultaRastreio') }}" method="GET" class="row justify-content-center">
    @csrf
    <div class="col-auto">
        <input type="text" name="codigo" class="form-control" placeholder="Código de Rastreio">
    </div>

    <div class="col-auto">
        <button type="submit" class="btn btn-primary">Consultar</button>
    </div>
</form>
