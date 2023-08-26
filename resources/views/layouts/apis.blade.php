<!DOCTYPE html>
<html>
<head>
  <title>A S E F</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
      <!-- Inclure le fichier CSS de DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap4.min.css">
    <!-- Inclure le fichier CSS de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">



<!-- Inclure les fichiers JavaScript requis de Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>


<!-- Inclure les fichiers JavaScript requis de DataTables -->
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap4.min.js"></script>
  
</head>
<style>
    body {
        padding-top: 70px; /* Ajoute un espace au-dessus du contenu pour la hauteur de l'en-tête fixe */
    }
    .fixed-sidebar {
      position: fixed;
      top: 70px;
      bottom: 0;
      left: 0;
      overflow-y: auto;
    }
</style>
<body>
<header class="bg-primary text-white fixed-top">
    <div class="container">
      <div class="row">
        <div class="col-3">
            <img class="img-responsive img-rounded" alt="A S E F " class="img-fluid" src="assets/images/logo.jpeg" width='50'>
          
        </div>
        <div class="col-9">
          <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="ml-auto">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('adminPanel') }}"><i class="fas fa-home"></i></a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="#"><i class="fas fa-user-friends"></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><i class="fas fa-bell"></i> <span class="badge badge-danger">3</span></a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('messaging.index') }}"><i class="fas fa-envelope"></i> <span class="badge badge-danger"> </span></a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i></a>
                  <div class="dropdown-menu" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="{{ route('show_comptes',session('the_user')[0]->id ) }}">Paramètres</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('deconnexion') }}">Déconnexion</a>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>

  <div class="content">
    <div class="row d-flex justify-content-between  ml-2 mr-2">
      <div class="col-lg-3 order-lg-1">
        <div class="card">
          <div class="card-header">
            Raccourcis
          </div>
          <div class="card-body">
            <ul class="list-group">
                <div class="row d-flex justify-content-between align-center">
                    <div class="col-mg-4">
                        <li class="list-group-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-users"></i> Groupes
                            </a>
                        </li>
                    </div>
                    <div class="col-mg-4">
                        <li class="list-group-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-envelope"></i> Invitations
                            </a>
                        </li>
                    </div>
                    <div class="col-mg-4">
                        <li class="list-group-item">
                            <a class="nav-link" href="#">
                                <i class="far fa-calendar-alt"></i> Événements
                            </a>
                        </li>
                    </div>
                </div>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-9 order-lg-2">
        <div class="card">
          <div class="card-body">
            <!-- Contenu des actualités -->
            @yield('content')
          </div>
        </div>
      </div>
    </div>
  </div>

<script>
  const textContainer = document.getElementById('textContainer');
  const readMoreBtn = document.getElementById('readMoreBtn');
  let isExpanded = false;

  readMoreBtn.addEventListener('click', () => {
      if (!isExpanded) {
          textContainer.style.maxHeight = 'none'; // Montre tout le texte
          readMoreBtn.innerText = 'Lire moins'; // Change le texte du bouton en "Lire moins"
      } else {
          textContainer.style.maxHeight = '100px'; // Cache le texte supplémentaire
          readMoreBtn.innerText = 'Lire plus'; // Change le texte du bouton en "Lire plus"
      }

      isExpanded = !isExpanded;
  });
</script>
</body>
</html>