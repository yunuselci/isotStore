@servers(['web' => 'deneme'])

@task('deploy')
    cd /home/laravel/isotStore
    git pull origin master
    composer install --no-dev --no-interaction
    npm install
    npm run prod
@endtask
