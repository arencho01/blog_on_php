<?php include_once HEADER_PATH ?>

<main class="main">
    <section class="register">
        <div class="container">
            <div class="register__inner">
                <h3 class="register__title page-title">Регистрация</h3>

                <form class="form register__form" action="index.php?controller=user&action=registration" method="POST">

                    <label class="form__label register__label">
                        <span class="form__label-span register__label-span">
                            Придумайте логин:
                        </span>

                        <?php if(!empty($errors['userName'])): ?>
                            <span class="form__label-err register__label-err">
                                 <?php echo $errors['userName'] ?>
                            </span>
                        <?php endif; ?>

                        <input class="form__inp register__inp" type="text" name="userName">
                    </label>

                    <label class="form__label register__label">
                        <span class="form__label-span register__label-span">
                            Придумайте пароль:
                        </span>

                        <?php if (!empty($errors['userPass'])): ?>
                            <span class="form__label-err register__label-err">
                                <?php echo $errors['userPass'] ?>
                            </span>
                        <?php endif; ?>

                        <input class="form__inp register__inp" type="password" name="userPass">
                    </label>

                    <label class="form__label register__label">
                        <span class="form__label-span register__label-span">
                            Повторите пароль:
                        </span>

                        <?php if (!empty($errors['userPassConfirm'])): ?>
                            <span class="form__label-err register__label-err">
                                <?php echo $errors['userPassConfirm'] ?>
                            </span>
                        <?php endif; ?>

                        <input class="form__inp register__inp" type="password" name="userPassConfirm">
                    </label>


                    <button class="btn register__btn" type="submit">Зарегестрироваться</button>
                </form>

            </div>
        </div>
    </section>
</main>

<?php include_once FOOTER_PATH ?>