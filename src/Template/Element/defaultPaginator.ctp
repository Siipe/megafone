<div class="paginator">
    <ul class="pagination">
        <?php
            echo $this->Paginator->first('<<');
            echo $this->Paginator->prev('<');
            echo $this->Paginator->numbers();
            echo $this->Paginator->next('>');
            echo $this->Paginator->last('>>');
        ?>
    </ul>
    <p class="pagination-info">
        <?php 
            echo $this->Paginator->counter(
                __('Page {0} of {1}, showing {2} records out of {3} total, starting on record {4}, ending on {5}', 
                    '{{page}}', '{{pages}}', '{{current}}', '{{count}}', '{{start}}', '{{end}}')
            );
        ?>
    </p>
</div>