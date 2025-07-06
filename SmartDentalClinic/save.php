<?php
// Database connection
include 'includes/config.php'; // Ensure the correct path to your DB config
?>
<!-- index.php - Homepage -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $site_name; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f8f8 !important;
            margin: 0;
            padding: 0;
        }

        .header {
            position: relative;
            background-color: #f8f8f8;
            color: #333;
            padding: 10px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            font-size: 4vw;
            font-weight: bold;
            width: 60%;
            max-width: 1000px;
            margin: 10px auto;
            z-index: 1060;
        }

        .navbar {
            background-color: #f8f8f8 !important;
        }

        .navbar-logo {
            max-width: 100px;
            height: auto;
        }

        .navbar-toggler {
            border: none;
            outline: none;
        }

        .navbar-nav .nav-link {
            color: #333 !important;
            font-size: 1rem;
            font-weight: bold;
        }

        .navbar-nav .nav-link:hover {
            color: #007bff !important;
        }

        @media (max-width: 768px) {
            .navbar-brand img {
                max-width: 80px;
            }

            .navbar-toggler {
                font-size: 24px;
            }

            .navbar-nav {
                text-align: center;
            }

            .navbar-nav .nav-item {
                padding: 10px 0;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img class="navbar-logo" src="img/ssdc.png" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="home.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="appointment.html">Appointment</a></li>
                    <li class="nav-item"><a class="nav-link" href="service.php">Service</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Doctors</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
