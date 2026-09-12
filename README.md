<div align="center">

# 🛒 LojaGuilherme — API de Produtos

**Uma API REST simples para gerenciamento de produtos, desenvolvida com PHP puro e PostgreSQL.**

</div>

<div align="center">

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-4169E1?style=for-the-badge&logo=postgresql&logoColor=white)
![REST API](https://img.shields.io/badge/REST_API-009688?style=for-the-badge&logo=fastapi&logoColor=white)
![Git](https://img.shields.io/badge/Git-F05032?style=for-the-badge&logo=git&logoColor=white)

</div>

<div align="center">

[![License](https://img.shields.io/badge/License-MIT-yellow?style=for-the-badge)](LICENSE)
[![GitHub last commit](https://img.shields.io/github/last-commit/GuiFirmo050923/LojaGuilherme?style=for-the-badge&color=blue)]()

</div>

---

## 📚 Índice

- [ℹ️ Sobre o Projeto](#-sobre-o-projeto)
- [🚀 Funcionalidades](#-funcionalidades)
- [🛠️ Tecnologias](#️-tecnologias)
- [📁 Estrutura do Projeto](#-estrutura-do-projeto)
- [⚙️ Pré-requisitos](#️-pré-requisitos)
- [📦 Instalação](#-instalação)
- [📡 Uso da API](#-uso-da-api)
- [🗄️ Schema do Banco de Dados](#️-schema-do-banco-de-dados)
- [🔒 Segurança](#-segurança)
- [📈 Roadmap](#-roadmap)
- [👤 Autor](#-autor)
- [📄 Licença](#-licença)

---

## ℹ️ Sobre o Projeto

O **LojaGuilherme** é um backend REST API desenvolvido em PHP para cadastro e listagem de produtos. Utiliza **PDO** para conexão segura com o banco **PostgreSQL** e **prepared statements** para prevenir SQL Injection.

```
┌─────────────────────────────────────────────────┐
│                👤 CLIENTE (JSON)                │
│                                                 │
│   ┌──────────┐      POST👍      ┌────────────┐  │
│   │   POST   │ ────────────────▶│            │  │
│   │   GET    │ ◀────────────────│ produtos   │  │
│   └──────────┘      GET📋        │   .php     │  │
│                                 └─────┬──────┘  │
│                                       │         │
│                            PDO Conectar│        │
│                                       ▼         │
│                               ┌──────────────┐  │
│                               │  conexao.php │  │
│                               └──────┬───────┘  │
│                                      │          │
│                                      ▼          │
│                               ┌──────────────┐  │
│                               │  🗄️ PostgreSQL│  │
│                               │  produtos    │  │
│                               └──────────────┘  │
└─────────────────────────────────────────────────┘
```

---

## 🚀 Funcionalidades

| Método | Endpoint | Descrição | Body |
|:------:|----------|-----------|------|
| 📋 `GET` | `/produtos.php` | Lista todos os produtos | — |
| ➕ `POST` | `/produtos.php` | Cadastra um novo produto | `{"nome": "...", "preco": 0.00}` |

---

## 🛠️ Tecnologias

<div align="center">

| Tecnologia | Uso |
|:----------:|-----|
| **PHP** | 💻 Linguagem principal |
| **PostgreSQL** | 🗄️ Banco de dados relacional |
| **PDO** | 🔗 Abstração de acesso ao banco |
| **JSON** | 📦 Formato de comunicação |

</div>

---

## 📁 Estrutura do Projeto

```
PRODUTOS-LOJA/
├── 📄 conexao.php      # 🔗 Conexão com o banco PostgreSQL (PDO)
├── 📄 produtos.php     # 🚪 Endpoint da API (GET/POST)
└── 📄 README.md        # 📖 Este arquivo
```

---

## ⚙️ Pré-requisitos

<div align="center">

![PHP Version](https://img.shields.io/badge/PHP-%3E%3D7.4-8892BF?style=flat-square&logo=php&logoColor=white)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-%3E%3D12-4169E1?style=flat-square&logo=postgresql&logoColor=white)
![Composer](https://img.shields.io/badge/Composer-optional-F2DF4E?style=flat-square&logo=composer&logoColor=black)

</div>

- ✅ PHP 7.4 ou superior com extensão `pdo_pgsql` habilitada
- ✅ PostgreSQL 12 ou superior
- ✅ Servidor web (Apache/Nginx) ou servidor embutido do PHP

---

## 📦 Instalação

### 1️⃣ Clone o repositório

```bash
git clone https://github.com/GuiFirmo050923/LojaGuilherme.git
cd LojaGuilherme
```

### 2️⃣ Configure o banco de dados

Edite o arquivo `conexao.php` com as credenciais do seu PostgreSQL:

```php
$host     = "localhost";
$usuario  = "seu_usuario";
$banco    = "nome_do_banco";
$senha    = "sua_senha";
```

### 3️⃣ Crie a tabela no PostgreSQL

```sql
CREATE TABLE produtos (
    id    SERIAL PRIMARY KEY,
    nome  VARCHAR(255) NOT NULL,
    preco DECIMAL(10,2) NOT NULL
);
```

### 4️⃣ Inicie o servidor

```bash
php -S localhost:8000
```

---

## 📡 Uso da API

### ➕ Cadastrar um produto

```bash
curl -X POST http://localhost:8000/produtos.php \
  -H "Content-Type: application/json" \
  -d '{"nome": "Camiseta", "preco": 59.90}'
```

**✅ Resposta:**
```json
{
  "Mensagem": "Produto cadastrado com sucesso!"
}
```

### 📋 Listar todos os produtos

```bash
curl http://localhost:8000/produtos.php
```

**✅ Resposta:**
```json
[
  {
    "id": 1,
    "nome": "Camiseta",
    "preco": "59.90"
  },
  {
    "id": 2,
    "nome": "Tênis",
    "preco": "199.90"
  }
]
```

---

## 🗄️ Schema do Banco de Dados

```
┌──────────────────────────┐
│         produtos         │
├──────────────────────────┤
│  🔊  id       SERIAL (PK) │
│  📝  nome     VARCHAR(255)│
│  💰  preco    DECIMAL(10,2)│
└──────────────────────────┘
```

---

## 🔒 Segurança

- 🛡️ Utilização de **prepared statements** via PDO para prevenir **SQL Injection**
- 📝 Validação do Content-Type para receber JSON
- ⚠️ **IMPORTANTE:** Nunca commite suas credenciais de banco de dados no Git!

---

## 📈 Roadmap

- [x] 🏗️ Estrutura base da API (GET/POST)
- [ ] ✏️ Implementar método `PUT` para atualização de produtos
- [ ] 🗑️ Implementar método `DELETE` para remoção de produtos
- [ ] 🧪 Adicionar validação de dados no lado do servidor
- [ ] 🐛 Implementar tratamento de erros com `try/catch`
- [ ] 📄 Adicionar paginação nas listagens
- [ ] 🔐 Criar autenticação (JWT / API Key)

---

## 👤 Autor

**GuiFirmo050923**

[![GitHub](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/GuiFirmo050923)

---

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

---

<div align="center">

**⭐ Se este projeto te ajudou, deixe uma estrela no GitHub! ⭐**

![Visitors](https://api.visitorbadge.io/api/visitors?path=GuiFirmo050923%2FLojaGuilherme&countColor=%2337d67a&style=for-the-badge)

</div>