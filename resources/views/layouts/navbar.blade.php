<!-- navigation bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Gestion de tâches</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target
    ="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label
            ="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/apropos">A Propos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/contact">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/taches/create">Ajouter_Tache</a>
            </li>

        </ul>
    </div>
    <div class="  float-end">
        <ul class="navbar-nav  ">
            <li class="nav-item">
                <a class="nav-link" href="/taches">lister_Tâches</a>
            </li>
            <!-- PROFILE DROPDOWN - scrolling off the page to the right -->
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navDropDownLink" d
                   ata-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Profile
                </a>
                <div class="dropdown-menu" aria-labelledby="navDropDownLink">
                    <a class="dropdown-item" href="#">Preferences</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
