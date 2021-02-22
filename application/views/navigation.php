
<nav class="navbar navbar-expand-md navbar-light bg-light mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="/main">NIX_Education</a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="/main">Home</a>
                </li>
                <?php session_start();
                if (isset($_SESSION['login'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/profile">Profile</a>
                </li>
                <? endif;?>
                <li class="nav-item">
                    <a class="nav-link" href="#">Info</a>
                </li>
            </ul>
            <? if(isset($_SESSION['login'])){
                include "profile_navigation.php";
            }
            else {
                include "authorisation_navigation.php";
            } ?>
        </div>
    </div>
</nav>
