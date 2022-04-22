<header id="header ">
    <nav class="d-flex navbar-expand-lg navbar-dark align-items-center  "style="background: #000000">
        <a href="index.php" class="navbar-brand">
            <h3 class="px-5">
                <img src="../images/logo_300x300.webp" style="background: #000000">
            </h3>
        </a>
        <button class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target ="#navbarNavAltMarkup"
                aria-controls="#navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggle-icon"></span>
        </button>
        <div class="navbar-collapse " id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i>Cart
                        <?php
                        if(isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id ='cart_count' class= 'text-warning bg-light rounded-pill  px-3'>$count</span>";
                        }else{
                            echo "<span id ='cart_count' class= 'text-warning bg-light rounded-pill px-3 '>0</span>";
                        }
                        ?>
                    </h5>
                </a>
            </div>
        </div>
        <div class="dropdown p-2  rounded-pill " style="background: #000000">
            <a href="#" class="d-flex align-items-center p-2 rounded-pill text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"
               style="background: #ef6d9f"
            >
                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle me-2">

                <span style="color: #f1f1f1;"><?php echo "".$_SESSION['username']?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1" style="background: #000000">
                <li><a class="dropdown-item" href="#">Product</a></li>
                <li><a class="dropdown-item" href="#">Admin</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../login/logout.php">Sign out</a></li>
            </ul>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</header>
