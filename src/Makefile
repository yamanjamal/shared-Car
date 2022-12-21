.PHONY: help

CONTAINER_PHP=php
CONTAINER_NODE=npm
CONTAINER_DATABASE=database

VOLUME_DATABASE=laravel-blog_db-vol

help: ## Print help.
	@awk 'BEGIN {FS = ":.*##"; printf "\nUsage:\n  make \033[36m<target>\033[0m\n\nTargets:\n"} /^[a-zA-Z_-]+:.*?##/ { printf "  \033[36m%-10s\033[0m %s\n", $$1, $$2 }' $(MAKEFILE_LIST)

ps: ## Show containers.
	@docker compose ps

build: ## Build all containers
	@docker compose build --no-cache .

start: ## Start all containers
	@docker compose up --force-recreate -d

stop: ## Stop all containers
	@docker compose down
	
restart: stop start ## Restart all containers

destroy: stop start ## Destroy all containers
	@docker compose down
	@if ["$(shell docker  volume ls --filter name=${VOLUME_DATABASE} --format {{.Name}})" ]; then \
		@docker volume rm ${VOLUME_DATABASE}; \
	fi
	
fresh: stop destroy build start ## Destroy and recreate all containers

cache: ## Cashe project 
	@docker compose exec ${CONTAINER_PHP} php artisan view:cache 
	@docker compose exec ${CONTAINER_PHP} php artisan config:cache 
	@docker compose exec ${CONTAINER_PHP} php artisan event:cache 
	@docker compose exec ${CONTAINER_PHP} php artisan route:cache 

cache-clear: ## Clear cashe 
	@docker compose exec ${CONTAINER_PHP} php artisan cache:clear
	@docker compose exec ${CONTAINER_PHP} php artisan view:clear 
	@docker compose exec ${CONTAINER_PHP} php artisan config:clear 
	@docker compose exec ${CONTAINER_PHP} php artisan event:clear 
	@docker compose exec ${CONTAINER_PHP} php artisan route:clear 

migrate: ## Run migration files 
	@docker compose exec ${CONTAINER_PHP} php artisan migrate

migrate-fresh: ## Clear database and run all migrations 
	@docker compose exec ${CONTAINER_PHP} php artisan migrate:fresh --seed

npm-install: ## install frontend assets  
	@docker compose run --rm ${CONTAINER_NODE} install

npm-dev: ## Compile all front asset for dev  
	@docker compose exec ${CONTAINER_NODE} run dev

npm-prod: ## Compile all front asset for prod  
	@docker compose exec ${CONTAINER_NODE} run build

npm-watch: ## Watch changes and rebulid front asset for dev  
	@docker compose exec ${CONTAINER_NODE} run watch

logs: ## Print all docker logs
	@docker compose logs -f

logs-php: ## Print php container logs
	@docker compose logs ${CONTAINER_PHP}

logs-node: ## Print node container logs
	@docker compose logs ${CONTAINER_NODE}

logs-database: ## Print database container logs
	@docker compose logs ${CONTAINER_DATABASE}

ssh-php: ## ssh inside php container
	@docker compose exec -it ${CONTAINER_PHP} sh

ssh-node: ## ssh inside node container
	@docker compose exec -it ${CONTAINER_NODE} sh

ssh-database: ## ssh inside database container
	@docker compose exec -it ${CONTAINER_DATABASE} sh