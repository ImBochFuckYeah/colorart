<?php require('../templates/header.php'); ?>
<?php require('../templates/sidebar.php'); ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 0;
}
?>
<div class="container" id="body">
    <div class="breadcum">
        <ol class="breadcrumb mt-5">
            <li class="breadcrumb-item"><a href="/colorart">Home</a></li>
            <li class="breadcrumb-item active">Category</li>
        </ol>
    </div>
    <div class="category-product mb-5" v-for="(categoria, index) in bodydata">
        <div class="category-title mb-4">
            <div class="row">
                <div class="col-10">
                    <h3>{{categoria.descripcion}}</h3>
                </div>
            </div>
        </div>
        <div class="container product-container">
            <div class="row">
                <div class="col" v-for="(producto, index) in categoria.productos">
                    <div class="card" aria-hidden="true">
                        <img :src="producto.URL" class="card-img-top" alt="loading">
                        <div class="card-body">
                            <h5 class="card-title">
                                <span>{{producto.TITULO}}</span>
                            </h5>
                            <p class="card-text">
                                {{producto.DESCRIPCION_MARCA}} | Q {{producto.PRECIO}}
                            </p>
                            <a class="btn btn-primary col-6" aria-disabled="true"
                                :href="'../product/' + producto.ID_PRODUCTO">Ver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<button class="btn btn-primary back-to-top" id="back-to-top" style="display: none;">
    Back to Top
</button>
<script>
    let id = <?php echo $id ?>;
</script>

<?php require('../templates/footer.php'); ?>
<?php require('../templates/scripts.php');
includeScript('category'); ?>