# GymControll API

API desenvolvida em **Laravel** (PHP 8.1) com banco de dados **PostgreSQL** hospedado na **Supabase**. 
O objetivo é permitir que o usuário crie treinos personalizados, adicione exercícios a esses treinos e registre execuções com cargas e repetições.

---

## 🚀 Tecnologias Utilizadas

- PHP 8.1
- Laravel 10
- PostgreSQL (via Supabase)
- Sanctum (Autenticação via Bearer Token)
- Docker (opcional para deploy)
- WSL2 (ambiente local)
- Postman (para testes de API)

---

## 📚 Instalação Local

1. Clone o projeto:
```bash
git clone https://github.com/seuusuario/gymcontroll-api.git
cd gymcontroll-api
```

2. Instale as dependências:
```bash
composer install
```

3. Configure o `.env`:
```env
APP_NAME=GymControll
APP_URL=http://localhost:8000

DB_CONNECTION=----
DB_HOST=----
DB_PORT=----
DB_DATABASE=----
DB_USERNAME=----
DB_PASSWORD=---

SANCTUM_STATEFUL_DOMAINS=localhost:8000
SESSION_DOMAIN=localhost
```

4. Gere a chave de aplicação:
```bash
php artisan key:generate
```

5. Execute as migrations:
```bash
php artisan migrate
```

6. Rode o servidor:
```bash
php artisan serve
```

---

## 🔒 Autenticação

| Método  | Rota          | Função         |
|---------|---------------|----------------|
| POST    | `/api/register` | Cadastro de usuários |
| POST    | `/api/login`    | Login e geração do token |
| GET     | `/api/me`       | Retorna dados do usuário logado |
| POST    | `/api/logout`   | Faz logout (invalida o token) |

**Exemplo de Registro:**
```json
{
  "name": "Thomas",
  "email": "thomas@example.com",
  "password": "123456",
  "password_confirmation": "123456"
}
```

---

## 🏋️‍♂️ CRUD de Treinos

| Método | Rota | Função |
|--------|------|--------|
| GET    | `/api/trainings` | Listar treinos do usuário |
| POST   | `/api/trainings` | Criar novo treino |
| GET    | `/api/trainings/{uuid}` | Detalhar treino específico |
| PUT    | `/api/trainings/{uuid}` | Atualizar treino |
| DELETE | `/api/trainings/{uuid}` | Deletar treino |

---

## 🏋️ CRUD de Exercícios

| Método | Rota | Função |
|--------|------|--------|
| GET    | `/api/trainings/{training_uuid}/exercises` | Listar exercícios de um treino |
| POST   | `/api/trainings/{training_uuid}/exercises` | Criar exercício |
| GET    | `/api/trainings/{training_uuid}/exercises/{uuid}` | Mostrar exercício |
| PUT    | `/api/trainings/{training_uuid}/exercises/{uuid}` | Atualizar exercício |
| DELETE | `/api/trainings/{training_uuid}/exercises/{uuid}` | Deletar exercício |

---

## 🏋️ CRUD de Execuções

| Método | Rota | Função |
|--------|------|--------|
| GET    | `/api/exercises/{exercise_uuid}/executions` | Listar execuções |
| POST   | `/api/exercises/{exercise_uuid}/executions` | Criar execução |
| GET    | `/api/executions/{uuid}` | Mostrar execução |
| PUT    | `/api/executions/{uuid}` | Atualizar execução |
| DELETE | `/api/executions/{uuid}` | Deletar execução |

---

## 🗂️ Estrutura de Banco de Dados

**Tabela `users`**
- id
- uuid
- name
- email
- password
- timestamps

**Tabela `trainings`**
- id
- uuid
- name
- user_id (FK users)
- timestamps

**Tabela `exercises`**
- id
- uuid
- name
- training_id (FK trainings)
- timestamps

**Tabela `executions`**
- id
- uuid
- exercise_id (FK exercises)
- weight
- amount
- timestamps

---

## 📸 Imagem de Fluxo (Exemplo)

![Gym Training](https://cdn.pixabay.com/photo/2020/06/07/07/11/fitness-5268302_1280.jpg)

---

## ✨ Observações

- As rotas são protegidas com `auth:sanctum`.
- IDs internos (numéricos) são usados apenas internamente. Toda comunicação entre API e frontend usa `UUID`.
- Todos os fluxos possuem validações e retornam mensagens amigáveis em JSON.

---

## 🔥 Desenvolvido por
Thomas | GymControll Project | 2025
