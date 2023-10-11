
<!------ Include the above in your HEAD tag 
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
---------->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="N2S">
    <title>N2S</title>
    


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
  

    <!-- Scripts -->

</head>
<style>
    .custom-img {
    height: 150px; /* Ajustez cette valeur selon vos besoins */
    object-fit: cover; /* Ajuste l'ajustement de l'image */
    }

    .switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 20px;
    }

    .switch input {
    display: none;
    }

    .switch label {
    cursor: pointer;
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background-color: #ccc;
    border-radius: 34px;
    transition: background-color 0.3s;
    }

    .switch label:after {
    content: '';
    position: absolute;
    width: 15px;
    height: 15px;
    border-radius: 50%;
    top: 4px;
    left: 4px;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    transition: left 0.3s;
    }

    .switch input:checked + label {
    background-color: #66bb6a;
    }

    .switch input:checked + label:after {
    left: 30px;
    }

    @keyframes swing {
    0% {
        transform: rotate(0deg);
    }
    10% {
        transform: rotate(10deg);
    }
    30% {
        transform: rotate(0deg);
    }
    40% {
        transform: rotate(-10deg);
    }
    50% {
        transform: rotate(0deg);
    }
    60% {
        transform: rotate(5deg);
    }
    70% {
        transform: rotate(0deg);
    }
    80% {
        transform: rotate(-5deg);
    }
    100% {
        transform: rotate(0deg);
    }
    }

    @keyframes sonar {
    0% {
        transform: scale(0.9);
        opacity: 1;
    }
    100% {
        transform: scale(2);
        opacity: 0;
    }
    }
    body {
    font-size: 0.9rem;
    }
    .page-wrapper .sidebar-wrapper,
    .sidebar-wrapper .sidebar-brand > a,
    .sidebar-wrapper .sidebar-dropdown > a:after,
    .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a:before,
    .sidebar-wrapper ul li a i,
    .page-wrapper .page-content,
    .sidebar-wrapper .sidebar-search input.search-menu,
    .sidebar-wrapper .sidebar-search .input-group-text,
    .sidebar-wrapper .sidebar-menu ul li a,
    #show-sidebar,
    #close-sidebar {
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
    }

    /*----------------page-wrapper----------------*/

    .page-wrapper {
    height: 100vh;
    }

    .page-wrapper .theme {
    width: 40px;
    height: 40px;
    display: inline-block;
    border-radius: 4px;
    margin: 2px;
    }

    .page-wrapper .theme.chiller-theme {
    background: #1e2229;
    }

    /*----------------toggeled sidebar----------------*/

    .page-wrapper.toggled .sidebar-wrapper {
    left: 0px;
    }

    @media screen and (min-width: 768px) {
    .page-wrapper.toggled .page-content {
        padding-left: 300px;
    }
    }
    /*----------------show sidebar button----------------*/
    #show-sidebar {
    position: fixed;
    left: 0;
    top: 10px;
    border-radius: 0 4px 4px 0px;
    width: 35px;
    transition-delay: 0.3s;
    }
    .page-wrapper.toggled #show-sidebar {
    left: -40px;
    }
    /*----------------sidebar-wrapper----------------*/

    .sidebar-wrapper {
    width: 260px;
    height: 100%;
    max-height: 100%;
    position: fixed;
    top: 0;
    left: -300px;
    z-index: 999;
    }

    .sidebar-wrapper ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
    }

    .sidebar-wrapper a {
    text-decoration: none;
    }

    /*----------------sidebar-content----------------*/

    .sidebar-content {
    max-height: calc(100% - 30px);
    height: calc(100% - 30px);
    overflow-y: auto;
    position: relative;
    }

    .sidebar-content.desktop {
    overflow-y: hidden;
    }

    /*--------------------sidebar-brand----------------------*/

    .sidebar-wrapper .sidebar-brand {
    padding: 10px 20px;
    display: flex;
    align-items: center;
    }

    .sidebar-wrapper .sidebar-brand > a {
    text-transform: uppercase;
    font-weight: bold;
    flex-grow: 1;
    }

    .sidebar-wrapper .sidebar-brand #close-sidebar {
    cursor: pointer;
    font-size: 20px;
    }
    /*--------------------sidebar-header----------------------*/

    .sidebar-wrapper .sidebar-header {
    padding: 20px;
    overflow: hidden;
    }

    .sidebar-wrapper .sidebar-header .user-pic {
    float: left;
    width: 60px;
    height: 60px;
    padding: 2px;
    border-radius: 12px;
    margin-right: 15px;
    overflow: hidden;
    }

    .sidebar-wrapper .sidebar-header .user-pic img {
    object-fit: cover;
    height: 100%;
    width: 100%;
    }

    .sidebar-wrapper .sidebar-header .user-info {
    float: left;
    }

    .sidebar-wrapper .sidebar-header .user-info > span {
    display: block;
    }

    .sidebar-wrapper .sidebar-header .user-info .user-role {
    font-size: 12px;
    }

    .sidebar-wrapper .sidebar-header .user-info .user-status {
    font-size: 11px;
    margin-top: 4px;
    }

    .sidebar-wrapper .sidebar-header .user-info .user-status i {
    font-size: 8px;
    margin-right: 4px;
    color: #5cb85c;
    }

    /*-----------------------sidebar-search------------------------*/

    .sidebar-wrapper .sidebar-search > div {
    padding: 10px 20px;
    }

    /*----------------------sidebar-menu-------------------------*/

    .sidebar-wrapper .sidebar-menu {
    padding-bottom: 10px;
    }

    .sidebar-wrapper .sidebar-menu .header-menu span {
    font-weight: bold;
    font-size: 14px;
    padding: 15px 20px 5px 20px;
    display: inline-block;
    }

    .sidebar-wrapper .sidebar-menu ul li a {
    display: inline-block;
    width: 100%;
    text-decoration: none;
    position: relative;
    padding: 8px 30px 8px 20px;
    }

    .sidebar-wrapper .sidebar-menu ul li a i {
    margin-right: 10px;
    font-size: 12px;
    width: 30px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    border-radius: 4px;
    }

    .sidebar-wrapper .sidebar-menu ul li a:hover > i::before {
    display: inline-block;
    animation: swing ease-in-out 0.5s 1 alternate;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-dropdown > a:after {
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    content: "\f105";
    font-style: normal;
    display: inline-block;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    background: 0 0;
    position: absolute;
    right: 15px;
    top: 14px;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu ul {
    padding: 5px 0;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li {
    padding-left: 25px;
    font-size: 13px;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a:before {
    content: "\f111";
    font-family: "Font Awesome 5 Free";
    font-weight: 400;
    font-style: normal;
    display: inline-block;
    text-align: center;
    text-decoration: none;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    margin-right: 10px;
    font-size: 8px;
    }

    .sidebar-wrapper .sidebar-menu ul li a span.label,
    .sidebar-wrapper .sidebar-menu ul li a span.badge {
    float: right;
    margin-top: 8px;
    margin-left: 5px;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a .badge,
    .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a .label {
    float: right;
    margin-top: 0px;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-submenu {
    display: none;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active > a:after {
    transform: rotate(90deg);
    right: 17px;
    }

    /*--------------------------side-footer------------------------------*/

    .sidebar-footer {
    position: absolute;
    width: 100%;
    bottom: 0;
    display: flex;
    }

    .sidebar-footer > a {
    flex-grow: 1;
    text-align: center;
    height: 30px;
    line-height: 30px;
    position: relative;
    }

    .sidebar-footer > a .notification {
    position: absolute;
    top: 0;
    }

    .badge-sonar {
    display: inline-block;
    background: #980303;
    border-radius: 50%;
    height: 8px;
    width: 8px;
    position: absolute;
    top: 0;
    }

    .badge-sonar:after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    border: 2px solid #980303;
    opacity: 0;
    border-radius: 50%;
    width: 100%;
    height: 100%;
    animation: sonar 1.5s infinite;
    }

    /*--------------------------page-content-----------------------------*/

    .page-wrapper .page-content {
    display: inline-block;
    width: 100%;
    padding-left: 0px;
    padding-top: 20px;
    }

    .page-wrapper .page-content > div {
    padding: 20px 40px;
    }

    .page-wrapper .page-content {
    overflow-x: hidden;
    }

    /*------scroll bar---------------------*/

    ::-webkit-scrollbar {
    width: 5px;
    height: 7px;
    }
    ::-webkit-scrollbar-button {
    width: 0px;
    height: 0px;
    }
    ::-webkit-scrollbar-thumb {
    background: #525965;
    border: 0px none #ffffff;
    border-radius: 0px;
    }
    ::-webkit-scrollbar-thumb:hover {
    background: #525965;
    }
    ::-webkit-scrollbar-thumb:active {
    background: #525965;
    }
    ::-webkit-scrollbar-track {
    background: transparent;
    border: 0px none #ffffff;
    border-radius: 50px;
    }
    ::-webkit-scrollbar-track:hover {
    background: transparent;
    }
    ::-webkit-scrollbar-track:active {
    background: transparent;
    }
    ::-webkit-scrollbar-corner {
    background: transparent;
    }


    /*-----------------------------chiller-theme-------------------------------------------------*/

    .chiller-theme .sidebar-wrapper {
        background: #21263D;
    }

    .chiller-theme .sidebar-wrapper .sidebar-header,
    .chiller-theme .sidebar-wrapper .sidebar-search,
    .chiller-theme .sidebar-wrapper .sidebar-menu {
        border-top: 1px solid #3a3f48;
    }

    .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
    .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text {
        border-color: transparent;
        box-shadow: none;
    }

    .chiller-theme .sidebar-wrapper .sidebar-header .user-info .user-role,
    .chiller-theme .sidebar-wrapper .sidebar-header .user-info .user-status,
    .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
    .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text,
    .chiller-theme .sidebar-wrapper .sidebar-brand>a,
    .chiller-theme .sidebar-wrapper .sidebar-menu ul li a,
    .chiller-theme .sidebar-footer>a {
        color: white;
    }

    .chiller-theme .sidebar-wrapper .sidebar-menu ul li:hover>a,
    .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active>a,
    .chiller-theme .sidebar-wrapper .sidebar-header .user-info,
    .chiller-theme .sidebar-wrapper .sidebar-brand>a:hover,
    .chiller-theme .sidebar-footer>a:hover i {
        color: #b8bfce;
    }

    .page-wrapper.chiller-theme.toggled #close-sidebar {
        color: #bdbdbd;
    }

    .page-wrapper.chiller-theme.toggled #close-sidebar:hover {
        color: #ffffff;
    }

    .chiller-theme .sidebar-wrapper ul li:hover a i,
    .chiller-theme .sidebar-wrapper .sidebar-dropdown .sidebar-submenu li a:hover:before,
    .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu:focus+span,
    .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active a i {
        color: #16c7ff;
        text-shadow:0px 0px 10px rgba(22, 199, 255, 0.5);
    }

    .chiller-theme .sidebar-wrapper .sidebar-menu ul li a i,
    .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown div,
    .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
    .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text {
        background: #3a3f48;
    }

    .chiller-theme .sidebar-wrapper .sidebar-menu .header-menu span {
        color: #6c7b88;
    }

    .chiller-theme .sidebar-footer {
        background: #21263D;
        box-shadow: 0px -1px 5px #282c33;
        border-top: 1px solid #464a52;
    }

    .chiller-theme .sidebar-footer>a:first-child {
        border-left: none;
    }

    .chiller-theme .sidebar-footer>a:last-child {
        border-right: none;
    }

</style>
<body>

    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#">N 2 S</a>
                    <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="sidebar-header">
                <div class="user-pic">
                    <img class="img-responsive img-rounded" src="{{ asset('assets/images/logo.jpg')}}"
                        alt="User">
                </div>
                <div class="user-info">
                    <span class="user-name">{{ session('the_user')[0]->prenom }}
                        <strong>{{ session('the_user')[0]->nom }}</strong>
                    </span>
                    <span class="user-role">
                        @if (session('the_user')[0]->profil == 'admin')
                            Administrateur
                        @else

                            {{ session('the_user')[0]->profil }}
                        @endif
                    </span>
                    <span class="user-status">
                        <i class="fa fa-circle"></i>
                        <span>Online</span>
                    </span>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li class="header-menu">
                        <span>General</span>
                    </li>
                    
                    
                    <li>
                        <a href="{{ route('actu') }}">
                        <i class="fa fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('carrelage') }}">
                        <i class="fa fa-book"></i>
                        <span>Carreaux</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('types.index') }}">
                        <i class="fa fa-tools"></i>
                        <span>Catégories</span>
                        </a>
                    </li>
                    


                    
                    <li class="header-menu">
                        <span>Site</span>
                    </li>
                    <li>
                        <a href="#">
                        <i class="fa fa-calendar"></i>
                        <span>Commandes</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <i class="fa fa-folder"></i>
                        <span>Factures</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
            <a href="#">
                <i class="fa fa-bell"></i>
                <span class="badge badge-pill badge-warning notification">3</span>
            </a>
           
            <a href="{{ route('show_compte',session('the_user')[0]->id ) }}">
                <i class="fa fa-cog"></i>
                <span class="badge-sonar"></span>
            </a>
            <a href="{{ route('deconnexion') }}">
                <i class="fa fa-power-off"></i>
            </a>
            </div>
        </nav>
        <!-- sidebar-wrapper  -->
        <main class="page-content mt-5">

            @yield('content')

            
            </div>
        </main>
        <!-- page-content" -->
    </div>
    <!-- page-wrapper 
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.bundle.min.js"></script>
-->
        
           
            <!-- Bootstrap -->
            <script src="{{ asset('gt/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
            
            <script src="{{ asset('gt/build/js/custom.min.js') }}"></script>
                
            <script src="{{ asset('js/outils.js') }}"></script>
    

        <script type="text/javascript" src="/assets/js/mdb.min.js"></script>

        

        <script type="text/javascript">

            var tab = [];

                function changeStatus(ev){
                    var confirm = window.confirm("Voulez-vous vraiment changer l'état");
                    if(confirm){
                        var tab = [];
                        $('input[name="case"]').each(function () {
                            if (this.checked) {
                                tab.push(parseInt($(this).val())); 
                            }
                        });
                        if(tab.length > 0){
                            $.ajax({
                                type: "POST",
                                url: '/change_status',
                                data: { infos: tab,status: ev ,_token: '{{csrf_token()}}' },
                                success: function (data) {
                                    if(data){
                                        var loc = window.location;
                                        window.location = loc;
                                    }
                                },
                                error: function (data, textStatus, errorThrown) {
                                    console.log(data);
                                

                                },
                            });
                        }else{
                            alert('Merci de selectionner un article !');
                        }
                
                    }
                
                }
            

        
            

            function change_etat() {
                confirm("Voulez-vous vraiment changer l'état de l'utilisateur");
            }

        </script>


        <script>
            jQuery(function ($) {

                $(".sidebar-dropdown > a").click(function() {
            $(".sidebar-submenu").slideUp(200);
            if (
                $(this)
                .parent()
                .hasClass("active")
            ) {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                .parent()
                .removeClass("active");
            } else {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                .next(".sidebar-submenu")
                .slideDown(200);
                $(this)
                .parent()
                .addClass("active");
            }
            });

            $("#close-sidebar").click(function() {
            $(".page-wrapper").removeClass("toggled");
            });
            $("#show-sidebar").click(function() {
            $(".page-wrapper").addClass("toggled");
            });


            
            
            });
        </script>
        <script>
        function toggleStatus(url) {
            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(response => {
                    getElementById('alert').innerHtml=" <button type='button' class='close' data-dismiss='alert'><i class='fa fa-times'></i></button><strong>Succès !</strong> ",data.success
                            const successMessage = document.createElement('div');
                            successMessage.classList.add('alert', 'alert-success');
                            successMessage.innerText = data.success; // Le message de succès envoyé par le serveur
                            document.body.appendChild(successMessage);

                            // Supprimer le message de succès après quelques secondes
                            setTimeout(() => {
                                successMessage.remove();
                            }, 3000); // 
                        // Vous pouvez également ajouter des classes CSS ou d'autres modifications d'interface ici
                 
            }).catch(error => {
                // Gérer les erreurs (facultatif)
            });
        }
    </script>
        

</body>
</html>
