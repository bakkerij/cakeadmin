<!-- Head -->
<?= $this->element('layout/admin/head') ?>

<!-- Body -->
<body>

<!-- Wrapper -->
<div id="wrapper-admin" class="wrapper">
    <!-- Header -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <?= $this->element('layout/admin/header') ?>
    </nav>
    <div id="page-wrapper-admin" class="container-fluid">
        <div class="row">
            <?= $this->element('layout/admin/left-nav/left-nav'); ?>
            <?= $this->fetch('left-nav') ?>

            <div class="col-md-10 col-md-offset-2 content">
                <!-- Flash -->
                <?= $this->element('layout/show-flash'); ?>
                
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </div>
</div>

<!-- Footer Scripts -->
<?= $this->element('layout/footer-scripts') ?>

</div>
</body>
</html>