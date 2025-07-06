<?php
// Database connection
include 'includes/config.php'; // Ensure the correct path to your DB config

// Set site name with fallback
define('SITE_NAME', isset($site_name) ? htmlspecialchars($site_name, ENT_QUOTES, 'UTF-8') : 'Default Site Name');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, width=device-width, initial-scale=1">
    <title><?php echo SITE_NAME; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f8f8; }
        .header {
            background-color: #f8f8f8;
            color: #333;
            padding: 10px 20px;
            text-align: center;
            font-size: 4vw;
            font-weight: bold;
            width: 100%;
            margin: 10px auto;
            border-radius: 10px;
        }
        .navbar-logo { max-width: 150px;}
        .navbar-info {
            text-align: center;
            font-size: 1rem;
            color: #333;
            padding: 5px 0;
            width: 80%;
        }

        .additionalInfo {
    top: 10px; /* Adjust positioning if needed */
    right: 10px; /* Keep it aligned to the right */
    font-size: 14px;
    color: #555;
    background-color: #f8f9fa; /* Light background */
    padding: 5px 10px; /* Add some padding for spacing */
    border-radius: 5px;
}
        
        #navbarNav {
            position: fixed;
            top: 0;
            right: -100%;
            width: 250px;
            height: 100vh;
            background: white;
            border-top-left-radius: 25px;
            border-bottom-left-radius: 25px;
            box-shadow: -2px 0 10px rgba(0, 0, 0, 0.2);
            transition: right 0.3s ease-in-out;
            padding-top: 60px;
            font-weight: bold;
            z-index: 10;
        }

        #navbarNav.show {
            right: 0;
        }

        .navbar-toggler {
            position: relative;
            z-index: 1050;
        }
        .content-box {
            background: #f8f8f8;
            padding: 20px;
            margin: 20px auto;
            border-radius: 50px;
            max-width: 800px;
            float: left;
            height: auto;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 991px) { .navbar-info { display: none; } }
        .dock {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            padding: 10px 15px;
            border-radius: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            gap: 15px;
            width: 50%;
            justify-content: center;
        }
        .dock a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 10px;
            z-index: 10; /* Default z-index for larger screens */
            transition: background 0.3s;
        }

        /* Media query for small screens or devices like laptops */
        @media (max-width: 1024px) {
            .dock a {
                z-index: 5; /* Lower z-index for smaller screens */
            }
        }

        .dock a:hover { background: rgba(0, 0, 0, 0.1); }
        @media (max-width: 768px) { .dock { display: none; } }
        @media (min-width: 992px) { .navbar-nav { display: none !important; } }

        @media (max-width: 768px) {
            .navbar-brand img {
                max-width: 150px;
            }

            .navbar-toggler {
                font-size: 24px;
                font-weight: bold;
            }

            .navbar-nav {
                text-align: left;
                padding: 20px;
            }

            .navbar-nav .nav-item {
                padding: 10px 0;
                z-index: 10; /* Default z-index for larger screens */
            }
        }

        /* Responsive .image-box */
        .image-box {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            flex-wrap: wrap;
            padding: 0;
            border: none;
            border-radius: 8px;
            box-sizing: border-box;
            width: 100%; /* Ensure full width */
            height: auto; /* Allow image to adjust with screen size */
            margin: 0 auto;
            position: relative;
        }

        /* Image styling */
        .image-box img {
            width: 100%; /* Ensure the image takes up 100% of the parent container */
            padding: 0; /* Adjust padding for smaller screens */
            object-fit: cover;
            border-radius: 0px;
            transition: transform 0.3s ease-in-out;
        }

        /* Default style for larger devices (Laptop, Desktop, TV) */
        @media (min-width: 1200px) {
            .image-box img {
                width: 67%;
                padding: 0px; /* Adjust padding for larger screens */
            }
        }

        /* Media queries for smaller devices */
        @media (max-width: 1100px) {  /* Laptops and larger tablets */
            .image-box img {
                width: 90%;
                padding: 15px; /* Adjust padding for laptops */
            }
        }

        @media (max-width: 992px) {  /* Tablets and smaller tablets */
            .image-box img {
                width: 100%;
                padding: 12px; /* Adjust padding for tablets */
            }
        }

        @media (max-width: 768px) {  /* Mobile Phones */
            .image-box img {
                width: 100%;
                padding: 10px; /* Adjust padding for smaller screens */
            }
        }

        @media (max-width: 480px) {  /* Extra small mobile devices */
            .image-box img {
                width: 100%;
                padding: 5px; /* Further reduce padding on mobile */
            }
        }

        .image-box img:hover {
            transform: scale(1.1); /* Image hover effect */
        }

        /* Contact message (left-aligned) */
        .contact-message {
            background-color: #f8f8f8;
            font-family: "Times New Roman", Georgia, serif;
            color: rgba(7, 7, 7, 0.91);
            font-size: 15px;
            line-height: 1.6;
            max-width: 800px;
            height: auto;
            border-radius: 10px;
            padding: 20px;
            width: auto;
            position: absolute;
            left: 30px; /* Align left */
            top: 50%;
            transform: translateY(-50%);

            text-align: left;
        }

        .contact-message h1, .contact-message h2, .contact-message p {
            margin: 0;
            padding: 5px 0;
        }

        /* Clinic info message (right-aligned) */
        .clinic-info-message {
            background-color: #f8f8f8;
            font-family: "Times New Roman", Georgia, serif;
            color: rgba(7, 7, 7, 0.91);
            font-size: 15px;
            line-height: 1.6;
            max-width: 800px;
            height: auto;
            border-radius: 10px;
            padding: 20px;
            width: auto;
            position: absolute;
            right: 30px; /* Align right */
            top: 50%;
            transform: translateY(-50%);

            text-align: left;
        }

        .clinic-info-message .info-item {
            margin-bottom: 10px;
        }

        .clinic-info-message .info-item a {
            color: #007bff;
            text-decoration: none;
        }

        .clinic-info-message .info-item a:hover {
            text-decoration: underline;
        }

        /* Mobile device layout adjustments */
        @media (max-width: 768px) {
            .clinic-info-message {
                position: relative;
                right: auto;
                top: auto;
                transform: none;
                margin-bottom: 30px;
                text-align: left; /* Left align text on mobile */
            }

            .contact-message {
                position: relative;
                left: auto;
                top: auto;
                transform: none;
                text-align: left;
                margin-top: 20px;
            }
        }

        /* For wider screens, such as desktops */
