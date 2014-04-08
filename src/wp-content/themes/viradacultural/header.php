<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?> ng-app="virada">
<!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php
            /* Print the <title> tag based on what is being viewed. */
            global $page, $paged;

            wp_title( '|', true, 'right' );

            // Add the blog name.
            bloginfo( 'name' );

            // Add the blog description for the home/front page.
            $site_description = get_bloginfo( 'description', 'display' );
            if ( $site_description && ( is_home() || is_front_page() ) )
                echo " | $site_description";

            // Add a page number if necessary:
            if ( $paged >= 2 || $page >= 2 )
                echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
        ?></title>

        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/elegant-font.css" />
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ) ?>/main.css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <?php wp_head(); ?>


        <script>
        var GlobalConfiguration = {
            templateURL: '<?php bloginfo("template_url"); ?>'
        };
        </script>


        <script type="text/javascript" src="<?php bloginfo( 'template_url' ) ?>/app/lunr.js" ></script>
        <script type="text/javascript" src="<?php bloginfo( 'template_url' ) ?>/app/angular.js" ></script>
        <script type="text/javascript" src="<?php bloginfo( 'template_url' ) ?>/app/virada.js" ></script>

    </head>
    <body <?php if (get_query_var('virada_tpl')): ?> class="programacao" <?php else: ?><?php body_class(); ?><?php endif; ?> ng-controller="main">

        <!-- Facebook code -->
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=248328698638549";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <!-- Facebook code -->

        <header id="main-header" <?php if (get_query_var('virada_tpl')): ?>class="col-md-1"<?php else: ?>class="col-md-2"<?php endif; ?>>
            <div id="brand">
                <h1 id="logo-virada" class="logo"><a href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'name' ); ?>"><span class="sr-only"><?php bloginfo( 'name' ); ?></span></a></h1>
                <p class="assinatura sr-only"><span>A</span> <span>cidade</span> <span>em</span> <span>festa!</span></p>
            </div>
            <nav id="main-nav">
                <?php
                    $noticias_id = get_cat_ID( 'Notícias' );
                    $noticias_link = get_category_link( $noticias_id );
                    $blog_id = get_cat_ID( 'Blog' );
                    $blog_link = get_category_link( $blog_id );
                ?>
                <ul id="main-menu" class="nav">
                    <li class="has-children">
                        <a class="a-virada" href="<?php bloginfo( 'url' ); ?>/a-virada" title="A Virada"><span>A Virada</span></a>
                        <ul class="children">
                            <li><a>Teste 1</a></li>
                            <li><a>Teste 2</a></li>
                            <li><a>Teste 3</a></li>
                        </ul>
                    </li>
                    <li><a class="anos-10" href="<?php bloginfo( 'url' ); ?>/10-anos" title="10 anos"><span>10 anos</span></a></li>
                    <li><a class="programacao" href="<?php bloginfo( 'url' ); ?>/programacao" title="Programação"><span>Programação</span></a></li>
                    <li><a class="noticias" href="<?php echo get_post_type_archive_link( 'noticias' ); ?>" title="Notícias"><span>Notícias</span></a></li>
                    <li><a class="blog" href="<?php echo esc_url( $blog_link ); ?>" title="Blog"><span>Blog</span></a></li>
                    <li><a class="imprensa" href="<?php echo get_post_type_archive_link( 'imprensa' ); ?>" title="Imprensa"><span>Imprensa</span></a></li>
                    <li><a class="nas-redes" href="<?php bloginfo( 'url' ); ?>/nas-redes" title="Nas redes"><span>Nas redes</span></a></li>
                    <li><a class="minha-virada" href="<?php bloginfo( 'url' ); ?>/minha-virada" title="Minha Virada"><span>Minha Virada</span></a></li>
                    <li class="whitespace"><span></span></li>
                </ul>
            </nav>
            <!-- #main-nav -->

            <h2 id="logo-smc" class="logo"><a href="http://www.prefeitura.sp.gov.br/"><span class="sr-only">Secretaria Municipal de Cultural de São Paulo</span></a></h2>
        </header>
        <!-- #main-header -->

        <?php if (is_page() || is_single()) { ?>
        <nav id="programacao-navbar" class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="col-md-8 col-md-offset-2">
                    <?php if ('noticias' == get_post_type()) { ?>
                        <h1>Notícias</h1>
                    <?php } else if ('imprensa' == get_post_type()) { ?>
                        <h1>Imprensa</h1>
                    <?php } else if (is_single()) { ?>
                        <h1>Blog</h1>
                    <?php } ?>
                    <div class="share-buttons alignright">
                        <div class="facebook">
                            <div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-type="button_count"></div>
                        </div>
                        <div class="twitter">
                            <a href="https://twitter.com/share" class="twitter-share-button" data-via="virada" data-lang="pt">Tweetar</a>
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                        </div>
                        <div class="g-plus">
                            <!-- Place this tag where you want the share button to render. -->
                            <div class="g-plus" data-action="share" data-annotation="bubble"></div>
                            <!-- Place this tag after the last share tag. -->
                            <script type="text/javascript">
                              window.___gcfg = {lang: 'pt-BR'};

                              (function() {
                                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                                po.src = 'https://apis.google.com/js/platform.js';
                                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                              })();
                            </script>
                        </div>
                    </div><!-- .share-buttons -->
                </div>
            </div>
        </nav>
        <?php } ?> <!-- if is_page || is_single -->
        <?php if (is_search()) { ?>
        <nav id="programacao-navbar" class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="col-md-8 col-md-offset-2">
                    <h1>Resultados de busca para: <?php echo get_search_query(); ?></h1>
                </div>
            </div>
        </nav>
        <?php } ?> <!-- if is_page || is_single -->
