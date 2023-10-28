<?php require('../templates/header.php'); ?>
<?php require('../templates/menu.php'); ?>

<div class="container mt-5" id="body">
    <div id="alert"></div>
    <table class="table table-hover" id="myTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
                <th scope="col">Url</th>
                <th scope="col">Marca</th>
                <th scope="col">Categoria</th>
                <th scope="col">Estado</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div class="modal" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form">
                        <div class="mb-2">
                            <input type="text" class="form-control" placeholder="Titulo" name="titulo" id="titulo">
                        </div>
                        <div class="mb-2">
                            <textarea class="form-control" placeholder="Descripcion del producto" name="descripcion"
                                id="descripcion" cols="30" rows="5"></textarea>
                        </div>
                        <div class="mb-2">
                            <input type="number" class="form-control" value="0" name="precio" id="precio">
                        </div>
                        <div class="mb-2">
                            <input type="text" class="form-control" placeholder="URL de image" name="url" id="url">
                        </div>
                        <div class="mb-2">
                            <select class="form-select" id="marca">
                                <option v-for="(marca, index) in brands" :key="index" :data-subtext="marca.id"
                                    :value="marca.id">
                                    {{marca.descripcion}}</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <select class="form-select" id="categoria">
                                <option v-for="(categoria, index) in categories" :key="index"
                                    :data-subtext="categoria.id" :value="categoria.id">
                                    {{categoria.descripcion}}</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="submit">Guardar cambios</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../templates/footer.php'); ?>
<?php require('../templates/scripts.php');
includeScript('admin-products'); ?>