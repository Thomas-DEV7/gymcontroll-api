<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>GymControll API Documentation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 2rem;
            color: #333;
        }
        h1, h2 {
            color: #0056b3;
        }
        .endpoint {
            background: #ffffff;
            border: 1px solid #d1d5db;
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 6px;
        }
        .method {
            font-weight: bold;
            color: white;
            padding: 2px 8px;
            border-radius: 4px;
            margin-right: 8px;
        }
        .get { background: #22c55e; }
        .post { background: #3b82f6; }
        .put { background: #f59e0b; }
        .delete { background: #ef4444; }
        pre {
            background: #f0f0f0;
            padding: 10px;
            border-radius: 6px;
            overflow-x: auto;
        }
    </style>
</head>
<body>

    <h1>📚 GymControll API Documentation</h1>
    <p><strong>Backend:</strong> Laravel 10+ | PHP 8.1+ | PostgreSQL (Supabase)</p>
    <p><strong>Auth:</strong> Bearer Token (Laravel Sanctum)</p>

    <h2>Endpoints</h2>

    <div class="endpoint">
        <span class="post method">POST</span> <code>/api/register</code>
        <p><strong>Descrição:</strong> Registrar um novo usuário.</p>
        <pre>
Body:
{
  "name": "Thomas",
  "email": "thomas@example.com",
  "password": "123456",
  "password_confirmation": "123456"
}
        </pre>
    </div>

    <div class="endpoint">
        <span class="post method">POST</span> <code>/api/login</code>
        <p><strong>Descrição:</strong> Login e recebimento do Token Bearer.</p>
        <pre>
Body:
{
  "email": "thomas@example.com",
  "password": "123456"
}
        </pre>
    </div>

    <div class="endpoint">
        <span class="get method">GET</span> <code>/api/me</code>
        <p><strong>Descrição:</strong> Dados do usuário autenticado.</p>
        <p><strong>Headers:</strong> Authorization: Bearer {token}</p>
    </div>

    <div class="endpoint">
        <span class="post method">POST</span> <code>/api/logout</code>
        <p><strong>Descrição:</strong> Logout e revogação do token.</p>
        <p><strong>Headers:</strong> Authorization: Bearer {token}</p>
    </div>

    <h2>📋 Trainings (Treinos)</h2>

    <div class="endpoint">
        <span class="get method">GET</span> <code>/api/trainings</code> - Listar treinos do usuário.
    </div>
    <div class="endpoint">
        <span class="post method">POST</span> <code>/api/trainings</code> - Criar treino.
        <pre>
Body:
{
  "name": "Treino de Peito"
}
        </pre>
    </div>
    <div class="endpoint">
        <span class="get method">GET</span> <code>/api/trainings/{uuid}</code> - Detalhar treino específico.
    </div>
    <div class="endpoint">
        <span class="put method">PUT</span> <code>/api/trainings/{uuid}</code> - Atualizar treino.
    </div>
    <div class="endpoint">
        <span class="delete method">DELETE</span> <code>/api/trainings/{uuid}</code> - Excluir treino.
    </div>

    <h2>🏋️‍♂️ Exercises (Exercícios)</h2>

    <div class="endpoint">
        <span class="get method">GET</span> <code>/api/trainings/{training_uuid}/exercises</code> - Listar exercícios.
    </div>
    <div class="endpoint">
        <span class="post method">POST</span> <code>/api/trainings/{training_uuid}/exercises</code> - Criar exercício.
        <pre>
Body:
{
  "name": "Supino Reto"
}
        </pre>
    </div>
    <div class="endpoint">
        <span class="get method">GET</span> <code>/api/trainings/{training_uuid}/exercises/{uuid}</code> - Ver exercício.
    </div>
    <div class="endpoint">
        <span class="put method">PUT</span> <code>/api/trainings/{training_uuid}/exercises/{uuid}</code> - Atualizar exercício.
    </div>
    <div class="endpoint">
        <span class="delete method">DELETE</span> <code>/api/trainings/{training_uuid}/exercises/{uuid}</code> - Deletar exercício.
    </div>

    <h2>🔢 Executions (Execuções)</h2>

    <div class="endpoint">
        <span class="get method">GET</span> <code>/api/exercises/{exercise_uuid}/executions</code> - Listar execuções.
    </div>
    <div class="endpoint">
        <span class="post method">POST</span> <code>/api/exercises/{exercise_uuid}/executions</code> - Criar execução.
        <pre>
Body:
{
  "weight": 80,
  "amount": 10
}
        </pre>
    </div>
    <div class="endpoint">
        <span class="get method">GET</span> <code>/api/executions/{uuid}</code> - Ver execução.
    </div>
    <div class="endpoint">
        <span class="put method">PUT</span> <code>/api/executions/{uuid}</code> - Atualizar execução.
    </div>
    <div class="endpoint">
        <span class="delete method">DELETE</span> <code>/api/executions/{uuid}</code> - Excluir execução.
    </div>

</body>
</html>
