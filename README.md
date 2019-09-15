# Sustentabilidade Site _(nome provisório)_

Projeto de site focado em sustentabilidade para disciplina de Gerenciamento de Projetos e Modelagem de Sistemas.

O projeto back-end será um site seguindo a filosofia REST e arquitetura MVC.

# Sumário
- [Sustentabilidade Site _(nome provisório)_](#sustentabilidade-site-nome-provis%c3%b3rio)
- [Sumário](#sum%c3%a1rio)
- [Instalação](#instala%c3%a7%c3%a3o)
  - [Requisitos](#requisitos)
    - [Composer](#composer)
    - [Ambiente](#ambiente)
    - [Pacotes de instalação](#pacotes-de-instala%c3%a7%c3%a3o)
      - [_Homestead_](#homestead)
      - [XAMPP](#xampp)
      - [Manual](#manual)
        - [BCMath](#bcmath)
        - [Ctype](#ctype)
        - [Mbstring](#mbstring)
        - [OpenSSL](#openssl)
        - [PDO](#pdo)
    - [Servindo a aplicação](#servindo-a-aplica%c3%a7%c3%a3o)
    - [IDE para banco de dados](#ide-para-banco-de-dados)

# Instalação
## Requisitos
Para executar o projeto localmente devem ser atendidos os seguintes requisitos:

> #### :exclamation: ATENÇÃO :exclamation:
>
> Com exceção do **Composer**, **não** instale os programas antes de ler toda a seção, pois serão apresentadas alternativas que podem ser mais convenientes ou adequadas ao seu uso/conhecimento.

- **[PHP](https://www.php.net/downloads.php) >= 7.2.0** 
- **[Composer](https://getcomposer.org/download/)**
- **[Laravel](laravel.com/docs/6.0) 6.0**
  - Extensão PHP **BCMath**
  - Extensão PHP **Ctype**
  - Extensão PHP **Mbstring**
  - Extensão PHP **OpenSSL**
  - Extensão PHP **PDO**
- **[MariaDB](https://mariadb.com/downloads/#mariadb_platform) >= 10.4.7** _com ou sem HeidiSql_ ou **[MySQL](https://dev.mysql.com/downloads/windows/installer/8.0.html) >= 8.0** _com ou sem Workbench_.

### Composer
Instale o composer e o coloque no `path` do seu sistema.

Após clonar repositório, dentro da pasta destino (geralmente `/sustentabilidade-site`) execute o seguinte comando para instalar as dependências de seu projeto:

```powershell
composer install
```
### Ambiente
Verifique se seu projeto conta com um arquivo `.env`, caso não conte, faça uma cópia do arquivo `.env.example` e renomeie-a para `.env`. Então gere sua chave de aplicação com o comando:
```powershell
php artisan key:generate
```

### Pacotes de instalação
Os requisitos listados acima podem ser obtidos através dos links fornecidos ou através de pacotes de instalação e/ou configuração de ambientes de desenvolvimentos.

Aqui serão abordadas algumas opções, lembrando que caberá a você seguir os guias aqui fornecidos e realizar a pesquisa na internet sobre como fazer a aplicação funcionar de acordo com seu método de instalação.

#### _Homestead_
[_Homestead_](https://laravel.com/docs/6.0/homestead) é um ambiente de desenvolvimento provido pelo próprio Laravel com a intenção de agilizar a preparação do ambiente de desenvolvimento. Ele executa em qualquer Windows, Mac ou Linux e atende a todos os requisitos listados.

Se você estiver interessado em uma lista de tudo que o _Homestead_ oferece e as diversas formas de configuração, acesse a [documentação oficial](https://laravel.com/docs/6.0/homestead#included-software), em inglês.

Para essa instalação você irá precisar dos seguintes componentes instalados:

- Um virtualizador como _[VMWare](https://www.vmware.com/br.html), [VirtualBox](https://www.virtualbox.org/wiki/Downloads)_ ou _HyperV_;
- e [Vagrant](https://www.vagrantup.com/downloads.html).

<small> Esse guia utilizará VirtualBox.</small>

Com tudo instalado, execute o seguinte comando no seu terminal:
```powershell
vagrant add box laravel/homestead
```
> Dependendo do seu antivírus ou firewall, a conexão pode ser bloqueada e gerar um erro de SSL. Coloque a conexão na whitelist do antivírus ou firewall e tente novamente.

> Escolha o provider correto, de acordo com o virtualizador escolhido!

Clone este repositório e crie um arquivo `homestead.yaml` na pasta do projeto com o seguinte comando:

No Windows:
```powershell
vendor\\bin\\homestead make
```
No Mac e no Linux:
```bash
php vendor/bin/homestead make
```

Para que o _homestead_ receba as requisições para o seu site, você deve alterar o arquivo de `hosts` do seu sistema. No windows sua localização constuma ser `C:\Windows\System32\drivers\etc\hosts`, já no Mac e no Linux ele normalmente se encontra em `/etc/hosts`.

Insira a seguinte linha no arquivo de `hosts`:
```
192.168.10.10    homestead.test
```

Por fim, para configurar o MariaDB modifique a seguinte linha em seu `homestead.yaml`, na seção de `features`:

```yaml
- mariadb: true
```
Para uma lista de todas as funcionalidades opcionais que podem ser habilitadas, acesse a [documentação oficial](https://laravel.com/docs/6.0/homestead#installing-optional-features), em inglês.

Após isso, basta executar o seguinte comando na pasta do projeto:
```
vagrant up
```

#### XAMPP
O [XAMPP](https://www.apachefriends.org/pt_br/download.html) é um distribuição do Apache para Windows e Linux.

As versões a partir da 7.2.22 atendem os requisitos do sistema para o PHP e o MariaDB.

Como esta instalação tem uma abordagem mais _DIY_, você deve habilitar as extensões PHP e  criar a database que será usada pela aplicação e, então, preencher o `.env` com as credenciais de acesso, conforme pode ser visto na [instalação manual](#manual).

#### Manual
Caso prefira instalar cada componente separadamente para ter somente o estritamente necessário, você deverá habilitar manualmente as extensões PHP no seu arquivo `php.ini`, localizando-as e deixando da seguinte forma:

##### BCMath
```ini
[bcmath]
; Number of decimal digits for all bcmath functions.
; http://php.net/bcmath.scale
bcmath.scale = 0
```

##### Ctype
```ini
; Possui suporte nativo nas versões atuais do PHP,
; a não ser que você esteja utilizando FreeBSD
```

##### Mbstring
```ini
; Para Linux e Mac
extension=mbstring

; Para Windows, a seguinte configuração costuma funcionar melhor
; mas, nada te impede de experimentar a anterior.
; extension=mbstring
extension=php_mbstring.dll
```

##### OpenSSL
```ini
; Para Linux e Mac
extension=openssl

; Para Windows, a seguinte configuração costuma funcionar melhor
; mas, nada te impede de experimentar a anterior.
; extension=openssl
extension=php_openssl.dll
```

##### PDO
```ini
extension=pdo_mysql
```
> **Observação**
>
> No ___Linux___ e no ___Mac___ podem ser necessárias ___instalações de pacotes___ relacionados a essas extensões.
>
> No ___Windows___ pode ser necessário ___download de aquivos DLL___ relacionados a essas extensões.
>
> Esses downloads e instalações __não serão tratados aqui__.

Além disso, você deve se lembrar de configurar sua conexão com o banco de dados no `.env`.

```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=[nome da database]
DB_USERNAME=[usuário]
DB_PASSWORD=[senha, se houver]
```

### Servindo a aplicação
Para poder acessar o site deve-se servir o mesmo, ou seja, executar um servidor que o disponibilize.

Nativamente o Laravel trás essa funcionalidade em sua ferramenta de linha de comando, o `artisan`, portanto não é necessária a instalação de um servidor dedicado. Todo ambiente Laravel pode executar o servidor interno do `artisan` com o seguinte comando, a partir da raíz do projeto:
```powershell
php artisan serve
```
> O ambiente do _Homestead_ utiliza um servidor Nginx pré-configurado e automático, eliminando a necessidade de execução deste comando.

Caso você deseje um servidor mais robusto, podem ser utilizados o [Apache](https://httpd.apache.org) e o [Nginx](https://nginx.org/en/). Embora suas configurações e instalações não sejam cobertas aqui, a [documentação do Laravel](https://laravel.com/docs/6.0/installation#web-server-configuration) tem breves _insides_ sobre o assunto.

### IDE para banco de dados
Você pode achar necessário, durante o desenvolvimento acompanhar os dados direto no banco de dados, assim como talvez edita-los e realizar outros tipos de manutenção.

Para isso pode-se utilizar a linha de comando com do seu SGBD escolhido ou uma **IDE para banco de dados**. 

Caso opte por utilizar uma IDE, recomendo uma das seguintes, embora possa usar qualquer outra não listada:

- [DataGrip](https://www.jetbrains.com/datagrip/), IDE proprietária da _JetBrains_ compatível com inúmeros tipos de bancos de dados. Pode ser obtida por meio de uma licença para estudantes.
- [HeidiSQL](https://www.heidisql.com/download.php), IDE gratuita compatível com MySQL, MariaDB, PostgreSQL a SQL Server. Vem junto com o MariaDB em seu instalador.
- MySQL Workbench, IDE gratuita da _Oracle_ compatível com MySQL e MariaDB, pode ser instalada pelo mesmo instalador do MySQL.
