<?php
echo $this->Html->alert(h($message) . ' ' . $this->Html->link('Click Here', [
        'controller' => h($params['controller']),
        'action' => h($params['action']),
        h($params['id'])
    ]), 'danger');