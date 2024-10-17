<?php include_once HEADER_PATH ?>

    <main class="main">
        <section class="add-post">
            <div class="container">
                <div class="add-post__inner">

                    <h3 class="page-title">
                        Добавьте статью
                    </h3>

                    <form class="form add-post__form" action="index.php?controller=post&action=add" method="POST">
                        <label class="form__label">
                            <span class="form__label-span">
                                Заголовок:
                            </span>

                            <?php if(!empty($errors['title'])): ?>
                                <span class="add-post__form-span-err">
                                    <?php echo $errors['title']; ?>
                                </span>
                            <?php endif; ?>
                            <textarea class="form__inp add-post__inp add-post__inp-title" name="post-title" cols="30" rows="10"></textarea>
                        </label>

                        <label class="form__label">
                            <span class="form__label-span">
                                Содержание:
                            </span>

                            <?php if(!empty($errors['content'])): ?>
                                <span class="add-post__form-span-err">
                                    <?php echo $errors['content']; ?>
                                </span>
                            <?php endif; ?>
                            <textarea class="form__inp add-post__inp" name="post-text" cols="30" rows="10"></textarea>
                        </label>

                        <button class="btn add-post__btn" type="submit">Добавить</button>
                    </form>

                </div>
            </div>
        </section>
    </main>

<?php include_once FOOTER_PATH ?>
