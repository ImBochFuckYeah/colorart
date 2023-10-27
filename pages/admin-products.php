<?php require('../templates/header.php'); ?>
<?php require('../templates/menu.php'); ?>

<div class="container mt-5" id="body">
    <table class="table table-hover" id="myTable">
        <thead>
            <tr>
                <th scope="col">Row 1</th>
                <th scope="col">Row 2</th>
                <th scope="col">Row 3</th>
                <th scope="col">Row 4</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div class="modal" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../templates/footer.php'); ?>
<?php require('../templates/scripts.php');
includeScript('admin-products'); ?>