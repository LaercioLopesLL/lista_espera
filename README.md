# Projeto de Lista de Espera

O projeto consiste em uma lista de espera onde é possível adicionar alunos e cursos quais os alunos podem se inscrever, é possível adicionar mais de um curso no cadastro do aluno.

![DER Lista de Espera](https://raw.githubusercontent.com/LaercioLopesLL/lista_espera/master/DER.png)

[Script de criação do banco de dados e tabelas](https://raw.githubusercontent.com/LaercioLopesLL/lista_espera/master/bancoDeDados.sql)

Para instalação do sistema deve serguir os comandos abaixo no Windows:

1. Clone o projeto:

> git clone https://github.com/LaercioLopesLL/lista_espera.git

2. Entre na pasta do projeto:

> cd lista_espera

3. instale os pacotes necessários pelo composer:

> composer install

4. Copie o arquivo de ambiente padrão:

> copy .env.example .env

5. Abra o arquivo `.env` e edite as chaves `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME` e `DB_PASSWORD` com as informações para conectar ao PostgreSQL.

6. Gere a chave de criptografia utilizada pelo Laravel:

> php artisan key:generate

7. Crie o banco de dados e as tabelas com os comandos do arquivo `bancoDeDados.sql` que está no diretório raiz. Se não quiser utilizar o script para criar as tabelas, o framework já está preparado com as migrações das tabelas necessárias, mas será necessário que pelo menos crie o banco de dados com o comando abaixo no PostgreSQL:

> CREATE DATABASE lista_espera ENCODING = 'UTF8';

Cria as tabelas pelo Laravel:

> php artisan migrate

8. Execute o projeto:

> php artisan serve

Após executar o servidor de desenvolvimento do Laravel a aplicação estará acessível no endereço http://localhost:8000