@media screen and (min-width: 1024px) {
    .delay-2 {
        /* Adjust properties for .delay-2 */
        margin-left: 10%;  /* Example of spacing adjustment */
        font-size: 18px;    /* Example of text resizing */
    }

    .clinic-info-message {
        /* Adjust properties for .clinic-info-message */
        padding: 20px;
        margin-right: 10%;       /* Example of padding */
        max-width: 900px;    /* Example of max-width */
        font-size: 16px;     /* Adjust text size */
    }
}


        /* Ensure navbar-toggler-icon has a higher stacking order */
        .navbar-toggler-icon {
            z-index: 10; /* Adjust z-index for proper stacking */
        }

        /* Adjustments for tablets */
        @media (max-width: 1024px) {
            .dental-message {
                font-size: 14px;
                max-width: 80%;
                padding: 15px;
            }
        }

        /* Adjustments for mobile devices */
        @media (max-width: 768px) {
            .dental-message {
                font-size: 13px;
                max-width: 95%;
                padding: 12px;
                position: static;
                margin: 10px auto;
            }
        }

        .dental-message strong {
            color: #007bff;
        }

        .dental-message a {
            color: #28a745;
            font-weight: bold;
            text-decoration: none;
        }

        .dental-message a:hover {
            text-decoration: underline;
        }

        /* Basic styles for the elements */
        #images, .dental-message {
            opacity: 0;
            transform: translateY(20px);
            animation-duration: 1s;
            animation-fill-mode: both;
        }

        /* Animation for both elements */
        .fade-in-up {
            animation-name: fadeInUp;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Delay for the second element */
        .delay-1 {
            animation-delay: 0.5s; /* You can adjust the delay */
        }

        .delay-2 {
            animation-delay: 1s; /* You can adjust the delay */
        }

        /* Center the navbar content horizontally and vertically */
        #navbarInfo {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            padding: 10px;
            font-size: 15px;
            color: black;
            border-radius: 5px;
            z-index: 1000;
            width: auto;
            max-width: 100%;
        }
        
        /* Optional: make the content more responsive on smaller screens */
        @media (max-width: 768px) {
            #navbarInfo {
                font-size: 14px;
                padding: 8px;
            }
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light position-relative">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand" href="#">
                <img class="navbar-logo" src="img/ssdc.png" alt="Logo">
            </a>
            <div id="navbarInfo" class="navbar-info d-none d-lg-block position-absolute text-center">
                Monday - Saturday from 08:00am to 19:00pm
            </div>
            <div id="additionalInfo" class="additionalInfo">
                <a href="AboutUs.php" class="text-decoration-none">About Us</a> | 
                <a href="Developer.php" class="text-decoration-none">Smart &copy; 2025</a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="home.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="appointment.html">Appointment</a></li>
                    <li class="nav-item"><a class="nav-link" href="service.php">Service</a></li>
                    <li class="nav-item"><a class="nav-link" href="doctors.html">Doctors</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
                </ul>
            </div>
        </div>
        
    </nav>
    
    <div class="contact-message fade-in-up delay-2">
        <h1>Contact Us,</h1>
        <h2>Same Day Appointments are Available!</h2>
        <p>Your smile deserves the best!</p><br><br>
    </div>

    <div class="clinic-info-message">
        <div class="info-item">
            <strong>Smart Specialised Dental Clinic</strong><br>
            Opposite Merry Water Victoria, Green Acres House,<br>
            Bagamoyo Road, Ali Hassan Mwinyi Road, Dar es Salaam 15770
        </div>
        <div class="info-item">
            <strong>Phone:</strong> +255 123 456 789
        </div>
        <div class="info-item">
            <strong>Follow Us:</strong><br>
            <a href="https://facebook.com/yourclinic" target="_blank">Facebook</a><br>
            <a href="https://instagram.com/yourclinic" target="_blank">Instagram</a><br>
            <a href="https://twitter.com/yourclinic" target="_blank">Twitter</a>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const infoText = [
                "Monday - Saturday From 08:00 Am to 19:00 Pm | Sunday From 10:00 Am to 16:00 Pm",
                "Contact Us - +255 657 748 070 | Email Us - Smartdentalclinic@hotmail.com"
            ];
            let index = 0;
            const navbarInfo = document.getElementById("navbarInfo");
            function updateNavbarInfo() {
                navbarInfo.style.opacity = 0;
                setTimeout(() => {
                    navbarInfo.textContent = infoText[index];
                    index = (index + 1) % infoText.length;
                    navbarInfo.style.opacity = 1;
                }, 500);
            }
            setInterval(updateNavbarInfo, 5000);
            updateNavbarInfo();
        });
    </script>

    <div class="dock">
        <a href="index.php">Home</a>
        <a href="appointment.php">Appointment</a>
        <a href="service.php">Services</a>
        <a href="doctors.php">Doctors</a>
        <a href="contactUs.php">Contact</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in-up');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            const elementsToAnimate = document.querySelectorAll('.fade-in-up');
            elementsToAnimate.forEach(element => {
                observer.observe(element);
            });
        });
    </script>
    
</body>
</html>
