<?php
echo $this->Form->create(null, [
    'url' => ['controller' => 'Search', 'action' => 'index'],
    'id' => 'navbar-search-form',
    'role' => 'search',
    'div' => false,
    'class' => 'navbar-form navbar-left form-inline'
]);
echo $this->Form->input('search', [
    'append' => [
        $this->Form->button('<span class="glyphicon glyphicon-search">', [
            'escape' => false
        ]),
    ],
    'label' => false,
    'div' => false,
    'wrapInput' => false,
    'placeholder' => 'Search'
]);
echo $this->Form->end();