@servers(['testing' => ['root@128.199.105.141']])

@task('deploy', ['on' => 'testing'])
    cd /home/udibagas/apps/smading
    git pull
    php artisan migrate
@endtask
