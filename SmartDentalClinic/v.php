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
        /* Custom CSS for navbar */
        .navbar {
            background-color: transparent !important;
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%); /* Center the navbar horizontally */
            width: 50%; /* Adjust width as needed */
            z-index: 1050; /* Ensure navbar is in front of carousel */
            box-shadow: none; /* Optional: Remove box shadow */
        }

        .header {
            position: absolute; /* Keep absolute positioning */
            top: 0; /* Ensure it's always at the top */
            left: 50%;
            transform: translateX(-50%); /* Center horizontally */
            background-color: #f8f8f8;
            color: #333;
            padding: 10px 20px; /* Adjust padding for smaller screens */
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 10px;
            font-size: 4vw; /* Font size relative to the viewport width */
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 60%; /* Set the width relative to the screen size */
            max-width: 1000px; /* Prevent it from being too wide on large screens */
            margin: 0 auto;
            z-index: 1060;
        }

        .navbar-logo {
            max-width: 100px; /* Limit the logo size */
            height: 30px;
        }

        .navbar-buttons {
            display: flex;
            gap: 15px; /* Space between buttons */
        }

        .transparent-btn {
            background: transparent;
            border: 2px solid #333;
            padding: 10px 15px;
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

        /* Responsive Design: Adjust for smaller screens */
        @media (max-width: 768px) {
            .header {
                font-size: 5vw; /* Increase font size for small screens */
                padding: 15px 25px; /* Increase padding for better touchability */
            }
            
            .navbar-logo {
                max-width: 80px; /* Slightly smaller logo on small screens */
            }

            .navbar-buttons {
                flex-direction: column; /* Stack buttons vertically */
                gap: 10px;
            }

            .transparent-btn {
                padding: 12px 20px; /* Larger padding for touch screens */
            }
        }

        @media (max-width: 480px) {
            .header {
                font-size: 6vw; /* Further increase font size for very small screens */
                padding: 20px 30px; /* Increase padding for very small screens */
            }

            .navbar-logo {
                max-width: 70px; /* Even smaller logo on very small screens */
            }

            .navbar-buttons {
                flex-direction: column; /* Stack buttons vertically */
                gap: 8px;
            }

            .transparent-btn {
                padding: 15px 25px; /* Further increase button padding */
            }
        }


        /* Carousel as background */
        .carousel-inner {
            height: 100vh; /* Full screen height */
        }

        .carousel-item {
            background-size: cover;
            background-position: center;
            height: 100vh; /* Ensure it takes up the full viewport height */
            transition: background-image 1s ease-in-out; /* Smooth transition for background change */
        }

        .carousel-item.active {
            background-image: url('img/image2.jpg'); /* Background for the first (active) slide */
        }

        .carousel-item:nth-child(2) {
            background-image: url('img/image3.png'); /* Background for the second slide */
        }

        .carousel-item:nth-child(3) {
            background-image: url('img/image4.jpg'); /* Background for the third slide */
        }

        /* Ensure the content is placed in front of the carousel */
        .container {
            position: relative;
            z-index: 10; /* Content in front of carousel */
            padding-top: 0px; /* Space for navbar */
        }

        .footer {
            position: relative;
            z-index: 10; /* Footer stays above the carousel */
            background-color: #f8f9fa;
            padding: 20px 0;
        }

        .navbar a.nav-link {
            color: #fff !important; /* Make sure text stands out, adjust color as needed */
        }

        .navbar a.nav-link:hover {
            color: #ffb600 !important; /* Change to desired hover color */
        }

        /* Ensure the content stays readable on top of the images */
        .container h2, .container p, .container ul {
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Make text more readable on background */
        }
        
        .transparent-btn {
            background-color: transparent;
            border: none;
            box-shadow: none;
            color: #000; /* Change to any text color you prefer */
            font-size: 16px; /* Adjust font size if needed */
            padding: 10px 20px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s, color 0.3s;
        }

       

    </style>
</head>
<body>
    <!-- Navbar placed above the carousel -->
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
        <div class="container">
            <a class="navbar-brand" href="#">
            </a>

            
            </div>
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
<!-- Bootstrap CSS (ensure you include this in the head section) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<style>
  /* Make the images round */
  .service-image {
    border-radius: 50%;
    width: 100px; /* Adjust the size as needed */
    height: 100px;
    object-fit: cover;
  }
</style>

<div class="container">
  <div class="row">
    <!-- Service 1 -->
    <div class="col-6 col-md-4 col-lg-3">
      <img src="img/image2.jpg" alt="Service 1" class="service-image">
      <p>Service 1</p>
    </div>
    
    <!-- Service 2 -->
    <div class="col-6 col-md-4 col-lg-3">
      <img src="img/image2.jpg" alt="Service 2" class="service-image">
      <p>Service 2</p>
    </div>
    
    <!-- Service 3 -->
    <div class="col-6 col-md-4 col-lg-3">
      <img src="img/image2.jpg" alt="Service 3" class="service-image">
      <p>Service 3</p>
    </div>
    
    <!-- Service 4 -->
    <div class="col-6 col-md-4 col-lg-3">
      <img src="img/image2.jpg" alt="Service 4" class="service-image">
      <p>Service 4</p>
    </div>
    
    <!-- Add more services as needed -->
  </div>
</div>

<!-- Bootstrap JS (ensure you include this before the closing body tag) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>
