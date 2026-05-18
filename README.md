# EstoqueWEB

Sistema de gerenciamento de estoque desenvolvido em PHP puro utilizando arquitetura MVC, autenticação de usuários e interface responsiva com Bootstrap.

---

# 📋 Funcionalidades

- Login de usuários
- Cadastro de usuários
- Logout
- Dashboard administrativo
- Cadastro de produtos
- Listagem de produtos
- Controle de categorias
- Controle de estoque
- Interface responsiva
- Sistema utilizando PDO
- Senhas criptografadas com `password_hash()`

---

# 🚀 Tecnologias utilizadas

- PHP
- MySQL
- Bootstrap 5
- HTML5
- CSS3
- PDO
- Arquitetura MVC

---

# 📁 Estrutura do projeto

```text
EstoqueWEB/
│
├── app/
│   ├── config/
│   │   └── database.php
│   │
│   ├── controllers/
│   │   ├── AuthController.php
│   │   ├── ProdutoController.php
│   │   └── RegisterController.php
│   │
│   ├── models/
│   │   ├── Usuario.php
│   │   └── Produto.php
│   │
│   └── views/
│       ├── auth/
│       ├── dashboard/
│       └── produtos/
│
├── public/
│
└── README.md

