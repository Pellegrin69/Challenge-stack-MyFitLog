# Challenge-stack-MyFitLog

## START BACKEND SERVER:
- cd backend
- cp .env .env.local
- in the .env.local file, verify the DATABASE_URL is available for postgres
- docker-compose up -d
- composer install
- php bin/console doc:sc:up
- symfony server:start

## START FRONTEND SERVER:
- yarn dev

# To make a Pull request
* create branch based on main / develop, and after push we can review the 
PR (pull request) in github and if its approve, we can merge this PR into the 
branch

