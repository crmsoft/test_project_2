<!doctype html>
<html>
<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/bower_components/bootstrap4/dist/css/bootstrap.min.css">
    <script
        src="https://code.jquery.com/jquery-3.3.1.slim.js"
        integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA="
        crossorigin="anonymous"></script>
    <script src="/bower_components/bootstrap4/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<section class="container">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#"><?php echo $data['user']['email']; ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Account</a>
                    </li>
                </ul>
                <div class="form-inline my-2 my-lg-0">
                    <a class="nav-link logout-link" href="/logout">Logout</a>
                </div>
            </div>
        </nav>
    </header>
</section>

<section class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-secondary">
                <div class="card-header">
                    <h4 id="heading">Edit profile</h4>
                </div>
                <div class="card-body">
                    <?php include __DIR__.'/forms/register.php'; ?>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>