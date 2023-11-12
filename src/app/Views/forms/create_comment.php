<?php

use App\Helpers\DateHelper;

?>

<div class="mt-5">
    <h2>Create comment</h2>
    <!-- create_comment.php -->

    <form method="POST" action="/home/store" class="row">
        <div class="form-group col-sm-6">
            <label for="exampleInputEmail1">Name (email address)</label>
            <input type="text" name="name" value="<?= old('name') ?>" class="form-control" id="exampleInputEmail1"
                   aria-describedby="emailHelp"
                   placeholder="Enter email">
        </div>
        <div class="form-group col-sm-6">
            <label for="inputGroupSelect01">Format date</label>
            <select class="custom-select" name="date" id="inputGroupSelect01">
                <?php foreach (DateHelper::getFormats() as $format) : ?>
                    <option <?= old('date') == $format ?"selected": "" ?> value="<?= $format ?>"><?= date($format) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group col-12">
            <label for="exampleInputPassword1">Text comment</label>
            <textarea maxlength="255" class="form-control" name="text"
                      aria-label="With textarea"><?= old('text') ?></textarea>
            <div class="mt-3">
                <?php if (session()->has('validation_errors')): ?>
                    <div class="alert alert-danger">
                        <?php foreach (session('validation_errors') as $error): ?>
                            <?= esc($error) ?><br>
                        <?php endforeach ?>
                    </div>
                <?php endif; if (session('created')): ?>
                    <div class="alert alert-success">
                        <?= session('created') ?>
                    </div>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-success mt-3">Submit</button>
        </div>
    </form>
</div>