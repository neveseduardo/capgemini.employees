## Emplyee application

Aplicativo que devolve a lista de funcionários por setor. Desenvolvido para teste capgemini. Para executar a aplicação siga os passos:

- Primeiro passo:   Importe a estrutura do banco de dados disposta em storage/polivalencia.sql, para o ambiente MySQL.
- Segundo passo:    Execute o comando "composer install" no cmd para instalar as depedencias.
- Terceiro passo:   Em public/index.php excute os comandos $db->createtables() e $db->insert(), sendo o primeiro para criação das tabelas e o segundo para inserção dos dados;
- Quarto passo:     Execute "php -S localhost:8000 -t public Server.php" no prompt de comando para executar na porta 8000.
- Quinto passo:     Certifique-se de ter o serviços de banco de dados MySQL rodando na maquina, para modificar o acesso, edite o arquivo app/Factory/Database.php.
- Sexto passo:      A página vai exibir os funcionários cadastrados no setor de São Paulo e que estão alocados a mais de 1 mês e logo abaixo uma lista de todos os funcionários.