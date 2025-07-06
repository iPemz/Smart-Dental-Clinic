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

        .contact-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
    max-width: 90%;
    margin: auto;
    text-align: center;
}

/* CEO Image */
.contact-image2 {
    width: 100%;
    max-width: 100%; /* Fit the screen on mobile */
    height: auto;
    border-radius: 10px;
}

/* Doctors' Profiles */
.doctor-profiles {
    display: grid;
    grid-template-columns: 1fr 1fr; /* Two columns by default (wide screens) */
    gap: 20px;
    width: 100%;
    justify-content: center;
    align-items: center;
}

/* Doctor Profile Images */
.doctor-profiles .doctor-img-container {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    
}

.doctor-profiles img {
    width: 120px;  /* Set a small size */
    height: 120px; /* Keep it square */
    object-fit: cover; /* Ensure it doesn't stretch */
    border-radius: 10%; /* Makes it fully rounded */
    padding: 5px;
    transition: transform 0.3s ease-in-out;
}

/* Hover Effect */
.doctor-profiles img:hover {
    transform: scale(1.1); /* Slight zoom effect */
}

/* Doctor Names */
.doctor-name {
    position: absolute;
    bottom: -25px; /* Adjust this to place the name just below the image */
    text-align: center;
    width: 100%;
    font-size: 14px;
    font-weight: bold;
    color: #333;
}

/* Responsive Design for Tablets and Desktops */
@media (min-width: 768px) {
    .contact-container {
        flex-direction: row;
        justify-content: center;
        align-items: flex-start;
    }

    .contact-image2 {
        max-width: 350px;
    }

    .doctor-profiles {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: space-around;
        grid-template-columns: 1fr 1fr; /* Two columns in wide screens */
    }
}

/* Responsive Design for Mobile Screens */
@media (max-width: 480px) {
    .doctor-profiles {
        display: grid;
        justify-items: center;s
        grid-template-columns: 1fr 1fr; /* Two columns */
        gap: 10px;
    }

    .contact-image2 {
        max-width: 100%;
    }
}

 /* Adjust doctor name font size and position for mobile */
 .doctor-name {
        font-size: 12px; /* Smaller font size for mobile */
        bottom: -10px; /* Adjust positioning for better fit */
    }

    .doctor-profiles img {
        width: 100px;  /* Reduce the image size on mobile */
        height: 100px; /* Keep it square */
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


    footer {
        position: fixed;
        font-size:12px;
        text-align: left;
        bottom: 0;
        width: 70%;
        padding: 0px 0; /* Optional: Adjust padding for footer */
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="appointment.php">Appointment</a></li>
                    <li class="nav-item"><a class="nav-link" href="service.php">Service</a></li>
                    <li class="nav-item"><a class="nav-link" href="doctors.php">Doctors</a></li>
                    <li class="nav-item"><a class="nav-link" href="contactus.phpl">Contact Us</a></li>
                </ul>
                <!-- Footer with copyright -->
                <footer class="text-center mt-4">
                    <p>&copy; <span id="year"></p>
                    <p></span> Smart Dental Clinic. All Rights Reserved.</p>
                </footer>

                <script>
                    // JavaScript to update the year automatically
                    document.getElementById('year').textContent = new Date().getFullYear();
                </script>
            </div>
        </div>
    </nav>

    <div class="contact-container">
        <img src="img/CEO.jpeg" alt="CEO" class="contact-image2">
        <div class="doctor-profiles">
            <div class="doctor-img-container">
                <img src="img/image2.jpg" alt="Doctor 1">
                <div class="doctor-name">Dr Happyness</div>
            </div>
            <div class="doctor-img-container">
                <img src="img/image2.jpg" alt="Doctor 2">
                <div class="doctor-name">Dr Mwanafuraha</div>
            </div>
            <div class="doctor-img-container">
                <img src="img/image2.jpg" alt="Doctor 3">
                <div class="doctor-name">Dr Redempta</div>
            </div>
            <div class="doctor-img-container">
                <img src="img/image2.jpg" alt="Doctor 4">
                <div class="doctor-name">Dr Yassini</div>
            </div>
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
