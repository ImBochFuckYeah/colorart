<?php require('../templates/header.php'); ?>
<?php require('../templates/sidebar.php'); ?>
<div class="container mt-5 mb-5">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/colorful">Home</a></li>
        <li class="breadcrumb-item active">Product</li>
    </ol>
    <div class="product-description">
        <div class="card mb-4 mt-4">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="http://localhost/colorful/assets/img/products/imagecap.png"
                        class="img-fluid rounded-start" alt="product description">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        <div class="mb-2">
                            <input type="number" class="form-control" value="0">
                        </div>
                        <div class="mb-2">
                            <button type="button" class="btn btn-primary">Agregar producto</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="newsletter">
        <h2>Subscribe to our Newsletter</h2>
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Email address" name="mail" required>
            </div>
            <div class="col">
                <input type="button" class="btn btn-primary" value="Subscribe">
            </div>
        </div>
    </div>
</div>
<?php require('../templates/footer.php'); ?>