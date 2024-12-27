<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre o Projeto

Este projeto é um sistema de gerenciamento de pessoas e contatos desenvolvido com o framework Laravel. Ele permite criar, visualizar, editar e excluir registros de pessoas e seus respectivos contatos.

## Estrutura do Projeto

### Modelos

#### Person

O modelo `Person` representa uma pessoa no sistema. Ele possui os seguintes atributos:
- `name`: Nome da pessoa.
- `email`: E-mail da pessoa.
- `avatar`: URL do avatar da pessoa.

O modelo `Person` também possui um relacionamento `hasMany` com o modelo `Contact`.

#### Contact

O modelo `Contact` representa um contato no sistema. Ele possui os seguintes atributos:
- `country_code`: Código do país do número de telefone.
- `number`: Número de telefone.
- `person_id`: ID da pessoa associada ao contato.

O modelo `Contact` possui um relacionamento `belongsTo` com o modelo `Person`.

### Controladores

#### PersonController

O `PersonController` gerencia as operações CRUD para o modelo `Person`. Ele possui os seguintes métodos:
- `index()`: Exibe uma lista de todas as pessoas.
- `create()`: Exibe o formulário para criar uma nova pessoa.
- `store(Request $request)`: Armazena uma nova pessoa no banco de dados.
- `show($id)`: Exibe os detalhes de uma pessoa específica.
- `edit($id)`: Exibe o formulário para editar uma pessoa existente.
- `update(Request $request, $id)`: Atualiza uma pessoa existente no banco de dados.
- `destroy($id)`: Remove uma pessoa do banco de dados.

#### ContactController

O `ContactController` gerencia as operações CRUD para o modelo `Contact`. Ele possui os seguintes métodos:
- `index()`: Exibe uma lista de todos os contatos.
- `create()`: Exibe o formulário para criar um novo contato.
- `store(Request $request)`: Armazena um novo contato no banco de dados.
- `show($id)`: Exibe os detalhes de um contato específico.
- `edit($id)`: Exibe o formulário para editar um contato existente.
- `update(Request $request, $id)`: Atualiza um contato existente no banco de dados.
- `destroy($id)`: Remove um contato do banco de dados.

### Views

#### index.blade.php

Exibe a lista de contatos. Cada contato é exibido com seu código do país, número de telefone e ID da pessoa associada. Também há opções para editar e excluir cada contato.

#### index.blade.php-1

Exibe a lista de pessoas. Cada pessoa é exibida com seu avatar, nome e e-mail. Também há opções para visualizar, editar e excluir cada pessoa.

#### index.blade.php-2

Página inicial do sistema de gerenciamento. Contém links para as seções de pessoas, contatos e estatísticas.

#### edit.blade.php

Formulário para editar um contato existente. Permite atualizar o código do país e o número de telefone.

#### edit.blade.php-1

Formulário para editar uma pessoa existente. Permite atualizar o nome e o e-mail da pessoa.

#### show.blade.php

Exibe os detalhes de uma pessoa específica, incluindo seu avatar, nome, e-mail, telefone e endereço. Também há opções para editar e excluir a pessoa.

## Contribuindo

Obrigado por considerar contribuir para o projeto! O guia de contribuição pode ser encontrado na [documentação do Laravel](https://laravel.com/docs/contributions).

## Licença

O framework Laravel é um software de código aberto licenciado sob a [licença MIT](https://opensource.org/licenses/MIT).

## Referência do Projeto

Confira o projeto em [https://marcoslourenco-lv2.recruitment.alfasoft.pt/](https://marcoslourenco-lv2.recruitment.alfasoft.pt/)
