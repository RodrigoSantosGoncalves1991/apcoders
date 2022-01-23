## Instalação
Você pode clonar este repositório OU baixar o .zip

Ao descompactar, é necessário rodar o **composer** pra instalar as dependências e gerar o *autoload*.

Vá até a pasta do projeto, pelo *prompt/terminal* e execute:
> composer install

Depois é só aguardar.

## Configuração
Todos os arquivos de **configuração** e aplicação estão dentro da pasta *src*.

As configurações de Banco de Dados e URL estão no arquivo *src/Config.php*

É importante configurar corretamente a constante *BASE_DIR*:
> const BASE_DIR = '/**PastaDoProjeto**/public';

## Uso
Você deve acessar a pasta *public* do projeto.

O ideal é criar um ***alias*** específico no servidor que direcione diretamente para a pasta *public*.

## Modelo de MODEL
```php
<?php
namespace src\models;
use \core\Model;

class Usuario extends Model {

}
```

## Instruções de como rodar a aplicação 

Para rodar o sistema em seu computador é necessário que você faça download e instale o XAMPP (XAMPP é uma distribuição do Apache fácil de instalar contendo PHP e MySQL), no link a seguir temos as opções para download: https://www.apachefriends.org/pt_br/download.html, o projeto foi implementado usando a linguagem de programação PHP e padrão de projetos MVC, o banco de dados utilizado no projeto foi o MySQL, na figura a seguir vemos como utilizar o XAMPP no projeto, basicamente você deve ativar os módulos Apache e MySQL:

![alt text](https://drive.google.com/file/d/1FXjwHvEQXdhML6oaIElvf6tsXuC-0nYN/view?usp=sharing)