@servers(['testing' => 'root@128.199.105.141', 'purwakarta' => 'smading@10.45.5.20'])

@task('stage', ['on' => 'testing'])
    cd /home/udibagas/apps/smading
    git pull
    php artisan migrate
@endtask

@task('deploy', ['on' => 'purwakarta'])
    git pull
    php artisan migrate
@endtask
