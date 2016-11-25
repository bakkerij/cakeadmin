<%
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return !in_array($schema->columnType($field), ['binary', 'text']);
    });

if (isset($modelObject) && $modelObject->behaviors()->has('Tree')) {
    $fields = $fields->reject(function ($field) {
        return $field === 'lft' || $field === 'rght';
    });
}

if (!empty($indexColumns)) {
    $fields = $fields->take($indexColumns);
}

%>
<?php
// Title
$title = __('<%= $pluralHumanName %>');
$smallTitle = null;
$this->assign('title', $title);
echo $this->Layout->setPageTitle($title, $smallTitle);
?>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
<% foreach ($fields as $field): %>
            <th scope="col"><?= $this->Paginator->sort('<%= $field %>') ?></th>
<% endforeach; %>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($<%= $pluralVar %> as $<%= $singularVar %>): ?>
        <tr>
<%        foreach ($fields as $field) {
        $isKey = false;
        if (!empty($associations['BelongsTo'])) {
            foreach ($associations['BelongsTo'] as $alias => $details) {
                if ($field === $details['foreignKey']) {
                    $isKey = true;
%>
            <td><?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?></td>
<%
                    break;
                }
            }
        }
        if ($isKey !== true) {
            if (!in_array($schema->columnType($field), ['integer', 'biginteger', 'decimal', 'float'])) {
%>
            <td><?= h($<%= $singularVar %>-><%= $field %>) ?></td>
<%
            } else {
%>
            <td><?= $this->Number->format($<%= $singularVar %>-><%= $field %>) ?></td>
<%
            }
        }
    }

    $pk = '$' . $singularVar . '->' . $primaryKey[0];
%>
            <td class="actions">
                <?= $this->Html->link($this->Html->icon('eye-open'), ['prefix' => false, 'action' => 'view', <%= $pk %>], ['escape' => false, 'title' => 'View']) ?>
                <?= $this->Html->link($this->Html->icon('pencil'), ['action' => 'edit', <%= $pk %>], ['escape' => false, 'title' => 'Edit']) ?>
                <?= $this->Form->postLink($this->Html->icon('trash'), ['action' => 'delete', <%= $pk %>], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', <%= $pk %>)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->element('layout/paginator') ?>