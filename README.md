# API do Controle de Tarefas

## Como Subir a aplicação Localmente

## Pré-requisitos

- Ter o docker configurado em sua máquina - [Você pode ver um tutorial aqui](https://www.youtube.com/watch?v=Lgh8JgcYFwM)
- Ter um editor de texto para ajuda-lo na configuração - [Visual Studio Code Serve](https://code.visualstudio.com/)

## Instalação

- Baixe o repositório

      git@github.com:papperuniasselvi/papper-backend-2024-1.git
- Copie o .env.example para .env
      
      cp .env.example .env
- Execute o build da imagem docker

      docker-compose build
- Suba os containers da aplicação

      docker-compose up -d
- Execute o script de migration para criar as tabelas no banco

      docker-compose exec app php artisan migrate
- Você já deve conseguir ver a aplicação rodando no ambiente [local](http://localhost:8001/).
- Para acessar o swagger acesse por [aqui](http://localhost:8001/api/documentation).
