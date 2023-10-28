<?php require('../templates/header.php'); ?>
<?php require('../templates/sidebar.php'); ?>

<div class="container" id="body">
    <div id="alert"></div>
    <div class="slider mt-4">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="2000">
                    <img src="<?php echo $server ?>/colorart/assets/img/slider/3.png" class="d-block w-100"
                        alt="NO_IMAGE">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="<?php echo $server ?>/colorart/assets/img/slider/4.png" class="d-block w-100"
                        alt="NO_IMAGE">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="<?php echo $server ?>/colorart/assets/img/slider/5.png" class="d-block w-100"
                        alt="NO_IMAGE">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="<?php echo $server ?>/colorart/assets/img/slider/9.png" class="d-block w-100"
                        alt="NO_IMAGE">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="<?php echo $server ?>/colorart/assets/img/slider/6.png" class="d-block w-100"
                        alt="NO_IMAGE">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="<?php echo $server ?>/colorart/assets/img/slider/7.png" class="d-block w-100"
                        alt="NO_IMAGE">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="<?php echo $server ?>/colorart/assets/img/slider/8.png" class="d-block w-100"
                        alt="NO_IMAGE">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="products">
        <div class="first-category mt-4" v-for="(categoria, index) in bodydata">
            <div class="category-title">
                <div class="row">
                    <div class="col-10">
                        <h3>{{categoria.descripcion}}</h3>
                    </div>
                    <div class="col-2 text-end">
                        <a :href="'category/' + categoria.id" class="text-decoration-none">ver más</a>
                    </div>
                </div>
            </div>
            <div class="container product-container">
                <div class="row">
                    <div class="col-12 col-md-3 mb-4" v-for="(producto, index) in categoria.productos">
                        <div class="card" aria-hidden="true">
                            <img :src="producto.URL" class="card-img-top" alt="loading">
                            <div class="card-body">
                                <h5 class="card-title">{{producto.TITULO}}</h5>
                                <p class="card-text">{{producto.DESCRIPCION_MARCA}} | Q {{producto.PRECIO}}</p>
                                <a class="btn btn-primary col-6" aria-disabled="true"
                                    :href="'product/' + producto.ID_PRODUCTO">Ver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--
        <div class="first-category mt-4">
            <div class="category-title">
                <div class="row">
                    <div class="col-10">
                        <h3>Productos desctacados</h3>
                    </div>
                    <div class="col-2 text-end">
                        <a href="#" class="text-decoration-none">ver más</a>
                    </div>
                </div>
            </div>
            <div class="container product-container">
                <div class="row">
                    <div class="col-12 col-md-3 mb-4">
                        <div class="card" aria-hidden="true">
                            <img src="assets\img\products\imagecap.png" class="card-img-top" alt="loading">
                            <div class="card-body">
                                <h5 class="card-title placeholder-glow">
                                    <span class="placeholder col-6"></span>
                                </h5>
                                <p class="card-text placeholder-glow">
                                    <span class="placeholder col-7"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-6"></span>
                                    <span class="placeholder col-8"></span>
                                </p>
                                <a class="btn btn-primary disabled placeholder col-6" aria-disabled="true"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 mb-4">
                        <div class="card" aria-hidden="true">
                            <img src="assets\img\products\imagecap.png" class="card-img-top" alt="loading">
                            <div class="card-body">
                                <h5 class="card-title placeholder-glow">
                                    <span class="placeholder col-6"></span>
                                </h5>
                                <p class="card-text placeholder-glow">
                                    <span class="placeholder col-7"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-6"></span>
                                    <span class="placeholder col-8"></span>
                                </p>
                                <a class="btn btn-primary disabled placeholder col-6" aria-disabled="true"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 mb-4">
                        <div class="card" aria-hidden="true">
                            <img src="assets\img\products\imagecap.png" class="card-img-top" alt="loading">
                            <div class="card-body">
                                <h5 class="card-title placeholder-glow">
                                    <span class="placeholder col-6"></span>
                                </h5>
                                <p class="card-text placeholder-glow">
                                    <span class="placeholder col-7"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-6"></span>
                                    <span class="placeholder col-8"></span>
                                </p>
                                <a class="btn btn-primary disabled placeholder col-6" aria-disabled="true"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 mb-4">
                        <div class="card" aria-hidden="true">
                            <img src="assets\img\products\imagecap.png" class="card-img-top" alt="loading">
                            <div class="card-body">
                                <h5 class="card-title placeholder-glow">
                                    <span class="placeholder col-6"></span>
                                </h5>
                                <p class="card-text placeholder-glow">
                                    <span class="placeholder col-7"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-6"></span>
                                    <span class="placeholder col-8"></span>
                                </p>
                                <a class="btn btn-primary disabled placeholder col-6" aria-disabled="true"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="second-category mt-4">
            <div class="category-title">
                <div class="row">
                    <div class="col-10">
                        <h3>Productos de temporada</h3>
                    </div>
                    <div class="col-2 text-end">
                        <a href="#" class="text-decoration-none">ver más</a>
                    </div>
                </div>
            </div>
            <div class="container product-container">
                <div class="row">
                    <div class="col-12 col-md-3 mb-4">
                        <div class="card" aria-hidden="true">
                            <img src="assets\img\products\imagecap.png" class="card-img-top" alt="loading">
                            <div class="card-body">
                                <h5 class="card-title placeholder-glow">
                                    <span class="placeholder col-6"></span>
                                </h5>
                                <p class="card-text placeholder-glow">
                                    <span class="placeholder col-7"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-6"></span>
                                    <span class="placeholder col-8"></span>
                                </p>
                                <a class="btn btn-primary disabled placeholder col-6" aria-disabled="true"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 mb-4">
                        <div class="card" aria-hidden="true">
                            <img src="assets\img\products\imagecap.png" class="card-img-top" alt="loading">
                            <div class="card-body">
                                <h5 class="card-title placeholder-glow">
                                    <span class="placeholder col-6"></span>
                                </h5>
                                <p class="card-text placeholder-glow">
                                    <span class="placeholder col-7"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-6"></span>
                                    <span class="placeholder col-8"></span>
                                </p>
                                <a class="btn btn-primary disabled placeholder col-6" aria-disabled="true"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 mb-4">
                        <div class="card" aria-hidden="true">
                            <img src="assets\img\products\imagecap.png" class="card-img-top" alt="loading">
                            <div class="card-body">
                                <h5 class="card-title placeholder-glow">
                                    <span class="placeholder col-6"></span>
                                </h5>
                                <p class="card-text placeholder-glow">
                                    <span class="placeholder col-7"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-6"></span>
                                    <span class="placeholder col-8"></span>
                                </p>
                                <a class="btn btn-primary disabled placeholder col-6" aria-disabled="true"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 mb-4">
                        <div class="card" aria-hidden="true">
                            <img src="assets\img\products\imagecap.png" class="card-img-top" alt="loading">
                            <div class="card-body">
                                <h5 class="card-title placeholder-glow">
                                    <span class="placeholder col-6"></span>
                                </h5>
                                <p class="card-text placeholder-glow">
                                    <span class="placeholder col-7"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-6"></span>
                                    <span class="placeholder col-8"></span>
                                </p>
                                <a class="btn btn-primary disabled placeholder col-6" aria-disabled="true"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="third-category mt-4">
            <div class="category-title">
                <div class="row">
                    <div class="col-10">
                        <h3>Productos en descuento</h3>
                    </div>
                    <div class="col-2 text-end">
                        <a href="#" class="text-decoration-none">ver más</a>
                    </div>
                </div>
            </div>
            <div class="container product-container">
                <div class="row">
                    <div class="col">
                        <div class="card" aria-hidden="true">
                            <img src="assets\img\products\imagecap.png" class="card-img-top" alt="loading">
                            <div class="card-body">
                                <h5 class="card-title placeholder-glow">
                                    <span class="placeholder col-6"></span>
                                </h5>
                                <p class="card-text placeholder-glow">
                                    <span class="placeholder col-7"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-6"></span>
                                    <span class="placeholder col-8"></span>
                                </p>
                                <a class="btn btn-primary disabled placeholder col-6" aria-disabled="true"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 mb-4">
                        <div class="card" aria-hidden="true">
                            <img src="assets\img\products\imagecap.png" class="card-img-top" alt="loading">
                            <div class="card-body">
                                <h5 class="card-title placeholder-glow">
                                    <span class="placeholder col-6"></span>
                                </h5>
                                <p class="card-text placeholder-glow">
                                    <span class="placeholder col-7"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-6"></span>
                                    <span class="placeholder col-8"></span>
                                </p>
                                <a class="btn btn-primary disabled placeholder col-6" aria-disabled="true"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 mb-4">
                        <div class="card" aria-hidden="true">
                            <img src="assets\img\products\imagecap.png" class="card-img-top" alt="loading">
                            <div class="card-body">
                                <h5 class="card-title placeholder-glow">
                                    <span class="placeholder col-6"></span>
                                </h5>
                                <p class="card-text placeholder-glow">
                                    <span class="placeholder col-7"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-6"></span>
                                    <span class="placeholder col-8"></span>
                                </p>
                                <a class="btn btn-primary disabled placeholder col-6" aria-disabled="true"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 mb-4">
                        <div class="card" aria-hidden="true">
                            <img src="assets\img\products\imagecap.png" class="card-img-top" alt="loading">
                            <div class="card-body">
                                <h5 class="card-title placeholder-glow">
                                    <span class="placeholder col-6"></span>
                                </h5>
                                <p class="card-text placeholder-glow">
                                    <span class="placeholder col-7"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-6"></span>
                                    <span class="placeholder col-8"></span>
                                </p>
                                <a class="btn btn-primary disabled placeholder col-6" aria-disabled="true"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->
    </div>
</div>
<button class="btn btn-primary back-to-top" id="back-to-top" style="display: none;">
    Back to Top
</button>

<?php require('../templates/footer.php'); ?>
<?php require('../templates/scripts.php');
includeScript('homepage') ?>