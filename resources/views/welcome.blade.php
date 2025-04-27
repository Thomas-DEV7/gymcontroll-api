<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GymControll API</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            body {
                font-family: 'Figtree', sans-serif;
                margin: 0;
                background: linear-gradient(to right, #f8fafc, #e2e8f0);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #1a202c;
            }
            .container {
                text-align: center;
                background: white;
                padding: 3rem;
                border-radius: 1rem;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
                max-width: 600px;
                width: 90%;
            }
            h1 {
                font-size: 2.5rem;
                margin-bottom: 1rem;
                color: #ef4444;
            }
            p {
                font-size: 1.2rem;
                margin-bottom: 1.5rem;
            }
            .badge {
                display: inline-block;
                background: #ef4444;
                color: white;
                padding: 0.5rem 1rem;
                border-radius: 9999px;
                font-size: 0.875rem;
                font-weight: 600;
                margin-top: 1rem;
            }
            footer {
                margin-top: 2rem;
                font-size: 0.875rem;
                color: #6b7280;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>GymControll API</h1>
            <p>Bem-vindo à API oficial do projeto <strong>GymControll</strong>.</p>
            <p>Esta API foi projetada para gerenciar treinos, exercícios e progresso de usuários em academias de forma simples e eficiente.</p>

            <div class="badge">
                Status: Online
            </div>

            <footer>
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} — PHP v{{ PHP_VERSION }}
            </footer>
        </div>
    </body>
</html>
