<html>
<head>
    <title><?= $this->data['title'] ?></title>
    <meta name="description" content="<?= $this->data['meta_description'] ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL_WITHOUT_INDEX_PHP . 'css/style.css'; ?>">
</head>
<body>
<header>
    <nav>
        <ul class="menu">
            <li class="logo">
                <img src="https://codeacademy.lt/wp-content/themes/codeacademy/dist/images/codeacademy-black.svg">
            </li>
            <li>
                <a href="<?php echo $this->url(''); ?>">Pagrindinis</a>
            </li>
                <li>
                    <a href="<?php echo $this->url('user/register') ?>">Registracija į būrelius</a>
                </li>
        </ul>
    </nav>
</header>