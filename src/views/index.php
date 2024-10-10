<?php include_once 'header.php' ?>

    <main class="main">
        <section class="blog">
            <div class="container">
                <div class="blog__inner">
                    <ul class="blog__list">
                        <?php foreach ($posts as $post): ?>
                        <article class="blog__article">
                            <h3 class="blog__title">

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

<?php include_once 'footer.php' ?>
