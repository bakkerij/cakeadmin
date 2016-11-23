<hr>
<div class="paginator text-center">
    <ul class="pagination">
        <?php
        echo $this->Paginator->first('<< First', array('class' => 'pag-prev', 'tag' => 'li'));
        echo $this->Paginator->prev('← Previous', array('class' => 'pag-prev', 'tag' => 'li'), "<a>← Prev</a>", array('escape' => false, 'class' => 'disabled', 'tag' => 'li'));
        echo $this->Paginator->numbers(array('tag' => 'li', 'separator' => '', 'currentTag' => 'a', 'currentClass' => 'disabled'));
        echo $this->Paginator->next('Next →', array('class' => 'pag-next', 'tag' => 'li'), "<a>Next →</a>", array('escape' => false, 'class' => 'disabled', 'tag' => 'li'));
        echo $this->Paginator->last('Last >>', array('class' => 'pag-next', 'tag' => 'li'));
        ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>