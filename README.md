# Gerenciador Financeiro

Um sistema web para gerenciar compras, categorias e formas de pagamento, com visualização de gastos através de gráficos. Desenvolvido em **Laravel 12** com **PHP 8.3**.

---

## Tecnologias Utilizadas

* PHP 8.3
* Laravel 12
* MySQL
* Tailwind CSS
* LarapexCharts (para gráficos)
* Composer
* Node.js e npm

---

## Requisitos

* PHP >= 8.0
* Composer
* MySQL
* Node.js >= 16
* npm >= 8

---

## Instalação

1. Clone o repositório:

```bash
git clone https://github.com/seu-usuario/gerenciador-financeiro.git
cd gerenciador-financeiro
```

2. Instale as dependências PHP:

```bash
composer install
```

3. Instale as dependências JS:

```bash
npm install
npm run dev
```

4. Copie o arquivo `.env.example` para `.env`:

```bash
cp .env.example .env
```

5. Gere a chave da aplicação:

```bash
php artisan key:generate
```

---

## Configuração do Banco de Dados

1. Crie um banco de dados MySQL, por exemplo `gerenciador_financeiro`.
2. Configure suas credenciais no `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gerenciador_financeiro
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

3. Execute as migrations:

```bash
php artisan migrate
```

4. (Opcional) Execute os seeders para popular dados iniciais:

```bash
php artisan db:seed
```

---

## Rodando o Projeto

```bash
php artisan serve
```

O sistema estará disponível em: [http://localhost:8000](http://localhost:8000)

---

## Estrutura de Rotas Principais

| Método | Rota               | Descrição                 |
| ------ | ------------------ | ------------------------- |
| GET    | /login             | Tela de login             |
| POST   | /login             | Autenticação do usuário   |
| GET    | /register          | Tela de registro          |
| POST   | /register          | Criação de novo usuário   |
| GET    | /home              | Página inicial após login |
| GET    | /compras           | Listar compras do usuário |
| POST   | /compras           | Criar nova compra         |
| GET    | /compras/{id}/edit | Editar compra             |
| PUT    | /compras/{id}      | Atualizar compra          |
| DELETE | /compras/{id}      | Deletar compra            |

> Observação: rotas de autenticação podem estar protegidas pelo middleware `auth`.

---

## Funcionalidades

* **Usuários**

  * Registro e login
  * Autenticação e restrição de acesso a páginas privadas

* **Compras**

  * Cadastro, edição, listagem e exclusão
  * Associação com categoria e forma de pagamento
  * Relatórios por mês ou por dia

* **Categorias**

  * Cadastro e listagem de categorias para organizar compras

* **Formas de Pagamento**

  * Cadastro e listagem de formas de pagamento (Cartão, Dinheiro, etc.)

* **Gráficos de Gastos**

  * Pizza: Distribuição de gastos por categoria
  * Barra: Comparativo de gastos por categoria ou mês
  * Linha: Gastos ao longo dos dias do mês

* **Extras**

  * Variáveis calculadas no controller, como `status` ou total gasto
  * Filtragem de dados para relatórios dinâmicos

---

## Comandos Úteis

* Rodar migrations:

```bash
php artisan migrate
```

* Criar um novo controller:

```bash
php artisan make:controller NomeController
```

* Criar uma nova model:

```bash
php artisan make:model NomeModel -m
```

* Rodar seeders:

```bash
php artisan db:seed
```

* Limpar cache de configuração:

```bash
php artisan config:clear
php artisan cache:clear
```

* Compilar assets:

```bash
npm run dev      # desenvolvimento
npm run build    # produção
```

---

## Como Contribuir

1. Faça um fork do projeto
2. Crie sua branch: `git checkout -b minha-feature`
3. Faça as alterações e commit: `git commit -m "Minha feature"`
4. Envie para o repositório remoto: `git push origin minha-feature`
5. Abra um Pull Request

---

## Licença

MIT License
