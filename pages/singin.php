<?php include('../templates/header.php'); ?>

<div class="content">
    <div id="alert"></div>
    <div class="container position-absolute top-50 start-50 translate-middle">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Crear cuenta</h4>
                    </div>
                    <div class="card-body">
                        <form id="form">
                            <div class="row">
                                <div class="col-12 nl">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter your Name">
                                    </div>
                                </div>
                                <div class="col-12 nl">
                                    <div class="form-group">
                                        <label for="last-name" class="form-label">Apellido</label>
                                        <input type="text" class="form-control" id="last-name"
                                            placeholder="Enter your Last Name">
                                    </div>
                                </div>
                                <div class="col-12 nl">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                            placeholder="Enter email">
                                    </div>
                                </div>
                                <div class="col-12 nl">
                                    <div class="form-group">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Password"
                                            autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-12 nl">
                                    <div class="form-group">
                                        <label for="confirm-password" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirm-password"
                                            placeholder="Confirm your password" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="singup start">
                                        <button type="button" class="btn btn-primary btn-block" id="submit">Guardar
                                            usuario</button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="login end">
                                        <a class="btn btn-link" href="#">Volver al login</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('../templates/scripts.php');
includeScript('singin');
?>