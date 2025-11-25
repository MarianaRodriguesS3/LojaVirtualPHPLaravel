# 🛍️ LOJA-VIRTUAL - Projeto de Comércio Eletrônico em Laravel

## 🎯 Sobre o Projeto

Este projeto é uma **Loja Virtual** desenvolvida utilizando o framework **Laravel** (PHP) e seguindo o padrão de arquitetura **MVC (Model-View-Controller)**.

O objetivo principal é simular o fluxo de uma aplicação de e-commerce, desde a visualização de produtos até a finalização da compra. O foco está na implementação de recursos de autenticação e na gestão do **Carrinho de Compras**.

## ✨ Funcionalidades

### 🔐 Acesso e Autenticação

* **Visualização Pública:** Usuários **não logados** podem apenas **visualizar os produtos** na página inicial (Home). O acesso ao carrinho de compras e funcionalidades CRUD é restrito.
* **Autenticação:** O sistema possui telas completas de **Login**, **Cadastro** e **Recuperação de Senha**.
* **Acesso Restrito:** Usuários **logados** obtêm acesso total à gestão de produtos no carrinho e ao fluxo de checkout.

### 🛒 Carrinho de Compras & CRUD

Usuários autenticados podem interagir com o carrinho de compras:

* **Adicionar** produtos ao carrinho.
* **Visualizar** todos os itens e o total no carrinho.
* **Editar** a quantidade de um produto no carrinho.
* **Excluir** produtos do carrinho.

### ⚙️ Telas Atuais

* ✅ **Tela Inicial (Home)** - (Parte da exibição dos produtos).
* ✅ **Tela de Login**
* ✅ **Tela de Cadastro**
* ✅ **Tela de Recuperação de Senha**
* ❌ **Tela do Carrinho de Compras** - (A ser implementada).
* ❌ **Tela de Finalização da Compra/Checkout** - (A ser implementada).

## 🚀 Como Executar o Projeto Localmente

### Pré-requisitos

Para rodar este projeto, você precisará ter instalado:

* **PHP** (Versão compatível com o Laravel utilizado)
* **Composer**
* **Node.js e npm** (Para compilação de assets front-end, se aplicável)
* Um servidor web (ex: **Apache** ou **Nginx**) ou utilizar o servidor embutido do Laravel (`php artisan serve`).
* Um banco de dados (ex: **MySQL/MariaDB** ou **PostgreSQL**).

### Instalação

1.  **Clone o repositório:**
    ```bash
    git clone [URL_DO_SEU_REPOSITORIO]
    cd loja-virtual
    ```

2.  **Instale as dependências do PHP (via Composer):**
    ```bash
    composer install
    ```

3.  **Crie o arquivo de ambiente e gere a chave:**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Configure o Banco de Dados:**
    Abra o arquivo `.env` e configure as credenciais de acesso ao seu banco de dados:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=loja_virtual_db
    DB_USERNAME=sua_base_usuario
    DB_PASSWORD=sua_base_senha
    ```

5.  **Rode as Migrations:**
    ```bash
    php artisan migrate
    ```

    *(Opcional): Se houver dados iniciais (Seeders), você pode rodá-los:*
    ```bash
    php artisan db:seed
    ```

6.  **Instale as dependências do Node.js e compile os assets (se necessário):**
    ```bash
    npm install
    npm run dev  # ou 'npm run prod' para produção
    ```

7.  **Inicie o Servidor Local:**
    ```bash
    php artisan serve
    ```
    O projeto estará acessível em `http://127.0.0.1:8000` (ou a porta exibida no terminal).
