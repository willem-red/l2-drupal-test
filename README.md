# Projeto Drupal - Guia de Instalação e Configuração

Este projeto Drupal foi estruturado com a stack **Docker4Drupal** para facilitar o desenvolvimento, configuração e implantação do ambiente Docker. Para informações adicionais sobre a stack Docker4Drupal, consulte o arquivo `README_Docker4Drupal.md`.

## Requisitos

- Docker e Docker Compose instalados
- Ferramenta `make` para facilitar a execução de comandos

## Passos para Instalação e Configuração

### 1. Configuração de Hosts

Para que o projeto funcione corretamente em ambiente local, é necessário configurar o domínio do site no arquivo de hosts do sistema:

1. Abra o arquivo de hosts do sistema:
   - **Linux/Mac**: `/etc/hosts`
   - **Windows**: `C:\Windows\System32\drivers\etc\hosts`

2. Adicione a seguinte linha para direcionar o domínio `drupal.docker.localhost` ao IP local:

   ```plaintext
   127.0.0.1 drupal.docker.localhost
   ```

### 2. Instanciação do Projeto

O projeto pode ser iniciado facilmente utilizando o comando `make`. Certifique-se de estar na raiz do projeto e execute:

```bash
make up
```

Este comando fará o build dos containers Docker necessários e iniciará o ambiente de desenvolvimento.

### 3. Instalação dos Pacotes

Após os containers estarem em execução, instale os pacotes do projeto com o Composer:

```bash
make composer install
```

Este comando irá baixar todas as dependências e configurar o ambiente Drupal com os pacotes necessários para a execução do projeto.

### 4. Acesso ao Projeto

Com os containers em execução e os pacotes instalados, você pode acessar a aplicação no navegador, através da URL:

```plaintext
http://drupal.docker.localhost:8000
```

## Funcionalidades do Projeto

O projeto inclui um módulo customizado, localizado em `web/modules/custom/l2-cases`, que contém as seguintes funcionalidades:

- **Tipo de Conteúdo Personalizado**: Um novo tipo de conteúdo chamado `Case`, com campos específicos, foi implementado para gerenciamento dos cases da empresa.
- **Página de Listagem de Cases**: Uma página dedicada para listar todos os conteúdos do tipo `case` (incluindo título, imagem e descrição) foi desenvolvida para exibição no site. Esta página está acessível em:

  ```plaintext
  http://drupal.docker.localhost:8000/l2-cases
  ```

- **API RESTful para Cases**: O módulo também implementa um endpoint API que permite listar todos os cases via requisição HTTP. Esse endpoint foi configurado para retornar os cases em formato JSON, possibilitando a integração com outras plataformas ou ferramentas de visualização de dados.

### Estrutura do Módulo Customizado

O módulo `l2-cases` é estruturado da seguinte forma:

- **Configuração do Tipo de Conteúdo**: Define o tipo de conteúdo `Case` e seus campos associados.
- **Implementação de Página de Listagem**: Gera uma página que exibe todos os conteúdos do tipo `case` para acesso público, acessível em `/l2-cases`.
- **Endpoint REST API**: Disponibiliza um endpoint `/api/cases` para listar todos os cases em formato JSON, acessível para integrações e consulta externa.

Para testar a API, você pode utilizar a URL:

```plaintext
http://drupal.docker.localhost:8000/api/cases
```

## Referências Adicionais

Para mais informações sobre como a stack Docker4Drupal funciona, consulte o arquivo `README_Docker4Drupal.md`. 

Isso completa a configuração e instalação básica do projeto!