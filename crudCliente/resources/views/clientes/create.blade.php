@extends('layout')

@section('cabecalho')
    Adicionar Cliente
@endsection

@section('conteudo')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post">
    @csrf
    <div class="form-group">
        <label for="name" class="">Nome Completo</label>
        <input type="text" class="form-control" name="name" id="name" value="{{$name?? ''}}">
    </div>

    <div class="form-group">
        <label for="age" class="form-label">Idade:</label>
        <input class="form-control" type="number" name="age" id="age" value="{{$age?? ''}}">
    </div>

    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-sm-1 pt-0">Sexo:</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" id="masculino" value="M" checked>
                    <label class="form-check-label" for="gridRadios1">
                        Masculino
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" id="femenino" value="F">
                    <label class="form-check-label" for="gridRadios2">
                        Femenino
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group col-md-4">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" name="cpf" id="cpf" value="{{$cpf?? ''}}">
        </div>
    </fieldset>

    <div class="form-group">
        <label for="address" class="">Endereço</label>
        <input type="text" class="form-control" name="address" id="address" value="{{$address?? ''}}">
    </div>


    <button class="btn btn-primary">Adicionar</button>
</form>
@endsection

<script>
    window.addEventListener('load', (event) => {
        const sexo = '{{$sexo?? ''}}';
        switch (sexo) {
            case 'F':
                document.getElementById("femenino").checked = true;
                break;
            case 'M':
                document.getElementById("masculino").checked = true;
                break;
        }

        const cpf = '{{$cpf?? ''}}'
        document.getElementById("cpf").value = cpf.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");

    });
</script>
