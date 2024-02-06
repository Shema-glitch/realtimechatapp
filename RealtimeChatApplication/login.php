<?php 
session_start();
if (isset($_SESSION['unique_id'])) { // if user already signed in keep the user still signed in
    header("location: users.php");
}
?>
<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Realtime Chat Application</header>
            <form action="#">
                <div class="error-txt"></div>

                <div class="field input">
                    <label>Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email address">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter new Password">
                    <i class="fas fa-eye"></i>
                </div>

                <div class="field button">
                    <input type="submit" value="Continue to Chat">
                </div>
            </form>
            <div class="link">Not yet Signed up? <a href="index.php">Sign Up Now</a></div>
        </section>
    </div>
    <script src="./JavaScript/pass-show-hide.js"></script>
    <script src="./JavaScript/login.js"></script>
</body>

</html>