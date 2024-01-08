<link rel="stylesheet" href="../css/header.css?v=<?php echo time(); ?>">
<nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <label class="logo">Alpha Dental Clinic</label>
    <ul>
        <li><a class="active" href="./homee.php">Home</a></li>
        <li><a href="./about.php">About</a></li>
        <li><a href="./services.php">Services</a></li>
    </ul>
    <form action="/dental_clinic/forntend/login.php">
        <div>
            <input type="submit" value="Login" class="btn1">
        </div>
    </form>
    <form action="/dental_clinic/forntend/signup.php">
        <div>
            <input type="submit" value="Sign Up" class="btn2">
        </div>
    </form>
</nav>