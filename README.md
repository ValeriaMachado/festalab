# 
## Endpoinds disponibilizados

Ambos devem ser consumidos utilizando POST.

**/Bug/forToday** receberá um Json conforme descrito na sessão abaixo e irá retornar como resposta um array de bugs que deverão ser resolvidos hoje. Como paramêtro para seleção, serão resolvidos bugs com prioridade critica ou idade maior que dois.

**/Bug/separatedForDevs** receberá um Json conforme descrito na sessão abaixo e irá retornar como resposta um array de bugs devidamente separado para que cada posição represente o dia de trabalho de um desenvolvedor.

## Entrada esperada

Ambos endpoints esperar receber como entrada um Json contendo um array de jsons de bugs.

Seguindo a estrutura abaixo: 

```
{
    "bugs": 
    [
        {"titulo": "Convidados não conseguem confirmar a presença em um evento", "idade": "1", "estimativa": 2, "prioridade": "Crítico"},
        {"titulo": "Usuários não conseguem criar novos convites", "idade": "2", "estimativa": 6, "prioridade": "Crítico"},
        {"titulo": "Email de boas vindas apresenta ícone em cor fora da paleta de cores", "idade": "3", "estimativa": 8, "prioridade": "Baixa"},
        {"titulo": "Imagens do background da aplicação estão demorando para carregar", "idade": "1", "estimativa": 2, "prioridade": "Média"}
    ]
}
```

## Entendendo a estrutura de um "Bug" 

Todos os bugs serão formados de um titulo, idade, estimativa e prioridade. Para isso, foi definido que, por padrão o título de um bug sempre deverá ser uma *String*, a idade um *número inteiro* que represente o(s) dias desde o cadastro do bug, estimativa um *número flutuante* usando hora como unidade de medida e prioridade uma *String*.

## Como utilizar a aplicação

Após garantir a instação de todos os requisitos mencionados na última sessão deste documento, o usuário deverá executar o seguinte comando no terminal: 

`php spark serve`

Após a excecução bem sucedida, voce receberá em tela o endereço do seu servidor local.
Por padrão, a aplicação tentará utilizar o endereço: `http://localhost:8080`
Uma vez que, você tenha seu endereço, basta concatenar com os endpoints das API's disponibilizadas. 

Exemplo: 
`http://localhost:8080/Bug/forToday`
`http://localhost:8080/Bug/separatedForDevs`

## Como testar a aplicação

Para testar a aplicação, basta excecutar os seguintes comandos: 

`ln -s ./vendor/bin/phpunit ./phpunit`
`./phpunit`

## Requisitos

PHP versão 7.4 ou superior, com as seguintes extensões:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php)

## Mini mapa de acesso rápido ao código :)

`app/Controllers/Bug.php` Controler responsável por receber e encaminhar requisições.
`app/Services/BugHandler.php` Service que cuida de toda regra de negócio por trás do gerenciamento dos bugs.
`tests/unit/` Testes unitários da aplicação. 
