<?php

use App\Helpers\CommentHelper;

/** @var \CodeIgniter\Pager\Pager $pager */
/** @var array $comments */
/** @var string $sortBy */
/** @var string $sortOrder */


$this->extend("layouts/main");
$this->section("content");
?>

<?php if (count($comments) > 0) : ?>
    <div class="d-flex justify-content-md-end justify-content-center">
        <div class="form-group col-md-3 col-5">
            <label for="sortField">Sort fields</label>
            <select class="custom-select" name="sort" id="sortField">
                <?php foreach (CommentHelper::getSortFields() as $key => $item) : ?>
                    <option <?= $key == $sortBy ? "selected" : "" ?> value="<?= $key ?>"><?= $item ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group col-md-3 col-5">
            <label for="orderSort">Order</label>
            <select class="custom-select" name="order" id="orderSort">
                <?php foreach (CommentHelper::getOrder() as $key => $item) : ?>
                    <option <?= $key == $sortOrder ? "selected" : "" ?> value="<?= $key ?>"><?= $item ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group col-md-auto col-2">
            <label for="orderSort">Apply</label>
                <a id="search" href="<?= "?page={$pager->getCurrentPage()}&sort_by=$sortBy&sort_order=$sortOrder" ?>"
                   class="btn d-block btn-primary  my-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-send align-middle" viewBox="0 0 16 16">
                            <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                        </svg>
                </a>
        </div>
    </div>

    <article class="row justify-content-between align-items-stretch w-100 mx-auto">
        <?php foreach ($comments as $comment) {
            echo view_cell("\App\Libraries\CommentLibrary::singleComment", $comment);
        } ?>
    </article>

    <div class="mt-5">
        <?= view_cell("\App\Libraries\PaginatorLibrary::renderPaginator", [
            'pager' => $pager,
            'padding' => 3,
            'query' => "sort_by=$sortBy&sort_order=$sortOrder"
        ]) ?>
    </div>
<?php endif; ?>
<?= $this->include('forms/create_comment') ?>

<?php $this->endSection() ?>



<?php $this->section("footer") ?>
<script>
    $(document).ready(function () {
        const button = $('#search');
        const currentPage = <?= $pager->getCurrentPage() ?>;

        let data = {
            "order": "<?= $sortOrder ?>",
            "field": "<?= $sortBy ?>"
        };

        $('#sortField').change(function () {
            data.field = $(this).val();
            changeOrder();
        });

        $('#orderSort').change(function () {
            data.order = $(this).val();
            changeOrder();
        });

        const changeOrder = () => {
            button.attr('href', `?page=${currentPage}&sort_by=${data.field}&sort_order=${data.order}`);
        }
    });
</script>
<?php $this->endSection() ?>
