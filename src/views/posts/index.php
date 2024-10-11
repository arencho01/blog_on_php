<?php include_once HEADER_PATH ?>

    <main class="main">
        <section class="blog">
            <div class="container">
                <div class="blog__inner">
                    <h3 class="blog__title">Все публикации</h3>
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
                </div>
            </div>
        </section>

    </main>

<?php include_once FOOTER_PATH ?>
