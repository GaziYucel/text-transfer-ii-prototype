<?php require_once('_header.php'); ?>

<main class="row">
    <div class="col-12">

        <div class="row">
            <div class="col-12">
                <p> &nbsp; </p>
                <p>
                    <a href='document.php' target='_blank' class='btn btn-primary'>New document</a>
                </p>
                <p> &nbsp; </p>

                <p>The list below consists of documents which are saved. Please click on the document of your choice to
                    view or
                    edit.</p>
                <div class="col-6 list-group">
                    <?php foreach (new FilesystemIterator(DOCUMENTS_DIR . '/') as $file) { ?>
                        <a href='document.php?<?= DOCUMENT_URL_KEY ?>=<?= $file->getFilename() ?>' target='_blank'
                           class="list-group-item list-group-item-action"><?= str_replace('.json', '', $file->getFilename()) ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>
</main>

<?php require_once('_footer.php'); ?>
