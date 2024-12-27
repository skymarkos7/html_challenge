<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Editar Contato</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /* Tailwind CSS */
            body {
                font-family: 'Figtree', sans-serif;
                background-color: #f8f9fa;
            }
            .form-container {
                background: white;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                padding: 2rem;
                margin-top: 50px;
                max-width: 500px;
                margin-left: auto;
                margin-right: auto;
            }
            .form-title {
                font-size: 1.5rem;
                font-weight: 600;
                color: #2d3748;
                margin-bottom: 1rem;
                text-align: center;
            }
            .form-label {
                font-size: 0.875rem;
                font-weight: 500;
                color: #4a5568;
            }
            .form-input {
                margin-top: 0.5rem;
                width: 100%;
                padding: 0.75rem;
                border-radius: 0.375rem;
                border: 1px solid #cbd5e0;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
                transition: border-color 0.2s;
            }
            .form-input:focus {
                border-color: #3182ce;
                outline: none;
                box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
            }
            .form-error {
                color: #e53e3e;
                font-size: 0.875rem;
                margin-top: 0.25rem;
            }
            .form-button {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 0.75rem 1.5rem;
                background-color: #3182ce;
                color: white;
                font-size: 0.875rem;
                font-weight: 600;
                border-radius: 0.375rem;
                transition: background-color 0.2s;
            }
            .form-button:hover {
                background-color: #2b6cb0;
            }
            .btn-back {
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body class="antialiased bg-gray-100 dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <a href="{{ route('contacts.index') }}" class="btn btn-secondary btn-back"><i class="fas fa-arrow-left"></i> Voltar</a>
            <div class="flex items-center justify-center min-h-screen">
                <div class="form-container">
                    <h1 class="form-title">Editar Contato</h1>
                    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="country_code" class="form-label">Código do País</label>
                            <input type="text" name="country_code" id="country_code" value="{{ old('country_code', $contact->country_code) }}" class="form-input">
                            @error('country_code')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="number" class="form-label">Número</label>
                            <input type="text" name="number" id="number" value="{{ old('number', $contact->number) }}" class="form-input" pattern="\d*" maxlength="9">
                            @error('number')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="person_id" class="form-label">ID da Pessoa</label>
                            <input type="text" name="person_id" id="person_id" value="{{ old('person_id', $contact->person_id) }}" class="form-input" disabled>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="form-button">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
