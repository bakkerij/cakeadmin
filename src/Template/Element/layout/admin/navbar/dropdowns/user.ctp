<?php
use Cake\Routing\Router;

$currentUrl = Router::normalize($this->request->here);

$authUser = $this->request->session()->read('Auth.CakeAdmin');

$links = [
    [
        'label' => 'View Profile',
        'url' => ['prefix' => 'admin', 'controller' => 'Users']
    ],
    ['label' => 'separator'],
    [
        'label' => 'Edit Account',
        'url' => ['prefix' => 'admin', 'controller' => 'Users', 'action' => 'edit']
    ],
    [
        'label' => 'Edit Profile',
        'url' => ['prefix' => 'admin', 'controller' => 'UserProfiles', 'action' => 'edit']
    ],
    ['label' => 'separator'],
    [
        'label' => 'Log Out',
        'url' => ['prefix' => 'admin', 'controller' => 'Users', 'action' => 'logout']
    ]
];
?>
<li class="dropdown nav-bar-avatar">
    <?php
    $linkName = $authUser['name'];
    echo $this->Html->link(
        $linkName . ' <span class="caret">',
        ['#'],
        [
            'escape' => false,
            'class' => "dropdown-toggle",
            'data-toggle' => "dropdown",
            'role' => 'button',
            'aria-haspopup' => "true",
            'aria-expanded' => "false"
        ]
    );
    ?>
    <ul class="dropdown-menu">
        <?php
        foreach ($links as $link) {
            if ($link['label'] == "separator") {
                echo '<li role="separator" class="divider"></li>';
            } else {
                $linkLabel = $link['label'];
                $linkUrl = Router::normalize($link['url']);
                $linkActive = $currentUrl === $linkUrl;

                $class = (isset($link['class'])) ? $class = $link['class'] : '';

                //$linkHtml = $this->Html->link($linkLabel, $linkUrl);
                $linkHtml = $this->Html->link($linkLabel, $link['url'], [
                    'escape' => false,
                    'onclick' => ($class == 'disabled') ? 'return false' : '',
                    'disabled' => ($class == 'disabled') ? 'disbaled' : ''
                ]);

                echo $this->Html->tag('li', $linkHtml, array(
                    'class' => $linkActive ? 'active ' . $class : $class,
                    'escape' => false, // to not escape anchor markup
                ));
            }
        }
        ?>
    </ul>
</li>