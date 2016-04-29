@servers(['web' => 'robusta-server'])

<?php
    $repo = 'https://github.com/MussabElDash/Robusta-studio-support-team.git';
    $branch = 'develop';
    $project_dir = '/home/ubuntu/my-apps/Robusta-studio-support-team';

    $slack_hook = 'https://hooks.slack.com/services/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';
    $slack_channel1 = 'team';
    $slack_channel2 = 'team-one';
?>

@task('deploy')
    echo "starting"
    cd {{ $project_dir }}
    git checkout {{ $branch }}
    git checkout -- .
    git pull origin {{ $branch }}
    sudo chmod -R 777 storage
    echo "done pulling"

    cd {{ $project_dir }}
    sudo composer install --prefer-dist
    sudo composer update
    echo "done installing dependencies"

    cd {{ $project_dir }}
    php artisan cache:clear
    php artisan view:clear
    php artisan config:cache
    echo "done cleaning (Y)"

    cd {{ $project_dir }}
    echo "migrating ...."
    php artisan migrate:rollback
    php artisan migrate
    sudo composer dumpautoload -o
    echo "done migrating (Y)"

    echo "seeding ...."
    php artisan db:seed
    echo "done seeding (Y)"
@endtask

@task('pulling_changes')
    echo "starting"
    cd {{ $project_dir }}
    git checkout {{ $branch }}
    git pull origin {{ $branch }}
    echo "done pulling"
@endtask

@task('installing_dependencies')
    cd {{ $project_dir }}
    sudo composer install --prefer-dist
    echo "done installing dependencies"
@endtask

@task('clean')
    cd {{ $project_dir }}
    php artisan cache:clear
    php artisan view:clear
    php artisan config:cache
    echo "done cleaning (Y)"
@endtask

@task('migrating')
    cd {{ $project_dir }}
    echo "migrating ...."
    php artisan migrate
    sudo composer dumpautoload -o
    echo "done migrating (Y)"
@endtask

@after
    @slack($slack_hook, $slack_channel1, "wohooo! deployed a new version")
    @slack($slack_hook, $slack_channel2, "wohooo! deployed a new version")
@endafter
