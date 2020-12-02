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
        <input type="text" class="form-control" name="name" id="name">
    </div>

    <div class="form-group">
        <label for="age" class="form-label">Idade:</label>
        <input class="form-control" type="number" value="" name="age" id="age">
    </div>

    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-sm-1 pt-0">Sexo:</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" id="gridRadios1" value="M" checked>
                    <label class="form-check-label" for="gridRadios1">
                        Masculino
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" id="gridRadios2" value="F">
                    <label class="form-check-label" for="gridRadios2">
                        Femenino
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group col-md-4">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" name="cpf" id="cpf">
        </div>
    </fieldset>

    <div class="form-group">
        <label for="address" class="">Endereço</label>
        <input type="text" class="form-control" name="address" id="address">
    </div>


    <button class="btn btn-primary">Adicionar</button>
</form>
@endsection
