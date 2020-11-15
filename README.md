## Sobre a aplicação

Utilizei o [Laravel](https://laravel.com) como sendo o framework pelas facidades porporcionadas para validação dos campos no request e para construção de query contra o banco de dados.

## Para rodar o projeto

O projeto conta com o Dockerfile para permitir o rápido deploy usando o [Docker](https://www.docker.com/).

Clone o projeto:
```sh
git clone https://github.com/laurocj/corrida-deliverit.git
```
Navege até a pasta do projeto.

Execute:

```sh
docker-compose build app

docker-compose up -d

docker-compose exec app composer deploy-docker

```

O projeto estará diponível em http://localhost:8080

### As rotas 

Para salvar um participant

POST http://localhost:8000/api/participants
```json
{
    "name":"João da silva",
    "birth": "2022-11-13",
    "cpf":"123.123.123-56"
}
```
Para salvar uma corrida
POST http://localhost:8000/api/racings
```json
{
    "distance":1,
    "date": "2022-11-13"
}
```
Para adicionar um participante em uma corrida
POST http://localhost:8000/api/race-participants 
```json
{
    "participant": 1,
    "racing": 1
}
```
OU
```json
{
    "participant": 1,
    "racing": 1,
    "start" : "08:00:00",
    "finish" : "08:00:00"
}
```

Para recerber a classificação geral
GET http://localhost:8000/api/results 
OU 
GET http://localhost:8000/api/results?age=0

Para recerber a classificação por idade
GET http://localhost:8000/api/results?age=1

### Temos teste tb

Estando na pasta do projeto

vendor/bin/phpunit
