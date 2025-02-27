# 📌 Sistema de Voluntariado

Este projeto é uma plataforma para conectar ONGs e voluntários. As ONGs podem se cadastrar, criar projetos e buscar ajuda, enquanto voluntários podem se inscrever para apoiar essas iniciativas.

## 🚀 Tecnologias Utilizadas
- **Laravel** (Backend)
- **MySQL** (Banco de Dados)
- **Tailwind CSS** (Estilização)

## 🎯 Funcionalidades
### Para ONGs:
- Cadastro e autenticação
- Criação, edição e remoção de projetos
- Gerenciamento de voluntários inscritos

### Para Voluntários:
- Cadastro e autenticação
- Visualização de projetos disponíveis
- Inscrição em projetos

## 🛠 Como executar o projeto
Para executar o projeto, siga os seguintes passos:

1. Copie o arquivo `.env.example` e renomeie sua cópia para `.env`
2. Crie um banco de dados MySQL com o nome `sistema_voluntariado`
3. Instale as dependências do Laravel:
   ```sh
   composer install
   ```
4. Gere a chave da aplicação:
   ```sh
   php artisan key:generate
   ```
5. Instale as dependências do frontend:
   ```sh
   npm install
   ```
6. Compile os assets do frontend:
   ```sh
   npm run build
   ```
7. Crie um link simbólico para o armazenamento de imagens:
   ```sh
   php artisan storage:link
   ```
8. Execute as migrações e seeds do banco de dados:
   ```sh
   php artisan migrate:fresh --seed
   ```
9. Inicie o servidor backend:
   ```sh
   php artisan serve
   ```
10. Em outro terminal, inicie o servidor frontend:
    ```sh
    npm run dev
    ```