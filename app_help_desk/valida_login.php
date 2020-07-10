<?php

    session_start();

    //verifica se usuário esta autenticado
    $usuario_autenticado = false;
    $usuario_id = null;
    $usuario_perfil_id = null;

    $perfis = array(1 => 'administrativo', 2 => 'usuário');


    //usuarios do sistema
    $usuarios_app = array(
        array('id' => 1, 'email' => 'adm@teste.com', 'senha' => '123456', 'perfil_id' => 1),
        array('id' => 2, 'email' => 'user@teste.com', 'senha' => '123456', 'perfil_id' => 1),
        array('id' => 3, 'email' => 'fulano@teste.com', 'senha' => '123456', 'perfil_id' => 2),
        array('id' => 4, 'email' => 'cicrano@teste.com', 'senha' => '123456', 'perfil_id' => 2)
    );

    foreach($usuarios_app as $user){
        
        if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
            $usuario_autenticado = true;
            $usuario_id = $user['id'];
            $usuario_perfil_id = $user['perfil_id'];
        }
    }

    if ($usuario_autenticado) {
        echo 'Usuário autenticado';
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('Location:home.php');

    } else {
        $_SESSION['autenticado'] = 'NÂO';
        header('Location:index.php?login=erro');
    }

    // echo '<pre>';
    //     print_r($usuarios_app);
    // echo '</pre>';

    // print_r($_POST);
    // echo $_POST['email'];
    // echo $_POST['senha'];

?>