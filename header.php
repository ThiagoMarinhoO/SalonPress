<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- PAGE INFO -->
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php bloginfo('name'); ?></title>

        <!-- SWIPER -->
        <!-- <link
      rel="stylesheet"
      href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
    /> -->

        <!-- ÍCONES -->
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/style.css" />

        <!-- STYLES -->
        <!-- <link rel="stylesheet" href="<?php // echo get_stylesheet_directory_uri(); ?>/style.css" /> -->

        <!-- FONTS -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap"
            rel="stylesheet"
        />

        <!-- ========OPEN HEADER =========== -->
        <?php wp_head(); ?>
        <!-- ========CLOSE HEADER =========== -->
    </head>
    <body>
        <header id="header">
            <nav class="container">
                <a href="#">
                    <h1 class="logo">beauty<span>salon</span>.</h1>
                </a>
                <!-- MENU -->
                <div class="menu">
                    <ul class="grid">
                        <li><a class="title" href="#home">Início</a></li>
                        <li><a class="title" href="#about">Sobre</a></li>
                        <li><a class="title" href="#services">Serviços</a></li>
                        <li>
                            <a class="title" href="#testimonials"
                                >Depoimentos</a
                            >
                        </li>
                        <li><a class="title" href="#contact">Contato</a></li>
                    </ul>
                </div>
                <div class="toggle icon-menu"></div>
                <div class="toggle icon-close"></div>
                <!-- /MENU -->
            </nav>
        </header>