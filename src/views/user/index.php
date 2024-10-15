<?php include_once HEADER_PATH ?>

    <main class="main">
        <section class="account">
            <div class="container">
                <div class="account__inner">

                    <h3 class="page-title">Учётная запись</h3>
                    <h4 class="account__name">
                        Имя: <?php echo $_SESSION['user'] ?>
                    </h4>

                </div>
            </div>
        </section>
    </main>

<?php include_once FOOTER_PATH ?>
