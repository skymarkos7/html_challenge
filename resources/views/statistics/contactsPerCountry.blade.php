<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pessoas</title>
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
            flex-wrap: wrap;
        }
        .list-group-item form {
            display: inline;
        }
        .list-group-item a {
            margin-right: 10px;
        }
        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
        }
        .person-info {
            display: flex;
            align-items: center;
            flex: 1;
            min-width: 200px;
        }
        .actions {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }
        .actions a, .actions form {
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Lista de Pessoas</h1>

        <a href="{{ route('people.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Adicionar Nova Pessoa</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <ul class="list-group">
            @foreach ($people as $person)
                <li class="list-group-item">
                    <div class="person-info">
                        <img src="{{ $person->avatar }}" alt="Avatar" class="avatar">
                        <span>{{ $person->name }} - {{ $person->email }}</span>
                    </div>
                    <div class="actions">
                        <a href="{{ route('people.show', $person->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Ver</a>
                        <a href="{{ route('people.edit', $person->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a>
                        <form action="{{ route('people.destroy', $person->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Excluir</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
<div class="text-center mt-4">
    <a href="{{ url('/') }}" class="btn btn-secondary"><i class="fas fa-home"></i> Voltar ao Início</a>
</div>
<div class="text-center mt-4">
    <h2>Bem-vindo ao Sistema de Gerenciamento de Pessoas</h2>
    <p>Utilize o menu acima para navegar pelo sistema.</p>
    <a href="{{ route('people.index') }}" class="btn btn-primary"><i class="fas fa-users"></i> Ver Lista de Pessoas</a>
</div>