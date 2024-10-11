<?php include_once HEADER_PATH ?>

<main class="main">
    <section class="register">
        <div class="container">
            <div class="register__inner">

                <form class="register__form" action="index.php?controller=user&action=registration" method="post">
                    <h3 class="register__title">Регистрация</h3>

                    <label class="register__label">
                        <span class="register__label-span">
                            Ваше имя:
                        </span>

                        <?php if(isset($errors['userName']) && !$errors['userName']): ?>
                            <span class="register__label-err">Это поле обязательно для заполнения</span>
                        <?php endif; ?>

                        <input class="register__inp" type="text" name="userName">
                    </label>

                    <label class="register__label">
                        <span class="register__label-span">
                            Придумайте пароль:
                        </span>

                        <?php if (isset($errors['userPass']) && !$errors['userPass']): ?>
                            <span class="register__label-err">Это поле обязательно для заполнения</span>
                        <?php endif; ?>

                        <input class="register__inp" type="password" name="userPass">
                    </label>

                    <label class="register__label">
                        <span class="register__label-span">
                            Повторите пароль:
                        </span>

                        <?php if (isset($errors['userPassConfirm'])): ?>
                            <span class="register__label-err">
                                <?php echo $errors['userPassConfirm'] ?>
                            </span>
                        <?php endif; ?>

<!--                        --><?php //if (isset($errors['userPassMatch']) && $errors['userPassMatch']): ?>
<!--                            <span class="register__label-err">Пароли не совпадают</span>-->
<!--                        --><?php //endif; ?>

                        <input class="register__inp" type="password" name="userPassConfirm">
                    </label>


                    <button class="btn register__btn" type="submit">Зарегестрироваться</button>
                </form>

            </div>
        </div>
    </section>
</main>

<?php include_once FOOTER_PATH ?>