<?php
use Cake\Routing\Router;

// User Dropdown
echo $this->element('layout/admin/navbar/dropdowns/user');

// More Links
$currentUrl = Router::normalize($this->request->here);

$links = [
    /*[
        'label' => 'Test',
        'url' => ['controller' => 'UserProfiles', 'action' => 'test']
    ]*/
];

foreach ($links as $link) {
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