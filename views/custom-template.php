<!-- custom-template.php -->
<?php get_header(); ?>
<script src="https://cdn.jsdelivr.net/npm/@imacrayon/alpine-ajax@0.6.0/dist/server.js"></script>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title">Custom Page Title</h1>
            </header>
        </article>

    </main>
</div>


<style>
    button:disabled {
      cursor: not-allowed;
      opacity: 0.5;
    }
</style>
<?php get_footer(); ?>
