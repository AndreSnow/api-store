<h1 align="center">Api Store</h1>

   <p>
   
   - [Sobre](#sobre)
   - [Preview](#preview)
   - [Funcionalidades](#Funcionalidades)
   - [Desafios e Aprendizados no Caminho](#desafios-e-aprendizados-no-caminho)
   - [Como Usar](#como-usar)
   - [Como Contribuir](#como-contribuir)
   - [Licença](#licença)

   </p>

---

<h2 align="center">Sobre</h2>

Essa api foi desenvolvida como uma loja. \
Nela podemos criar produtos, novas lojas, há tambem uma função para quando uma nova loja ou produto é criada, receber por email a messagem de sucesso;

Documentação no [postman](https://documenter.getpostman.com/view/14026033/UzQuN55J)
Collection do [postman](/collection/Api%20Store.postman_collection.json)

<a href=""></a>

</p>

---

<h2 align="center">Preview</h2>

   <p align="center">
    <img src="https://i.ibb.co/yPs4TBQ/Screenshot-from-2022-07-13-20-47-59.png"><width="400" alt="Preview">
   </p>

---

<h2 align="center">Funcionalidades</h2>
   
- Gerenciar a criação de lojas e produtos,\
sobre a loja:
   > listar todas;\
   > listar uma especifica;\
   > criar;\
   > atualizar;\
   > deletar;

   sobre os produtos:

   > listar todos;\
   > listar um especifico;\
   > listar ativos;\
   > criar;\
   > atualizar;\
   > deletar;

-   Aqui podemos conferir o funcionamento do RabbitMQ para o gerenciamento de fila no envio de emails:
<p align="center">
<img src="https://i.ibb.co/0qJmxK1/Screenshot-from-2022-07-13-18-48-59.png"><width="400" alt="RabbitMQ gerenciando filas">

-   Aqui o MailTrap recebendo os emails após passarem pela fila do RabbitMQ:
<p align="center">
<img src="https://i.ibb.co/jvNzvT7/Screenshot-from-2022-07-13-18-49-16.png"><width="400" alt="MailTrap Recebendo emails de sucesso">

---

<h2 align="center">Desafios e Aprendizados no Caminho</h2>

   <p>
    <br>
    <a>Foi um projeto onde eu quis me desafiar e posso dizer que consegui, apesar de já ter trabalhado com envio de emails, aqui eu decidir usar o RabbitMQ, por algum motivo ele não queria funciona, descobri que era um problema nas configurações do drive, infelizmente isso tomou muito tempo, mas fiz pois gostaria de entregar um projeto mais completo, também foi necessário relembrar alguns conceitos nas questões dos testes</a><br>
   </p>

---

<h2 align="center">Como Usar</h2>

-   Clone esse repositorio:

```sh
git clone https://github.com/AndreSnow/api-store.git
```

-   Entrar no diretorio:

```sh
cd api-store
```

-   Rodar o app pelo docker:

```sh
sudo su
```

```sh
docker-compose up -d --build
```

-   Necessário entrar no docker, use

```
docker exec -it api-store bash
```

-   Instalar as dependências:

```sh
composer install
```

-   Todas as migrations funcionam, para rodar basta estar dentro do container e digitar

```
php artisan migrate
```

-   Parar o container

```sh
docker-compose stop
```

-   Também é possível rodar o app pelo serve do laravel, mas será necessário ter:
    > PHP >= 8.0\
    > MYSQL >= 8.0\
    > Redis\
    > Laravel >= 9.0

```sh
php artisan serve
```

-   Teste pelo postman usando a rota:

```sh
{{host}}api/store
```

-   É possivel testar diretamente pela aplicação, nos testes do laravel e deve retornar isso

```sh
php artisan test
```

<p align="center">
<img src="https://i.ibb.co/6BD8QLM/Screenshot-from-2022-07-13-16-02-47.png"><width="400" alt="Teste de software">
</p>

-   Também acrescentei um teste na qualidade do software
 <p align="center">
<img src="https://i.ibb.co/JFYfRNW/Screenshot-from-2022-07-13-19-11-34.png"><width="400" alt="Qualidade de software">
</p>

```sh
./vendor/bin/phpinsights
```

---

<h2 align="center">Como Contribuir</h2>

-   De um Fork no projeto.

-   Crie uma nova branch com sua modificações:

```sh
git checkout -b my-feature
```

-   Salve suas configurações e crie um commit dizendo com o que você contribuiu:

```sh
git commit -m "feature: My new feature"
```

-   Nos envie:

```sh
git push origin my-feature
```

---

<h2 align="center">Licença</h2>

<p align="center">
   Este repositório está sob licença MIT. Você pode acessar o arquivo <a href="https://github.com/AndreSnow/GDT/blob/develop/LICENSE">LICENSE</a> para mais detalhes. 😉
</p>

---

Esse projeto foi desenvolvido por **[@André Neves](https://www.linkedin.com/in/andré-n-922181a6/)**.

---

Se isso te ajudou, dê uma ⭐, isso vai me ajudar também!
😉

---

   <div align="center">

[![Linkedin Badge](https://img.shields.io/badge/-Andre%20Neves-292929?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/andr%C3%A9-n-922181a6/)](https://www.linkedin.com/in/andré-n-922181a6/)

   </div>
