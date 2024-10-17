<?php include_once HEADER_PATH ?>

<main class="main">
    <section class="search">
        <div class="container">
            <div class="search__inner">

                <?php if (!empty($err)) : ?>
                    <h3 class="page-title">
                        <?php echo $err; ?>;
                    </h3>
                <?php endif; ?>

                <?php if (!empty($posts)) : ?>
                <ul class="blog__list">
                    <?php foreach ($posts as $post): ?>
                    <article class="blog__article">

                        <h3 class="blog__article-title">
                            <?php echo "<a href='index.php?controller=post&action=show&id={$post['id']}'>" ?>
                                    <?php echo $post['title'] ?>
                                <?php echo "</a>" ?>
                        </h3>

                        <p class="blog__content">
                            <?php echo $post['content'] ?>
                        </p>

                    </article>
                    <?php endforeach ?>
                </ul>
                <?php endif; ?>


            </div>
        </div>
    </section>
</main>

<?php include_once FOOTER_PATH ?>
