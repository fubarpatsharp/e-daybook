<!DOCTYPE html>
<html>
<head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php echo link_tag('css/styles.css'); ?>
    <?php echo link_tag('css/materialize.min.css'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<header xmlns="http://www.w3.org/1999/html">
    <nav>
        <div class="nav-wrapper teal darken-1">
            <a href="#" class="brand-logo">E-школа</a>
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="/">Головна</a></li>
                <li><a href="/profile/settings">Налаштування</a></li>
                <li><a href="/admin/support">Підтримка</a></li>
            </ul>
            <ul id="slide-out" class="side-nav">
                <li>
                    <div class="userView center">
                        <div class="background teal darken-1">
                        </div>
                        <img class="circle" src="<?php echo $this->ion_auth->avatar(); ?>" style="width: 70%; height: 70%; padding: 5%;">
                    </div>
                </li>
                <li><a href="/">Головна</a></li>
                <li><a href="/profile">Профіль</a></li>
                <li><a href="/profile/settings">Налаштування</a></li>
                <li><a href="/admin/support">Підтримка</a></li>
            </ul>
        </div>
    </nav>
</header>

<main>
    <div class="row">
        <div class="col s12 m12 l12">
            <div class="col l2 hide-on-med-and-down">
                <div class="card fixed">
                    <div class="card-image-header teal darken-1">
                        <div class="card-content center-align">
                            <img src="<?php echo $this->ion_auth->avatar(); ?>"
                                 class="circle" width="70%">
                        </div>
                    </div>
                    <div class="collection center-align">
                        <a href="/auth/logout" class="collection-item inline blue-grey-text"><i
                                    class="material-icons md-36">exit_to_app</i></a>
                        <a href="#!" class="collection-item inline blue-grey-text"><i class="material-icons md-36">settings</i></a>
                    </div>
                    <div class="divider"></div>
                    <div class="collection">
                        <a href="/profile" class="collection-item blue-grey-text"><h5>Профіль</h5></a>
                        <a href="/profile/settings" class="collection-item blue-grey-text"><h5>Налаштування</h5></a>
                        <a href="/admin/support" class="collection-item blue-grey-text"><h5>Підтримка</h5></a>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l10">