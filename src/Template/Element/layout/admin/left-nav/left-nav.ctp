<?php

use Cake\Routing\Router;

$currentUrl = Router::normalize($this->request->here);

$navLinks = [
    [
        'label' => $this->Html->faIcon('dashboard', ['class' => 'fa-lg fa-fw']) . ' Dashboard',
        'url' => array('controller' => 'pages', 'action' => 'dashboard')
    ],
];

$this->start('left-nav');
?>

    <div class="col-md-2 navbar-default sidebar" role="navigation">
        <div class="sidebar-admin-nav navbar-admin-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn"><button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button></span>
                    </div>
                    <!-- /input-group -->
                </li>


                <?php
                $i = 0;
                foreach ($navLinks as $navlink) :
                if (array_key_exists('links', $navlink)) {
                ?>
                <li>
                    <a href="#"><?= $navlink['label'] ?> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <?php
                        foreach ($navlink['links'] as $link) {
                            $linkLabel = $link['label'];
                            $linkUrl = Router::normalize($link['url']);
                            $linkActive = null;
                            if ($currentUrl == $linkUrl) {
                                $linkActive = "active";
                            }

                            $class = (isset($link['class'])) ? $class = $link['class'] : '';

                            $linkHtml = $this->Html->tag('div', $linkLabel, array(
                                'escape' => false,
                            ));

                            $linkHtml = $this->Html->link($linkHtml, $link['url'], [
                                'escape' => false,
                                'class' => $linkActive,
                                'onclick' => ($class == 'disabled') ? 'return false' : '',
                                'disabled' => ($class == 'disabled') ? 'disbaled' : '',
                            ]);

                            $class .= 'collapse in ';
                            echo $this->Html->tag('li', $linkHtml, array(
                                'class' => $linkActive,
                                'escape' => false,
                                'aria-labelledby' => "heading-$i",
                                'role' => 'tabpanel',
                                'id' => "collapse-$i"
                            ));
                        }
                        echo "</ul>";
                        echo "</li>";
                        } elseif (!array_key_exists('links', $navlink)) {
                            echo "<li>";
                            echo $this->Html->link($navlink['label'], $navlink['url'], [
                                'escape' => false,
                            ]);
                            echo "</li>";
                        }
                        $i++;
                        endforeach;
                        ?>
                    </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>

    <script>
        $("#side-menu").metisMenu();
        $('#myAffix').affix({
            offset: {
                top: function () {
                    return (this.bottom = $('.navigation').outerHeight(true))
                },
                bottom: function () {
                    return (this.bottom = $('.footer').outerHeight(true))
                }
            }
        })
    </script>

<?php $this->end(); ?>