<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recupera todas as pessoas
        $people = Person::all();

        // Retorna a view 'people.index' com os dados das pessoas
        return view('people.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Recupera todas as pessoas
        $people = Person::all();

        // Retorna a view 'contacts.create' com a lista de pessoas
        return view('people.create', compact('people'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:people,email',
            'phone' => 'nullable|string|max:255',
        ]);
    
        // Gerar o link do avatar usando o nome da pessoa
        $avatarUrl = "https://ui-avatars.com/api/?name=" . urlencode($request->name) . "&background=random&color=fff";
    
        // Criação da pessoa, incluindo a URL do avatar
        $person = new Person();
        $person->name = $validated['name'];
        $person->email = $validated['email'];
        $person->avatar = $avatarUrl;  // Armazena a URL gerada para o avatar
        $person->save();
    
        // Redireciona para a lista de pessoas com uma mensagem de sucesso
        return redirect()->route('people.index')->with('success', 'Pessoa criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Encontra a pessoa pelo ID
        $person = Person::findOrFail($id);

        // Retorna a view 'people.show' com os dados da pessoa
        return view('people.show', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Encontra a pessoa pelo ID
        $person = Person::findOrFail($id);

        // Retorna a view 'people.edit' com os dados da pessoa
        return view('people.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados do formulário
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:people,email,' . $id,  // Exclui o email atual da validação
            'phone' => 'nullable|string|max:255',
        ]);

        // Gerar o link do avatar usando o nome da pessoa
        $avatarUrl = "https://ui-avatars.com/api/?name=" . urlencode($request->name) . "&background=random&color=fff";

        // Encontra a pessoa pelo ID e atualiza os dados
        $person = Person::findOrFail($id);
        $person->name = $validated['name'];
        $person->email = $validated['email'];
        $person->avatar = $avatarUrl;  // Atualiza a URL gerada para o avatar
        $person->save();

        // Redireciona para a lista de pessoas com uma mensagem de sucesso
        return redirect()->route('people.index')->with('success', 'Pessoa atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Encontra a pessoa pelo ID e a remove
        $person = Person::findOrFail($id);
        $person->delete();

        // Redireciona para a lista de pessoas com uma mensagem de sucesso
        return redirect()->route('people.index')->with('success', 'Pessoa excluída com sucesso!');
    }
}
