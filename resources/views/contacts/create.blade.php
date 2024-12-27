<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Contato</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h1 {
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            color: #333;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
        }
        input[type="text"] {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 0.75rem;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .back-button {
            background-color: #6c757d;
            margin-bottom: 1rem;
            width: 100%;
            max-width: 400px;
        }
        .back-button:hover {
            background-color: #5a6268;
        }

        .btn-back {
            margin-bottom: 20px;
            background-color: #066cc4;
            text-decoration: none;
            padding: 10px !important;
            border-radius : 8px;
            font-weight: bold;
            color: #fff;

        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('people.index') }}" class="btn btn-secondary btn-back"><i class="fas fa-arrow-left"></i> Voltar</a>
        <h1>Criar Novo Contato</h1>
        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf
            <label for="country_code">Código do País:</label>
            <input type="text" name="country_code" id="country_code" required>
            <label for="number">Número:</label>
            <input type="text" name="number" id="number" pattern="\d*" required>
            <label for="person_id">ID da Pessoa:</label>
            <input type="text" name="person_id" id="person_id" required>
            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const countryCodeInput = document.getElementById('country_code');
        const countrySearchInput = document.createElement('input');
        const countryList = document.createElement('ul');

        countrySearchInput.setAttribute('type', 'text');
        countrySearchInput.setAttribute('placeholder', 'Buscar País');
        countrySearchInput.style.width = '100%';
        countrySearchInput.style.padding = '0.75rem';
        countrySearchInput.style.marginBottom = '1rem';
        countrySearchInput.style.border = '1px solid #ddd';
        countrySearchInput.style.borderRadius = '4px';
        countrySearchInput.style.boxSizing = 'border-box';

        countryList.style.listStyleType = 'none';
        countryList.style.padding = '0';
        countryList.style.margin = '0';
        countryList.style.maxHeight = '150px';
        countryList.style.overflowY = 'auto';
        countryList.style.border = '1px solid #ddd';
        countryList.style.borderRadius = '4px';
        countryList.style.display = 'none';

        countryCodeInput.parentNode.insertBefore(countrySearchInput, countryCodeInput);
        countryCodeInput.parentNode.insertBefore(countryList, countryCodeInput);

        countrySearchInput.addEventListener('input', function () {
            const query = countrySearchInput.value;
            if (query.length < 2) {
                countryList.style.display = 'none';
                return;
            }

            fetch(`https://restcountries.com/v3.1/all`)
                .then(response => response.json())
                .then(data => {
                    const filteredCountries = data.filter(country => 
                        country.name.common.toLowerCase().includes(query.toLowerCase())
                    );

                    countryList.innerHTML = '';
                    filteredCountries.forEach(country => {
                        const listItem = document.createElement('li');
                        listItem.textContent = `${country.name.common} (+${country.idd.root}${country.idd.suffixes ? country.idd.suffixes[0] : ''})`;
                        listItem.style.padding = '0.5rem';
                        listItem.style.cursor = 'pointer';
                        listItem.addEventListener('click', function () {
                            countryCodeInput.value = `${country.idd.root}${country.idd.suffixes ? country.idd.suffixes[0] : ''}`;
                            countryList.style.display = 'none';
                        });
                        countryList.appendChild(listItem);
                    });

                    countryList.style.display = 'block';
                });
        });

        const phoneNumberInput = document.getElementById('number');
        phoneNumberInput.addEventListener('input', function () {
            phoneNumberInput.value = phoneNumberInput.value.replace(/\D/g, '');
            const value = phoneNumberInput.value;
            if (value.length > 9) {
                phoneNumberInput.value = value.slice(0, 9);
            }
        });
    });
</script>