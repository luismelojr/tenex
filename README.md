# Tenex API

## Descrição

O Tenex API é um projeto desenvolvido utilizando **Laravel 11**, containerizado com **Docker** e orquestrado com **Docker Compose**. Ele segue uma estrutura robusta com o uso de **Resources** e **Requests** do Laravel, além de implementar uma **Camada de Serviço** para encapsular a lógica de negócio. Para o tratamento de erros, uma **Configuração de Exceção Personalizada** foi configurada. A API é documentada automaticamente com **Swagger**, facilitando o entendimento e uso dos endpoints disponíveis.

## Tecnologias Utilizadas

- **Docker**: Plataforma para automação e isolamento de aplicações através de contêineres.
- **Docker Compose**: Ferramenta para definir e executar aplicativos Docker multi-contêiner.
- **Laravel 11**: Framework PHP para desenvolvimento web robusto e escalável.
- **Resource**: Utilizado para transformar modelos de dados em respostas JSON.
- **Request**: Validação e formatação de dados de entrada via HTTP.
- **Camada de Serviço**: Abstração da lógica de negócios em classes de serviço.
- **Configuração de Exception Personalizada**: Tratamento customizado para erros e exceções.
- **Swagger**: Ferramenta para documentação automática da API.

## Requisitos

- Docker
- Docker Compose

## Instalação

Siga os passos abaixo para configurar e executar o projeto:

1. **Clone o repositório:**

   ```bash
   git clone https://github.com/luismelojr/tenex.git tenex
   cd tenex
2. **Copie o arquivo `.env.example` para `.env`:**

   ```bash
   cp .env.example .env
3. **Suba os contêineres do Docker:**

   ```bash
    docker compose up -d
4. **Instale as dependências do projeto:**

   ```bash
    docker exec -it tenex-app composer install
   
5. **Execute as migrações do banco de dados:**

   ```bash
    docker exec -it tenex-app php artisan migrate
6. **Gere a chave da aplicação:**

   ```bash
    docker exec -it tenex-app php artisan key:generate
   
7. **Acesse a documentação da API:**

    ```bash
     http://localhost:8000/docs/api#/

