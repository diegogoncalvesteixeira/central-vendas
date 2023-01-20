**Projeto Central de Vendas**

**Passo a paaso para instalação:**

1. Tenha um servidor com PHP 8.0 e MySQL instalados e rodando.
2. Clone o projeto para a pasta do servidor.
3. Crie um banco de dados no MySQL.
4. Configure o arquivo .env com as informações do banco de dados, APP_URL e GOOGLE_MAPS_API_KEY (chave de api do google maps) **SEM ESSAS INFORMAÇÕES O SISTEMA NÃO FUNCIONARÁ**.
5. Execute o comando **composer implentar** no console para instalar as dependências. (Este comando é responsavel por instalar todas as dependências do projeto, Rodar o migration para criar as tabelas e Popular as tabelas com os seeders configurados de acordo com o documento de requisitos)
6. Documento de endpoints disponivel no arquivo **endpoints.pdf** na raiz do projeto.
7. Para rodar os testes unitários execute o comando **php artisan test** no console.

