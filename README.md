# Compras API
Projeto desenvolvido para o processo de recrutamento da Betha sistemas, utilizando vue.js, php e mysql.
## Uso
Configurar variáveis de ambiente
* Entrar na raiz do projeto
* Alterar dados do arquivo 'phinx.yml' para os do banco que será utilizado
* Remover '.example' do arquivo '.env.example', e alterar os dados para os do banco que será utilizado

Abrir terminal na pasta raiz do projeto e executar seguintes comandos:
```shell
$ composer install
$ vendor/bin/phix migrate
```
