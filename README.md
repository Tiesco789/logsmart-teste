# Desafio Amigo Secreto Log Smart
Este é um desafio para a empresa LogSmart, que consiste em criar um sistema de sorteio de Amigo Secreto utilizando PHP, MySQL, HTML, CSS e JavaScript. O desafio segue o padrão MVC com o framework Laravel para facilitar o desenvolvimento.

## Funcionalidades:
- **Cadastro de Participantes:** Permite adicionar participantes com nome e e-mail, validando os dados para garantir a integridade das informações;
- **Listagem de Participantes:** Exibe a lista de todos os participantes cadastrados;
- **Edição de Participantes:** Possibilita a edição dos dados de um participante existente.
- **Exclusão de Participantes:** Permite remover participantes da lista;
- **Realização do Sorteio:** Executa o sorteio do Amigo Secreto, garantindo que ninguém se tire e exibindo os resultados em uma página separada.

## Tecnologias Utilizadas:
- HTML
- CSS (Bootstrap)
- JavaScript
- PHP
- MySQL
- Laravel

### Como Executar o Projeto:
```bash
git clone https://github.com/Tiesco789/logsmart-teste.git
```

### Instalar as Dependências:
```bash
composer install
npm install
```

### Configurar o Arquivo .env:
- Crie uma cópia do arquivo .env.example e renomeie para .env.
- Configure as informações de conexão com o banco de dados no arquivo .env.

### Gerar a Key da Aplicação:
```bash
php artisan key:generate
```

### Executar as Migrations:
```bash
php artisan migrate
```

### Iniciar o Servidor:
```bash
php artisan serve
```

### Acessar o Sistema:
Abra o navegador e acesse o endereço http://localhost:8000.

### Observações:
- É necessário ter o PHP, Composer e NPM instalados.
- Crie um banco de dados MySQL e configure as informações de conexão no arquivo .env.

### Melhorias Futuras:
- Implementar a funcionalidade de limpar a lista de participantes.
- Melhorar a interface do usuário com mais recursos e estilos.
- Adicionar a funcionalidade de enviar o resultado do sorteio por e-mail.
- Unificar tabelas para se ter uma correlação entre pessoas e sorteio em uma tabela de entidade fraca.
- Criar histórico de sorteios realizados.
