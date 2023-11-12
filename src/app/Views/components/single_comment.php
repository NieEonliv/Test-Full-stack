<?php
/** @var number $id */
/** @var string $name */
/** @var string $date */
/** @var string $text */
?>

<div class="col-lg-4 col-md-6 col-12 my-3">
    <section class="card h-100">
        <div class="card-header ">
            <div class="row">
                <span class="col-7"><?= $name ?></span>
                <span class="col-5 text-right"><?= $date ?></span>
            </div>
        </div>
        <div class="card-body">
            <p class="card-text"><?= $text ?></p>
        </div>
        <form class="d-flex m-3 justify-content-end" action="/home/destroy/<?= $id ?>" method="POST">
            <button class="btn  btn-outline-danger" type="submit">
                Delete
            </button>
        </form>
    </section>
</div>