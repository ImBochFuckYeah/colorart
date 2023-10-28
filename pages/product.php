<?php require('../templates/header.php'); ?>
<?php require('../templates/sidebar.php'); ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 0;
}
?>

<div class="container mt-5 mb-5" id="body">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/colorart">Home</a></li>
        <li class="breadcrumb-item active">Product</li>
    </ol>
    <div class="product-description" v-for="(producto, index) in bodydata">
        <div class="card mb-4 mt-4">
            <div class="row g-0">
                <div class="col-md-4">
                    <img :src="producto.URL" class="img-fluid rounded-start" alt="product description">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{producto.TITULO}} | Q {{producto.PRECIO}} </h5>
                        <p class="card-text">{{producto.DESCRIPCION_PRODUCTO}}</p>
                        <p class="card-text"><small class="text-body-secondary">{{producto.DESCRIPCION_CATEGORIA}}
                                ({{producto.DESCRIPCION_MARCA}})</small></p>
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
<script>
    let id = <?php echo $id ?>;
</script>

<?php require('../templates/footer.php'); ?>
<?php require('../templates/scripts.php');
includeScript('product'); ?>