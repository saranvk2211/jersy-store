<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
$username = $_SESSION['username']; // Get username from session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Jersey Store</title>
    <link rel="stylesheet" href="dashboard.css">
    <style>
     .profile-box {
    position: absolute;
    top: 20px;
    right: 20px;
    color: white;
    background-color: #222;
    padding: 10px 15px;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
}

.dropdown-content {
    display: none;
    position: absolute;
    top: 40px;
    right: 0;
    background-color: #333;
    min-width: 140px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    z-index: 1;
    border-radius: 5px;
}

.dropdown-content a {
    color: white;
    padding: 10px 14px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #444;
}

    </style>
</head>
<script>
     function toggleDropdown() {
        var dropdown = document.getElementById("profileDropdown");
        dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
    }

    // Optional: Close dropdown when clicking outside
    window.onclick = function(event) {
        if (!event.target.closest('.profile-box')) {
            document.getElementById("profileDropdown").style.display = "none";
        }
    }
    // Function to close the offer popup
    function closeOffer() {
        document.getElementById("offer-popup").style.display = "none";
    }

    // Function to filter jerseys
    function filterJerseys() {
        const input = document.getElementById("searchBar").value.toLowerCase();
        const jerseys = document.querySelectorAll(".jersey");

        jerseys.forEach(jersey => {
            const text = jersey.innerText.toLowerCase();
            jersey.style.display = text.includes(input) ? "block" : "none";
        });
    }
</script>
<body>
<body>
    <div class="profile-box" onclick="toggleDropdown()">
    👤 <?php echo htmlspecialchars($username); ?>
    <div id="profileDropdown" class="dropdown-content">
        <a href="login.html">Logout</a>
    </div>
</div>

    <header>
        <h1>AURA EXCAHNGE 2.0</h1><br>
        <img src="tho.jpg" alt="Jersey 1">
        <nav>
            <ul>
                <li><a href="login.html">Logout</a></li>
            </ul>
        </nav>
    </header>
    
    <section id="dashboard">
        <h2>Explore Our Jerseys</h2>
        <p>Click on a jersey to view details and purchase.<br>
            <b>"Wear the Passion. Play the Legacy."</b></p>
            <!-- Floating Discount Offer -->
<div id="offer-popup">
    <span class="close-btn" onclick="closeOffer()">&times;</span>
    <h3>🔥 Special Offer! 🔥</h3>
    <p>Get 20% OFF on all jerseys! Use code: <strong>JERSEY20</strong></p>
    <!-- Add this below <p>...</p> -->
   <input type="text" id="searchBar" placeholder="Search jerseys..." onkeyup="filterJerseys()" style="padding: 10px; width: 80%; max-width: 400px; border-radius: 8px; border: 1px solid #ccc; margin: 20px auto; display: block; font-size: 16px;">

    <a href="https://www.yoursite.com/offers" class="claim-btn">Claim Now</a>
</div><br><br>

        
        <div class="jersey-container">
            <!-- 12 Jerseys -->
            <div class="jersey" onclick="location.href='product.html?id=1'">
                <img src="jersey1.jpeg" alt="Jersey 1">
                <p><b>Argentina 2022</b></p>
            </div>
            <div class="jersey" onclick="location.href='product.html?id=2'">
                <img src="jersey2.jpeg" alt="Jersey 2">
                <p><b>Manchester city 2021</b></p>
            </div>
            <div class="jersey" onclick="location.href='product.html?id=3'">
                <img src="jersey3.jpeg" alt="Jersey 3">
                <p><b>Arsenal 2018 </b></p>
            </div>
            <div class="jersey" onclick="location.href='product.html?id=4'">
                <img src="jersey4.jpeg" alt="Jersey 4">
                <p><b>Manchester united 2012</b></p>
            </div>
            <div class="jersey" onclick="location.href='product.html?id=5'">
                <img src="jersey5.jpeg" alt="Jersey 5">
                <p><b>FC Barcelona 2015</b></p>
            </div>
            <div class="jersey" onclick="location.href='product.html?id=6'">
                <img src="jersey6.jpeg" alt="Jersey 6">
                <p><b>Santos FC 2017</b></p>
            </div>
            <div class="jersey" onclick="location.href='product.html?id=7'">
                <img src="jersey7.jpeg" alt="Jersey 7">
                <p><b>AC Milan 2011</b></p>
            </div>
            <div class="jersey" onclick="location.href='product.html?id=8'">
                <img src="jersey8.jpeg" alt="Jersey 8">
                <p><b>Real Madrid 2017</b></p>
            </div>
            <div class="jersey" onclick="location.href='product.html?id=9'">
                <img src="jersey9.jpeg" alt="Jersey 9">
                <p><b>Alnassar 2023</b></p>
            </div>
            <div class="jersey" onclick="location.href='product.html?id=10'">
                <img src="jersey10.jpeg" alt="Jersey 10">
                <p><b>Juventus 2008</b></p>
            </div>
            <div class="jersey" onclick="location.href='product.html?id=11'">
                <img src="jersey11.jpeg" alt="Jersey 11">
                <p><b>Pairs saint german(PSG) 2013</b></p>
            </div>
            <div class="jersey" onclick="location.href='product.html?id=12'">
                <img src="jersey12.jpeg" alt="Jersey 12">
                <p><b>Atlético Madrid 2018</b></p>
            </div>
        </div>
    </section>
    
    <footer>
        <p>&copy; 2025 Jersey Store. All rights reserved.</p>
    </footer>
</body>
</html>
