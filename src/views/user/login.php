<?php include_once HEADER_PATH ?>

    <main class="main">
        <section class="login">
            <div class="container">
                <div class="login__inner">
                    <h3 class="page-title login__title">
                        Вход
                    </h3>

                    <form class="form login__form" action="" method="post">

                        <label class="form__label register__label">
                            <span class="form__label-span register__label-span">
                                Логин:
                            </span>
                            <?php if(!empty($errors['userName'])): ?>
                                <span class="form__label-err register__label-err">
                                    <?php echo $errors['userName']; ?>
                                </span>
                            <?php endif; ?>

                            <input class="form__inp login__inp" type="text" name="userName">
                        </label>
                        <label class="form__label register__label">
                            <span class="form__label-span register__label-span">
                                Пароль:
                            </span>
                            <?php if(!empty($errors['userPass'])): ?>
                                <span class="form__label-err register__label-err">
                                    <?php echo $errors['userPass']; ?>
                                </span>
                            <?php endif; ?>

                            <input class="form__inp login__inp" type="text" name="userPass">
                        </label>

                        <button class="btn login__btn" type="submit">Войти</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

<?php include_once FOOTER_PATH ?>
