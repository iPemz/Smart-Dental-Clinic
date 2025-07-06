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
 
        .header {
            position: fixed; /* Ili ibaki juu wakati wa scroll */
            top: 0; 
            left: 50%;
            transform: translateX(-50%);
            background-color: #f8f8f8;
            color: #333;
            padding: 10px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 10px;
            font-size: 4vw;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: auto;
            max-width: 90%;
            min-width: 280px;
            margin: 0 auto;
            z-index: 1060;
        }

        .navbar-logo {
            max-width: 80px; 
            height: auto;
        }

        /* Hii inazuia buttons kushuka chini */
        .navbar-buttons {
            display: flex;
            flex-wrap: nowrap; /* Hakikisha hazishuki */
            gap: 10px; /* Punguza gap ili zitose kwenye simu */
        }

        /* Badili padding ili zitose vizuri kwenye simu */
        .transparent-btn {
            background: transparent;
            border: 2px solid #333;
            padding: 8px 12px; /* Punguza padding */
            min-width: 80px; /* Hakikisha buttons zina size ndogo lakini zinatosha */
            color: #333;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .transparent-btn:hover {
            background-color: #333;
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header {
                font-size: 5vw;
                padding: 10px 5%;
                max-width: 95%;
            }
            
            .navbar-logo {
                max-width: 70px;
            }

            .navbar-buttons {
                flex-wrap: nowrap; /* Hakikisha buttons zinabaki kwenye mstari mmoja */
                gap: 8px; /* Punguza nafasi kati ya buttons */
            }

            .transparent-btn {
                padding: 8px 10px; /* Punguza padding kwa simu ndogo */
                font-size: 0.9rem; /* Punguza font size kidogo */
            }
        }

    @media (max-width: 480px) {
        .header {
                font-size: 6vw;
                padding: 10px 5%;
                max-width: 98%;
            }

            .navbar-logo {
                max-width: 60px;
            }

            .navbar-buttons {
                flex-wrap: nowrap; /* Endelea kuzuia buttons kushuka */
                gap: 6px;
            }

            .transparent-btn {
                padding: 7px 10px;
                font-size: 0.85rem;s
            }
        }


        /* Make the images round */
        .service-image {
            border-radius: 50%;
            width: 100px; /* Adjust the size as needed */
            height: 100px;
            object-fit: cover;
        }


        .footer {
            position: relative;
            z-index: 10; /* Footer stays above the carousel */
            background-color: #f8f9fa;
            padding: 20px 0;
        }

    </style>
</head>
<body>
    <!-- Navbar placed above the carousel -->
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
        <div class="container">
            <a class="navbar-brand" href="#"></a>
        </div>
    </nav>

    <div class="header">
        <!-- Logo on the left -->
        <img class="navbar-logo" src="img/ssdc.png" alt="Logo">
        <!-- Navigation Buttons -->
        <div class="navbar-buttons">
            <button class="transparent-btn" onclick="window.location.href='home.html'">Home</button>
            <button class="transparent-btn" onclick="window.location.href='appointment.html'">Appointment</button>
            <button class="transparent-btn" onclick="window.location.href='service.php'">Service</button>
            <button class="transparent-btn" onclick="window.location.href='contact.html'">Doctors</button>
            <button class="transparent-btn" onclick="window.location.href='contact.html'">Contact Us</button>
        </div>
    </div>

    <!-- Service Section -->
   <center> <div class="container mt-5 pt-5">
        <h2 class="text-center">Our Services</h2>
        <div class="row">
            <!-- Service 1 -->
            <div class="col-6 col-md-4 col-lg-3">
                <img src="img/image2.jpg" alt="Service 1" class="service-image">
                <p class="text-center">Service 1</p>
            </div>

            <!-- Service 2 -->
            <div class="col-6 col-md-4 col-lg-3">
                <img src="img/image2.jpg" alt="Service 2" class="service-image">
                <p class="text-center">Service 2</p>
            </div>

            <!-- Service 3 -->
            <div class="col-6 col-md-4 col-lg-3">
                <img src="img/image2.jpg" alt="Service 3" class="service-image">
                <p class="text-center">Service 3</p>
            </div>

            <!-- Service 4 -->
            <div class="col-6 col-md-4 col-lg-3">
                <img src="img/image2.jpg" alt="Service 4" class="service-image">
                <p class="text-center">Service 4</p>
            </div>
        </div>
    </div></center>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
