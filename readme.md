# ⚽ Overall

Descrição breve do projeto. Explique em 1 ou 2 frases o que ele faz, qual problema resolve ou para que serve.

---

## 🚀 Iniciando o Projeto

Siga os passos abaixo para configurar e executar o ambiente local da aplicação:

### ✅ Pré-requisitos

Certifique-se de que você tem os seguintes itens instalados na sua máquina:

- [PHP](https://www.php.net/) >= 8.x
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) >= 16.x
- [Laravel](https://laravel.com/) CLI (opcional, mas recomendado)
- Um banco de dados configurado (ex: MySQL, PostgreSQL)

---

### ⚙️ Instalação e Setup

```bash
# 1. Instale as dependências do PHP
composer install

# 2. Instale as dependências do Node.js
npm install

# 3. Gere a chave da aplicação
php artisan key:generate

# 4. Execute as migrations do banco de dados
php artisan migrate

# 5. Compile os assets do front-end para ambiente de desenvolvimento
composer run dev
