<section id="myNavbar">
    <h3 id="item-left"><a href="index.php">MonPanier</a></h3>
    <ul id="item-right">
        <li><a href="login.php">CONNECTION</a></li>
        <li><a href="signup.php">INSCRIPTION</a></li>
    </ul>
</section>

<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid custom-navbar">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div style=" 
   
   padding-left: 15%;
        
        " class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        $conn = $pdo->open();
                        try {
                            $stmt = $conn->prepare("SELECT * FROM category");
                            $stmt->execute();

                            foreach ($stmt as $row) {
                                echo "<li><a class='dropdown-item' href='category.php?category=" . $row['cat_slug'] . "'>" . $row['name'] . "</a></li>";
                            }
                        } catch (PDOException $e) {
                            echo "<li><a class='dropdown-item' href='#'>Error loading categories</a></li>";
                        }
                        $pdo->close();
                        ?>
                    </ul>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0" action="search.php" method="POST">
                <input id="navbar-search-input" class="form-control mr-sm-2" type="search"
                    placeholder="Rechercher un produit" aria-label="Search" name="keyword">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"
                    style="display: none;">Search</button>
            </form>

            <ul class="nav navbar-nav">
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i style="color: white;" class="fa fa-shopping-cart"></i>
                        <span class=" label cart_count"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Vous avez <span style="text-decoration:none" class="cart_count"></span> article(s) dans votre panier</li>
                        <li>
                            <ul class="menu" id="cart_menu"></ul>
                        </li>
                        <li class="footer"><a href="cart_view.php">Voir le panier</a></li>
                    </ul>
                </li>
                <li>
                    <?php
                    if (isset($_SESSION['user'])) {
                        $image = (!empty($user['photo'])) ? 'images/' . $user['photo'] : 'images/profile.jpg';
                        echo '
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="' . $image . '" class="user-image" alt="Image de l\'utilisateur">
                                <span class="hidden-xs">' . $user['firstname'] . ' ' . $user['lastname'] . '</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="' . $image . '" class="img-circle" alt="Image de l\'utilisateur">
                                    <p>' . $user['firstname'] . ' ' . $user['lastname'] . '<small>Membre depuis ' . date('M. Y', strtotime($user['created_on'])) . '</small></p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="profile.php" class="btn btn-default btn-flat">Profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="logout.php" class="btn btn-default btn-flat">Déconnexion</a>
                                    </div>
                                </li>
                            </ul>
                        </li>';
                    } else {

                    }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    #bar {

        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: left;
        align-items: stretch;
        align-content: stretch;
      padding-left: 10%;

    }

    /* Navbar Section */
    #myNavbar {
        margin: 1% 14%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #ccc;
    }

    #item-left a,
    #item-right a {
        color: white;
        text-decoration: none;
    }

    /* Navigation List */
    #item-right {
        list-style-type: none;
        display: flex;
        margin: 0;
        padding: 0;
    }

    #item-right li {
        margin-right: 15px;
    }

    #item-right a:hover {
        color: #ddd;
        opacity: 0.7;
    }

    /* Navbar Search Input */
    #navbar-search-input {
        width: 40vw;
    }

    /* Responsive Navbar */
    @media only screen and (max-width: 784px) {
        #item-right a {
            display: none;
        }

      
    }

    .custom-navbar {
        margin: 0 10%;
    }
 
    
</style>