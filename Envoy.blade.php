@servers(['testing' => 'root@128.199.105.141', 'local' => 'smading@10.45.5.20', 'public' => 'smading@114.6.180.154'])

@task('stage', ['on' => 'testing'])
    cd /home/udibagas/apps/smading
    git pull
    php artisan migrate
@endtask

@task('deploy', ['on' => 'public'])
    git pull
    php artisan migrate
@endtask
