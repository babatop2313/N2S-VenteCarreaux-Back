<!DOCTYPE html>
<html>
<head>
    <title>Confirmation de compte</title>
</head>
<body>
    <h3>Cher(e), {{ $user_info['nom']}} !</h3>
    <p>Merci, Vous être  inscrit(e) sur notre site A S E F,Veuillez cliquer sur le lien ci-dessous Pour</p>
    <a type="button" class="btn btn-primary"  href="{{ route('activation',$email)}}"> Confirmer votre compte
        
    </a>
         <p>Cordialement</p>
         <p>Merci !</p>
</body>
</html>

