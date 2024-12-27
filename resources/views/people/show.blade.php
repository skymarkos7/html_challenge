<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Pessoa</title>
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
        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 15px;
        }
        .person-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .person-details {
            flex: 1;
        }
        .btn-back {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Detalhes da Pessoa</h1>

        <a href="{{ route('people.index') }}" class="btn btn-secondary btn-back"><i class="fas fa-arrow-left"></i> Voltar</a>

        <div class="person-info">
            <img src="{{ $person->avatar }}" alt="Avatar" class="avatar">
            <div class="person-details">
                <h2>{{ $person->name }}</h2>
                <p><strong>Email:</strong> {{ $person->email }}</p>
                <p><strong>Telefone:</strong> {{ $person->phone }}</p>
                <p><strong>Endereço:</strong> {{ $person->address }}</p>
            </div>
        </div>

        <div class="actions text-center">
            <a href="{{ route('people.edit', $person->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
            <form action="{{ route('people.destroy', $person->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir</button>
            </form>
        </div>
    </div>
</body>
</html>
