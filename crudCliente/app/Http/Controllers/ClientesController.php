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


}
