<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>InstaHora</title>

    <link rel="icon" type="image/svg+xml" href="/favicon.svg">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet">

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/font-awesome.css">
</head>
<body>
    <div id="app">
        <?php includeView('layouts/partials/navigation'); ?>

        <?php require $content; ?>

        <upload :uploading="upload" @closed="upload = false"></upload>

        <notification message="<?= $flash ?>"></notification>
    </div>

    <script src="/js/app.js" async></script>
</body>
</html>
