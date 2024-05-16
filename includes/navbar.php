<?php
// session_start();
// if ($_SESSION['email'] && $_SESSION['password']) {

?>

<body>
    <!-- Navbar -->
    <header>
        <div class="container-fluid">
            <div class="row p-2 navbar_row">
                <div class="col-lg-3">
                    <img src="img/logo-png-veeaar-1.png" alt="" class="logo" />
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-3 text-end">
                    <div class="pt-lg-2">
                        <a href="" class="fw-bold signupBtn">Hey : <?php echo $_SESSION['name']; ?></a>
                    </div>
                </div>
                <div class="col-lg-3 text-end">
                    <div class="pt-lg-2">
                        <a href="logout.php" class="fw-bold signupBtn">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Navbar End -->

    <?php

    // }
    ?>