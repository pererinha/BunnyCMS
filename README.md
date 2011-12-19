BunnyCMS
=============

Eu criei o BunnyCMS porque vi a necessidade de uma ferramenta simples para meu blog.

Instalação
----------

A instalação do BunnyCMS é simples. ( Está no meu TODO list criar um instalador ).

1. Edite o arquivo \application\config\production\application.php (linha 3)
	'url' => 'url para o bunnycms',

2. Edite o arquivo \application\config\production\database.php. Coloque os dados do banco de dados.

3. Execute o arquivo bunny.sql no seu banco da dados.

4. Para acessar a área administrativa acesse a url /admin. O login é 'admin' e a senha inicial é 'admin' também.


Obrigado para:
--------
* [Laravel](http://laravel.com/) Mais uma vez utilizei o Laravel para em um projeto.
* [Mustache.php](https://github.com/bobthecow/mustache.php) Utilizei o Mustache.php para templates.
* [NicEdit](http://nicedit.com/) Editor WYSIWYG.
* [Bootstrap, from Twitter] (http://twitter.github.com/bootstrap/) Utilizado na área administrativa


TODO
------------

1. Instalador.
2. RSS.
3. Documentação

[r2h]: http://github.com/github/markup/tree/master/lib/github/commands/rest2html
[r2hc]: http://github.com/github/markup/tree/master/lib/github/markups.rb#L13
[1]: http://github.com/github/markup/issues