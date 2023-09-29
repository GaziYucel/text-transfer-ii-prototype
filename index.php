<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Text Transfer II</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>

    <!--<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">-->
    <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap.min.css">

    <!--<script src="//unpkg.com/vue@3/dist/vue.global.prod.js"></script>-->
    <script type="text/javascript" src="assets/lib/vue.global.prod.js"></script>

    <!--<script src="//github.com/foliojs/pdfkit/releases/download/v0.12.0/pdfkit.standalone.js"></script>-->
    <script type="text/javascript" src="assets/lib/pdfkit.standalone.js"></script>

    <!--<script src="//github.com/devongovett/blob-stream/releases/download/v0.1.3/blob-stream.js"></script>-->
    <script type="text/javascript" src="assets/lib/blob-stream.js"></script>

    <script type="text/javascript" src="assets/js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

<header class="row">
    <div class="col-12">
        <p><a href="index.php"><img class="logo" src="assets/img/logo-small.png" alt="TextTransfer Logo"/></a></p>
        <hr/>
    </div>
</header>


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

<footer class="row">
    <div class="col-12">
        <hr/>
        <a href="https://texttransfer.org/contact.html" target="_blank">Contact</a> |
        <a href="https://texttransfer.org/en/privacy-policy.html" target="_blank">Privacy Policy</a> |
        <a href="https://texttransfer.org/en/legal-notice.html" target="_blank">Legal Notice</a> |
        <a href="https://github.com/TIBHannover/text-transfer-ii-prototype" target="_blank">Code (GitHub)</a>
    </div>
</footer>

</body>
</html>
