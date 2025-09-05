# 🚀 Projeto EPI - Guia de Configuração

Este guia mostra como configurar e executar o projeto após um `git clone`.

## 📋 Pré-requisitos

- Docker
- Docker Compose
- Git

## 🔧 Configuração Inicial (Após git clone)

### 1. Clone do Repositório
```bash
git clone https://github.com/cleytonfs777/ProjetoEPISdal2.0.git
cd ProjetoEPISdal2.0
```

### 2. Configuração do Ambiente

#### 2.1 Criar arquivo .env
```bash
cd app
cp .env.example .env
```

#### 2.2 Configurar banco de dados no .env
Edite o arquivo `app/.env` e configure as seguintes variáveis:
```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=projetoepi
DB_USERNAME=projetoepi
DB_PASSWORD=secret
```

### 3. Inicialização com Docker

#### 3.1 Construir e iniciar os containers
```bash
# Voltar para a raiz do projeto
cd ..

# Iniciar containers
docker compose up --build -d
```

#### 3.2 Instalar dependências PHP
```bash
docker compose run --rm php bash -c "cd /var/www/html/app && composer install --no-dev --optimize-autoloader"
```

#### 3.3 Gerar chave da aplicação
```bash
docker compose run --rm php bash -c "cd /var/www/html/app && php artisan key:generate"
```

#### 3.4 Criar estrutura de pastas necessárias
```bash
docker compose exec php bash -c "cd /var/www/html/app && mkdir -p storage/{app,framework/{cache,sessions,testing,views},logs} && chmod -R 775 storage && chmod -R 775 bootstrap/cache"
```

#### 3.5 Executar migrações do banco
```bash
docker compose run --rm php bash -c "cd /var/www/html/app && php artisan migrate"
```

#### 3.6 Limpar caches
```bash
docker compose exec php bash -c "cd /var/www/html/app && php artisan config:clear && php artisan cache:clear && php artisan view:clear"
```

#### 3.7 Reiniciar container PHP
```bash
docker compose restart php
```

## 🌐 Acessando a Aplicação

- **Aplicação Laravel**: http://localhost:8000
- **Banco MySQL**: localhost:3306
  - Usuário: `projetoepi`
  - Senha: `secret`
  - Database: `projetoepi`

## 📝 Comandos Úteis

### Gerenciar Containers
```bash
# Iniciar projeto
docker compose up -d

# Parar projeto
docker compose down

# Ver logs
docker compose logs -f

# Ver status dos containers
docker compose ps
```

### Executar Comandos Laravel
```bash
# Executar comando artisan
docker compose exec php php artisan [comando]

# Exemplo: criar migration
docker compose exec php php artisan make:migration create_example_table

# Executar migrações
docker compose exec php php artisan migrate

# Limpar cache
docker compose exec php php artisan cache:clear
```

### Acessar Container
```bash
# Acessar bash do container PHP
docker compose exec php bash

# Executar composer
docker compose exec php composer [comando]
```

## 🗂️ Estrutura do Projeto

```
ProjetoEPISdal2.0/
├── app/                    # Código Laravel
│   ├── app/               # Classes da aplicação
│   ├── config/            # Configurações
│   ├── database/          # Migrações e seeders
│   ├── resources/         # Views e assets
│   ├── routes/            # Rotas
│   └── .env              # Configurações de ambiente
├── docker-compose.yml     # Configuração Docker
├── Dockerfile            # Imagem PHP personalizada
└── SETUP.md              # Este arquivo
```

## 🛠️ Solução de Problemas

### Container PHP não inicia
```bash
# Ver logs do container
docker compose logs php

# Verificar dependências
docker compose exec php composer install
```

### Erro de permissões
```bash
# Ajustar permissões das pastas
docker compose exec php chmod -R 775 storage bootstrap/cache
```

### Erro de cache
```bash
# Limpar todos os caches
docker compose exec php php artisan config:clear
docker compose exec php php artisan cache:clear
docker compose exec php php artisan view:clear
```

### Erro de banco de dados
```bash
# Verificar se MySQL está rodando
docker compose ps

# Executar migrações novamente
docker compose exec php php artisan migrate
```

## 🔄 Workflow de Desenvolvimento

1. **Fazer alterações no código** na pasta `app/`
2. **As alterações são refletidas automaticamente** (volumes Docker)
3. **Para comandos artisan**: usar `docker compose exec php php artisan [comando]`
4. **Para instalar pacotes**: usar `docker compose exec php composer require [pacote]`

## 📊 Informações dos Containers

| Container | Serviço | Porta | Descrição |
|-----------|---------|--------|-----------|
| projetoepi-php | Laravel | 8000 | Aplicação PHP/Laravel |
| projetoepi-mysql | MySQL | 3306 | Banco de dados |

---

### 💡 Dica
Para um setup mais rápido, você pode executar todos os comandos de uma vez:

```bash
# Setup completo em uma linha (após git clone)
cd ProjetoEPISdal2.0 && \
cp app/.env.example app/.env && \
docker compose up --build -d && \
docker compose run --rm php bash -c "cd /var/www/html/app && composer install --no-dev --optimize-autoloader" && \
docker compose run --rm php bash -c "cd /var/www/html/app && php artisan key:generate" && \
docker compose exec php bash -c "cd /var/www/html/app && mkdir -p storage/{app,framework/{cache,sessions,testing,views},logs} && chmod -R 775 storage && chmod -R 775 bootstrap/cache" && \
docker compose run --rm php bash -c "cd /var/www/html/app && php artisan migrate" && \
docker compose exec php bash -c "cd /var/www/html/app && php artisan config:clear && php artisan cache:clear && php artisan view:clear" && \
docker compose restart php
```

**⚠️ Lembre-se de editar o arquivo `app/.env` com as configurações do banco antes de executar os comandos!**
