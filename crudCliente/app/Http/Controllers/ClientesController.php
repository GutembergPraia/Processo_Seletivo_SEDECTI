<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index(Request $request){
        $clientes = Clientes::query()
            ->orderBy('name')
            ->get();
        $mensagem = $request->session()->get('mensagem');

        return view('clientes.index', compact('clientes','mensagem'));
    }

    public function create()
    {
        return view('clientes.create');
    }


    public function store(ClienteFormRequest $request)
    {
        $cliente = Clientes::create($request->except(['_token']));

        $request->session()
            ->flash(
                'mensagem',
                "Cliente {$cliente->id} criada com sucesso {$cliente->nome}"
            );

        return redirect()->route('list_clients');
    }

    public function destroy(Request $request)
    {
        Clientes::destroy($request->id);
        $request->session()
            ->flash(
                'mensagem',
                "Cliente {$request->id} removida com sucesso"
            );
        return redirect()->route('list_clients');
    }

    public function edit(int $id, Request $request)
    {
        $cliente = Clientes::find($id);

        $cliente->name = $request->name;
        $cliente->age = $request->age;
        $cliente->sexo = $request->sexo;
        $cliente->cpf = $request->cpf;
        $cliente->address = $request->address;
        $cliente->save();

        $request->session()
            ->flash(
                'mensagem',
                "Cliente {$request->id} Alterado com sucesso"
            );

        return redirect()->route('list_clients');
    }

    public function load(int $id, Request $request)
    {
        $cliente = Clientes::find($id);


        return view('clientes.create',[
            "name"=>$cliente->name,
            "age"=>$cliente->age,
            "sexo"=>$cliente->sexo,
            "cpf"=>$cliente->cpf,
            "address"=>$cliente->address]);
    }


}
