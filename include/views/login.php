<!doctype html>
<html>
<head>
    <title>Please login</title>
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
<body class="login">
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 id="heading">Enter your credentials</h4>
                    </div>
                    <div class="card-body">
                        <?php if(isset($_SESSION['message'])) : ?>
                            <div class="alert alert-dark" role="alert">
                                <?php echo $_SESSION['message']; ?>
                            </div>
                        <?php endif; ?>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#login" role="tab" aria-controls="home" aria-selected="true">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#register" role="tab" aria-controls="profile" aria-selected="false">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content pt-5" id="myTabContent">
                            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="home-tab">
                                <?php include __DIR__.'/forms/login.php'; ?>
                            </div>
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="profile-tab">
                                <?php include __DIR__.'/forms/register.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if($_SESSION['show_register']): ?>
        <script>
            $(function () {
                $('#myTab li:last-child a').tab('show')
            })
        </script>
    <?php endif; ?>
</body>
</html>