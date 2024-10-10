<?php
$id = $_GET['id'];
$name = $_GET['name'];
$description = $_GET['description'];
$price = $_GET['price'];
$image = $_GET['image'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= htmlspecialchars($name) ?> - Vogue Vault</title>
    <!-- Bootstrap icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap) -->
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">Vogue Vault</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Shop</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Item Detail Section -->
    <section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                <img class="card-img-top mb-5 mb-md-0" src="<?= htmlspecialchars($image) ?>" alt="<?= htmlspecialchars($name) ?>">
            </div>
            <div class="col-md-6">
                <div class="small mb-1">Product ID: <?= htmlspecialchars($id) ?></div>
                <h1 class="display-5 fw-bolder"><?= htmlspecialchars($name) ?></h1>
                <div class="fs-5 mb-5">
                    <span>$<?= htmlspecialchars(number_format($price, 2)) ?></span>
                </div>
                <p class="lead"><?= htmlspecialchars($description) ?></p>
                <div class="d-flex mb-3">
                    <a class="btn btn-outline-dark flex-shrink-0" href="#">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </a>
                </div>
                <a class="btn btn-secondary" href="index.php">Back to Home</a>
            </div>
        </div>
    </div>
</section>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Vogue Vault 2023</p></div>
    </footer>

    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="js/scripts.js"></script>
</body>
</html>