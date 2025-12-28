# Site Instituto Incentive - API de Currículos Lattes
O projeto é uma reescrita em PHP de uma aplicação originalmente desenvolvida em Python/Flask.

### Tecnologias utilizadas:
* **PHP 8.x** - Linguagem principal
* **Slim Framework 4** - Microframework para rotas HTTP
* **Eloquent ORM** - ORM standalone do Laravel para manipulação do banco de dados
* **SQLite** - Banco de dados leve/portátil
* **Composer** - Gerenciador de dependências

### Diagrama de entidade

<img width="1000" height="842" alt="Image" src="https://github.com/user-attachments/assets/81a60d7e-5a6a-4b27-9f06-dee266229e8d" />

## 📦 Instalação

### 1. Clone o repositório
```bash
git clone https://github.com/mscirl/incentive-site-php.git
cd incentive-site-php
```
### 2. Instale as dependências
```bash
composer install
```

### 3. Configure o ambiente
```bash
# Copie o arquivo de exemplo (quando existir)
cp .env.example .env
```

#### Ou crie manualmente o .env com:
```bash
echo "APP_ENV=development" > .env
echo "DB_CONNECTION=sqlite" >> .env
echo "DB_DATABASE=curriculos.db" >> .env
```

#### O banco de dados será criado automaticamente na primeira execução.

---
