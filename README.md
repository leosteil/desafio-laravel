# desafio-laravel

## Executar:
php artisan migrate <br />
php artisan serve <br />

## Rotas:
### Agenda:
GET:: api/agendas - retorna todas as agendas <br />
GET:: api/agendas/{id} - retorna uma unica agenda<br />
GET:: api/agendas/{id}?data_inicio=''&data_fim='' - retorna uma unica agenda com suas atividades com prazos entre as datas passadas<br />
POST:: api/agendas - insere uma nova agenda (
JSON exemplo:
{
	"nome" : "Nova agenda 2"
}) <br>
PUT:: api/agendas/{id} - edita uma agenda<br />
DELETE:: api/agendas/{id} - deleta uma agenda<br />

## Rotas:
### Atividades:
GET:: api/atividades - retorna todas as atividades <br />
GET:: api/atividades/{id} - retorna uma unica atividade<br />
POST:: api/atividades - insere uma nova atividade (
JSON exemplo:
{
	"titulo": "Teste",
	"descricao": "Teste",
	"status": "Iniciada",
	"data_inicio": "2019-03-01",
	"data_prazo": "2019-04-10",
	"data_conclusao": "2019-12-01",
	"user_id": 1,
	"agenda_id": 3
}) <br>
PUT:: api/atividades/{id} - edita uma atividade<br />
DELETE:: api/atividades/{id} - deleta uma atividade<br />

## Modelo relacional
![Image of Yaktocat](https://github.com/leosteil/desafio-laravel/blob/master/Screenshot_1.png) <br>
A partir da descrição do problema criei este modelo relacional para representar as entidades da API. Além destas tabelas, é feito o uso da tabela users, criada automaticamente pelo laravel.
Cada Agenda possui N Atividades e cada Atividade pertence a uma Agenda.<br>

Para criar um usuário poderão ser utilizados os seguintes comando:<br>
php artisan tinker<br>
$user = new User<br>
$user->name = "Leonardo"<br>
$user->email = "john.doe@foo.bar"<br>
$user->email = "1111456"<br>
$user->save()<br>
