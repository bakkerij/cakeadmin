<div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <?php echo $this->Html->Link('Bakkerij\CakeAdmin', ['url' => 'https://github.com/bakkerij/cakeadmin'], ['class' => "navbar-brand"]); ?>
    </div>
    <div class="collapse navbar-collapse" id="navbar">
        <?= $this->element('layout/admin/navbar/right-links'); ?>
    </div>
</div>