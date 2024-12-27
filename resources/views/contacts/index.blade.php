<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #343a40;
        }
        .btn-primary {
            margin-bottom: 20px;
        }
        .list-group-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .list-group-item form {
            display: inline;
        }
        .list-group-item a {
            margin-right: 10px;
        }
        .contact-info {
            display: flex;
            align-items: center;
        }
        .phone-number {
            background: #f8f9fa;
            padding: 5px 10px;
            border-radius: 4px;
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Lista de Contatos</h1>

        <a href="{{ route('contacts.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Adicionar Novo Contato</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <ul class="list-group">
            @foreach ($contacts as $contact)
                <li class="list-group-item">
                    <div class="contact-info">
                        <span class="phone-number">
                             <i class="fas fa-phone"></i> 
                            +{{ $contact->country_code }} {{ $contact->number }}
                        </span>
                        <i class="fas fa-user"></i>
                        <a href="{{ url('people/' . $contact->person_id) }}">#{{ $contact->person_id ?? 'N/A' }}</a>
                    </div>
                    <span>
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a>
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Excluir</button>
                        </form>
                    </span>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="text-center mt-4">
        <a href="{{ url('/') }}" class="btn btn-secondary"><i class="fas fa-home"></i> Voltar ao Início</a>
    </div>
</body>
</html>
