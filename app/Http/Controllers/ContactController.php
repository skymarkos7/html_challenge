<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recupera todos os contatos
        $contacts = Contact::all();

        // Retorna a view 'contacts.index' com os contatos
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retorna a view 'contacts.create' para criar um novo contato
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $validated = $request->validate([
            'country_code' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'person_id' => 'required|exists:people,id',  // Certifique-se de que 'people' existe
        ]);

        // Criação do contato
        Contact::create($validated);

        // Redireciona para a lista de contatos com uma mensagem de sucesso
        return redirect()->route('contacts.index')->with('success', 'Contato criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Encontra o contato pelo ID
        $contact = Contact::findOrFail($id);

        // Retorna a view 'contacts.show' com os dados do contato
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Encontra o contato pelo ID
        $contact = Contact::findOrFail($id);

        // Retorna a view 'contacts.edit' com os dados do contato
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados do formulário
        $validated = $request->validate([
            'country_code' => 'required|string|max:255',
            'number' => 'required|string|max:255',
        ]);

        // Encontra o contato pelo ID e atualiza os dados
        $contact = Contact::findOrFail($id);
        $contact->update($validated);

        // Redireciona para a lista de contatos com uma mensagem de sucesso
        return redirect()->route('contacts.index')->with('success', 'Contato atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Encontra o contato pelo ID e o remove
        $contact = Contact::findOrFail($id);
        $contact->delete();

        // Redireciona para a lista de contatos com uma mensagem de sucesso
        return redirect()->route('contacts.index')->with('success', 'Contato excluído com sucesso!');
    }
}
