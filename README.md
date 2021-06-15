# Projeto de Lista de Espera

Seguem comandos para serem executados no terminal/cmd:

1. Clone o projeto:

> git clone https://github.com/LaercioLopesLL/lista_espera.git

2. Entre na pasta do projeto:

> cd lista_espera

3. instale os pacotes necessários pelo composer:

> composer install

4. Enquanto o composer faz a instação dos pacotes crie o banco de dados com os comandos do arquivo `bancoDeDados.sql` que está no diretório raiz. Caso queira criar o banco de dados após a instalação poderá utilizar o comando abaixo:

> php artisan migrate

5. Copie o arquivo de ambiente padrão:

> copy .env.example .env

6. Abra o arquivo `.env` e edite as chaves `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME` e `DB_PASSWORD` com as informações para conectar ao PostgreSQL.

7. Gere a chave de criptografia utilizada pelo Laravel:

> php artisan key:generate

8. Execute o projeto:

> php artisan serve
