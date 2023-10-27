<? require_once('../auth.php'); validAuthenticated(); ?>

<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container">
        <a href="/colorart/admin" class="navbar-brand">ColorArt</a>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="admin/edit-products">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
            </ul>
        </div>
        <form method="post" action="auth.php">
            <button type="submit" class="btn btn-link" name="logout">Cerrar sesión</button>
        </form>
    </div>
</nav>