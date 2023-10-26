<?php include('../templates/header.php'); ?>

<div class="content">
    <div id="alert"></div>
    <div class="container position-absolute top-50 start-50 translate-middle">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Iniciar Sesión</h4>
                    </div>
                    <div class="card-body">
                        <form id="form">
                            <div class="row">
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
                                <div class="col-6">
                                    <div class="login start">
                                        <button type="button" class="btn btn-primary btn-block" id="submit">Iniciar
                                            Sesión</button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="signup end">
                                        <a class="btn btn-link" href="singup.php">Crear una cuenta</a>
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
<?php include('../templates/scripts.php'); ?>