-Projeto criado com Laravel v9.3.1 (PHP v8.1.2) <br/><br/>
-PHP 8.0 > setado globalmente nas variáis de ambiente<br/><br/>
-Obs {<br/>*Precisa ser criado um database no banco* <br/>
*Precisa ser setado no arquivo .env o DB_DATABASE com o nome do banco criado*
<br/>} <br/><br/>
-Logo após a criação do banco e configuração do arquivo .env, rode o comando no terminal (dentro da pasta do projeto) -> <br>php artisan migrate</b> <br/><br/>
 
-Após rodar o comando acima o Laravel irá criar as tabelas e as colunas necessárias no seu banco para que a API funcione corretamente<br/><br/>

-Obs: Antes de subir o projeto, eu deletei o arquivo .gitignore, o arquivo está puro da forma que está em minha máquina, o comando acima irá funcionar corretamente 😁 
<br/><br/>
<b>Teste feito com a rota de cadastro dos dados do retângulo:</b>
![img01](https://user-images.githubusercontent.com/58890881/156864551-b082e474-28bc-4f8b-be40-40c20eb750c4.png)
<br/><br/>
<b>Teste feito com a rota de cadastro dos dados do triângulo:</b>
![img02](https://user-images.githubusercontent.com/58890881/156864554-32ec95de-a237-44a1-86ea-84879f86610c.png)
<br/><br/>
<b>Teste feito com a rota que retorna o valor da soma das áreas de todos os polígonos cadastrados:</b>
![img03](https://user-images.githubusercontent.com/58890881/156864555-35ec0af8-a35c-4fec-b399-293cf282d5d5.png)
<br/><br/>

A API também tem outras rotas extras, como por exemplo, rotas que retornam todos os cadastros tanto dos retângulos quanto dos triângulos (todos e por ID),
rota para editar os dados (filtrando por ID) cadastrados de ambos os polígonos e também uma rota para deletar os dados cadastrados (filtrando por ID) 😄

<h2>Todas as rotas:</h2>
<h4>(post)Cadastrar retangulos: api/rectangle</h4>
<h4>(get)Retorna todos os retangulos cadastrados: api/rectangles</h4>
<h4>(get)Retorna o retangulo por ID: api/rectangle/{id}</h4>
<h4>(put)Atualiza os dados do retangulo por ID: api/rectangle/{id}</h4>
<h4>(delete)Deleta os dados do retangulo por ID: api/rectangle/{id}</h4>
<h4>(post)Cadastrar triangulos: api/triangle</h4>
<h4>(get)Retorna todos os triangulos cadastrados: api/triangles</h4>
<h4>(get)Retorna o triangulo por ID: api/triangle/{id}</h4>
<h4>(put)Atualiza os dados do triangulo por ID: api/triangle/{id}</h4>
<h4>(delete)Deleta os dados do triangulo por ID: api/triangle/{id}</h4>
<h4>(get)Retorna a soma das áreas de todos os polígonos cadastrados: api/polygonarea</h4>

-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
