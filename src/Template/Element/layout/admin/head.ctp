<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->fetch('title') . " - CakeAdmin" ?></title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css([
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',
        // 'app',
        'Bakkerij/CakeAdmin.metisMenu.min',
        'Bakkerij/CakeAdmin.admin.css'
    ]) ?>

    <?= $this->Html->script([
        'Bakkerij/CakeAdmin.jquery.min.js',
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js',
        'Bakkerij/CakeAdmin.metisMenu.min',
        'Bakkerij/CakeAdmin.sb-admin-2.js'
    ]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>