<?php  include("root.php");?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>CV | Jonathan Zirhumana</title>
    <meta name="description" content="">
    <meta name="keywords" content="CV, Jonathan Zirhumana">
    <!-- Favicons -->
    <link href="<?=base_url;?>public/images/user.png" rel="icon">
    <link href="<?=base_url;?>public/images/user.png" rel="apple-touch-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <!-- Main CSS File -->
    <link href="./public/css/main.css" rel="stylesheet">
    <link href="./public/css/style.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        #header {
            background: linear-gradient(45deg, #007bff, #6610f2);
            color: white;
            padding: 15px 0;
        }
        #dob {
            background-image: url('<?=base_url;?>public/images/background.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #footer {
            bottom: 0;
            left: 0;
            width: 100%;
        }
        .nav-link {
            color: white !important;
        }
    </style>
</head>
<body class="index-page">
    <header id="header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#">CV</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Connexion</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="cv.php">Mon CV</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="main">
        <!-- Hero Section -->
        <section class="section" id="dob">
            <div class="container m-auto">
                <input id="search-input" type="search" placeholder="Rechercher un utilisateur ici..." class="form-control">
            </div>
        </section><!-- /Hero Section -->
    </main>

    <footer id="footer" class="footer position-fixed light-background">
        <div class="container">
            <div class="copyright text-center ">
                <p>© <span>Copyright</span> <strong class="px-1 sitename">CV</strong> Tout droit réservé</p>
                <div class="credits">
                    Crée par <a href="#">Jonathan Zirhumana</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="<?=base_url;?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
