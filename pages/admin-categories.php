<?php require('../templates/header.php'); ?>
<?php require('../templates/menu.php'); ?>

<div class="container mt-5" id="body">
    <div id="alert"></div>
    <table class="table table-hover" id="myTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Descripcion</th>
                <th scope="col">estado</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div class="modal" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nueva categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form">
                        <input type="text" placeholder="Descripcion" class="form-control" name="descripcion"
                            id="descripcion">
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
includeScript('admin-categories'); ?>