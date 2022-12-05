<?php
    //añadimos usuarios, si no se han creado previamente
    $trial_user = get_users();
    $num_filas_trial = get_num_rows($trial_user);
    //Si no hay resultados, añadimos el usuario
    if ($num_filas_trial == 0){
        add_user('Maria', '1234', 1);
        add_user('Angeles', '1234', 0);
    }
?>