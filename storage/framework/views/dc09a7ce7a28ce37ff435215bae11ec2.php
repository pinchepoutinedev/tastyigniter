<nav class="navbar navbar-light navbar-top navbar-expand-md fixed-top">
    <div class="container">
        <?php echo controller()->renderPartial('nav/logo'); ?>
        <button
            class="navbar-toggler border-0"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarMainHeader"
            aria-controls="navbarMainHeader"
            aria-expanded="false"
            aria-label="Toggle navigation"
        ><span class="navbar-toggler-icon"></span></button>

        <div class="justify-content-end collapse navbar-collapse" id="navbarMainHeader">
            <?php echo controller()->renderPartial('nav/main_menu', ['items' => $mainMenu->menuItems()]); ?>
        </div>
    </div>
</nav>
