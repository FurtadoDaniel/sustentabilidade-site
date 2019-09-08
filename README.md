# Sustentabilidade Site _(nome provisório)_

Projeto de site focado em sustentabilidade para disciplina de Gerenciamento de Projetos e Modelagem de Sistemas.

O projeto back-end será um site seguindo a filosofia Rest e arquitetura MVC.

# Instalação
## Requisitos
Para executar o projeto localmente devem ser atendidos os seguintes requisitos:

> #### :exclamation: ATENÇÃO :exclamation:
> Não instale os programas antes de ler toda a seção, pois serão apresentadas alternativas que podem ser mais convenientes ou adequadas ao seu uso/conhecimento.

- **[PHP](https://www.php.net/downloads.php) >= 7.2.0** 
- **[Composer](https://getcomposer.org/download/)**
- **[Laravel](laravel.com/docs/6.0) 6.0**
  - Extensão PHP **BCMath**
  - Extensão PHP **Ctype**
  - Extensão PHP **JSON**
  - Extensão PHP **Mbstring**
  - Extensão PHP **OpenSSL**
  - Extensão PHP **PDO**
  - Extensão PHP **Tokenizer**
  - Extensão PHP **XML**
- **[MariaDB](https://mariadb.com/downloads/#mariadb_platform) >= 10.4.7** _com ou sem HeidiSql_ ou **[MySQL](https://dev.mysql.com/downloads/windows/installer/8.0.html) >= 8.0** _com ou sem Workbench_.

### Pacotes de instalação
Os requisitos listados acima podem ser obtidos através dos links fornecidos ou através de pacotes de instalação e/ou configuração de ambientes de desenvolvimentos.

Aqui serão abordadas algumas opções, lembrando que caberá a você seguir os guias aqui fornecidos e realizar a pesquisa na internet sobre como fazer a aplicação funcionar de acordo com seu método de instalação.

#### _Homestead_
[_Homestead_](https://laravel.com/docs/6.0/homestead) é um ambiente de desenolvimento provido pelo próprio Laravel com a intenção de agilizar a preparação do ambiente de desenvolvimento. Ele executa em qualquer Windows, Mac ou Linux e atende a todos os requisitos listados.

Se você estiver interessado em uma lista de tudo que o _Homestead_ oferece e as diversas formas de configuração, acesse a [documentação oficial](https://laravel.com/docs/6.0/homestead#included-software), em inglês.

Para essa instalação você irá precisardos seguintes componentes instalados:

- PHP;
- Composer;
- Um virtualizador como _[VMWare](https://www.vmware.com/br.html), [VirtualBox](https://www.virtualbox.org/wiki/Downloads)_ ou _HyperV_;
- e [Vagrant]()
###### Esse guia utilizará VMWare.


### IDE para banco de dados
Você pode achar necessário, durante o desenvolvimento acompanhar os dados direto no banco de dados, assim como talve edita-los e realizar outros tipos de manutenção.

Para isso pode-se utilizar a linha de comando com do seu SGBD escolhido ou uma **IDE para banco de dados**. 

Caso opte por utilizar uma IDE, recomendo uma das seguintes, embora possa usar qualquer outra não listada:

- [DataGrip](https://www.jetbrains.com/datagrip/), IDE proprietária da _JetBrains_ compatível com inúmeros tipos de bancos de dados. Pode ser obtida por meio de uma licença para estudantes.
- [HeidiSQL](https://www.heidisql.com/download.php), IDE gratuita compatível com MySQL, MariaDB, PostgreSQL a SQL Server. Vem junto com o MariaDB em seu instalador.
- MySQL Workench, IDE gratuita da _Oracle_ compatível com MySQL e MariaDB, pode ser instalada pelo mesmo instalador do MySQL.
