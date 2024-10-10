<?php include_once "header.php"; ?>


    <main class="main">

        <section class="post">
            <div class="container">
                <div class="post__inner">
                    <ul class="post__list">
                        <article class="post__article">
                            <h3 class="post__title">
                                <?php echo $post['title']; ?>
                            </h3>
                            <p class="post__content">
                                <?php echo $post['content']; ?>
                            </p>
                        </article>
                    </ul>
                </div>
            </div>
        </section>

    </main>



<?php include_once "footer.php"; ?>