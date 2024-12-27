<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* General styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            color: #2d3748;
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .container {
            text-align: center;
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
        }

        .links-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 40px;
        }

        .link-card {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .link-card:hover {
            background-color: #45a049;
            transform: translateY(-5px);
        }

        .link-card i {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .link-card p {
            font-size: 1.1rem;
            margin: 0;
        }

        @media (max-width: 768px) {
            .links-container {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 480px) {
            .links-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bem-vindo ao Sistema de Gerenciamento</h1>
        <p style="font-size: 1.2rem; color: #4a5568;">Gerencie pessoas, contatos e veja estatísticas facilmente com nosso sistema intuitivo.</p>

        <div class="links-container">
            <a href="{{ route('people.index') }}" class="link-card">
                <i class="fas fa-users"></i>
                <p>Pessoas</p>
            </a>

            <a href="{{ route('contacts.index') }}" class="link-card">
                <i class="fas fa-phone-alt"></i>
                <p>Contatos</p>
            </a>

            <a href="{{ route('contacts.perCountry') }}" class="link-card">
                <i class="fas fa-chart-pie"></i>
                <p>Estatísticas</p>
            </a>
        </div>
    </div>
</body>
</html>
