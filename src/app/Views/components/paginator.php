<?php
/** @var \CodeIgniter\Pager\Pager $pager */
/** @var int $padding */
/** @var int $query */

$currentPage = $pager->getCurrentPage();
$pageCount = $pager->getPageCount();
$fullPadding = $padding * 2;
?>

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="<?= "?page=" . ($currentPage === 1 ?: ($currentPage - 1)) ?>&<?=$query?>">
                <
            </a>
        </li>

        <?php if ($currentPage > $fullPadding + 1) : ?>
            <li class="page-item"><a class="page-link" href="?page=1&<?=$query?>">1</a></li>
            <li class="page-item"><span class="page-link" ">...</span></li>
        <?php endif; ?>

        <?php
        $start = $currentPage - $padding >= $padding - 1 ? $currentPage - $padding : 1;
        $end = min($currentPage + $padding, $pageCount);


        if ($pageCount < $fullPadding + 1) {
            $start = 1;
            $end = $pageCount;
        } else if ($end - $start < $fullPadding) {
            if ($end != $pageCount)
                $end += $fullPadding + $start - $end;
            else
                $start -= $fullPadding + $start - $end;
        }
        for ($i = $start; $i <= $end; $i++) : ?>
            <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>"><a class="page-link"
                                                                               href="?page=<?= $i ?>&<?=$query?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($currentPage < $pageCount - $padding * 2) : ?>
            <li class="page-item"><span class="page-link" ">...</span></li>
            <li class="page-item"><a class="page-link" href="?page=<?= $pageCount ?>&<?=$query?>"><?= $pageCount ?></a>
            </li>
        <?php endif; ?>

        <li class="page-item">
            <a class="page-link"
               href="<?= "?page=" . ($currentPage === $pageCount ? $pageCount : ($currentPage + 1)) ?>&<?=$query?>">
                >
            </a>
        </li>
    </ul>
</nav>
