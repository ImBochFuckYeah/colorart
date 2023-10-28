<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container">
        <a href="/colorart/admin" class="navbar-brand">ColorArt</a>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/colorart/admin/edit-products">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/colorart/admin/edit-brands">Marcas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/colorart/admin/edit-categories">Categorias</a>
                </li>
            </ul>
        </div>
        <button type="button" class="btn btn-link"
            onclick="window.location.href='<?php echo $server; ?>/colorart/logout'" name="logout">Cerrar sesión</button>
    </div>
</nav>