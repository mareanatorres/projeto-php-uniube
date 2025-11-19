# Agenda de Eventos de TI no Brasil 2025 — Projeto MVC (PHP + MySQL)

Olá! Esse projeto foi desenvolvido com o intuito dea aplicar padrões de arquitetura (MVC, Singleton, DAO) e alguns padrões de projeto. O tema escolhido foi Agenda de eventos de TI no Brasil 2025.

Pré-requisitos

- XAMPP (Apache + MySQL) ou ambiente equivalente
- PHP 7.4+ com PDO MySQL
- MySQL/MariaDB

Passos para configurar localmente (Windows, PowerShell)

1. Coloque o projeto em `c:\xampp\htdocs\projeto-php` (já presente no workspace).

2. Importar o schema (cria database `meu_sistema` e tabelas):

PowerShell (linha única, será solicitada a senha do MySQL se houver):

```powershell
mysql -u root -p < "c:\xampp\htdocs\projeto-php\sql\schema.sql"
```

Ou, dentro do cliente MySQL:

```powershell
mysql -u root -p
# então no prompt do mysql:
SOURCE c:/xampp/htdocs/projeto-php/sql/schema.sql;
```

Observação: se seu usuário/senha do MySQL forem diferentes, substitua `-u root -p` pelos valores apropriados.

3. Ajustar credenciais do banco (se necessário):

- Arquivo: `app/Config/Database.php`
- Atualize as propriedades `$host`, `$dbname`, `$username`, `$password` conforme seu ambiente. O schema cria a base `meu_sistema`, então certifique-se que `$dbname = 'meu_sistema'`.

4. Acessar a aplicação no navegador:

Abra: `http://localhost/projeto-php/public/index.php`

Rotas básicas via query string:

- Dashboard (padrão): `?c=dashboard&a=index`
- Auth: `?c=auth&a=login` e `?c=auth&a=register`
- Agenda de eventos: `?c=event&a=index`

Como usar

- Registre um usuário em `Registrar`.
- Faça login com suas credenciais.
- No `Dashboard` você verá seus eventos/tarefas.
- Use `Agenda de Eventos` para criar/editar/remover eventos (título, descrição, data/hora, local).

Padrões de projeto aplicados

- Singleton: `app/Config/Database.php` (gerencia única instância PDO).
- DAO/Repository: `app/DAO/TaskDAO.php` e `app/DAO/ClienteDAO.php` (separam lógica de acesso a dados do restante da aplicação).

Segurança

- Senhas são armazenadas com `password_hash(..., PASSWORD_BCRYPT)` e verificadas com `password_verify()`.

Testes manuais recomendados

- Registrar usuário
- Fazer login
- Criar um evento (preencher data e local)
- Editar evento
- Remover evento
