<?php

@session_start();
function mostrarAlerta($tipo){
    if(isset($_SESSION[$tipo])){
?>
    <p class="alert-<?= $tipo ?> "> <?=$_SESSION[$tipo]?> </p>
    <script>
        setTimeout(function() { document.getElementsByClassName('alert-danger')[0].remove(); }, 3000);
        setTimeout(function() { document.getElementsByClassName('alert-success')[0].remove(); }, 3000);
    </script> 
<?php        
        unset($_SESSION[$tipo]);
    }
}

?> 