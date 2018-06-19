<?php
session_start();

if (isset($_COOKIE['id'])) {
    loguear(traerPorID($_COOKIE['id']));
}

function validar($data){
    $errores = [];
    $name = trim($data['name']);
    $email = trim($data['email']);
    $pais = trim($data['pais']);
    $pass = trim($data['pass']);
    $rpass = trim($data['rpass']);

    if ($name == '') {
        $errores['name'] = 'Por favor completa el nombre';
    }
    if ($email == '') {
        $errores['email'] = 'Por favor completa el email';
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'Por favor completa el email con un formato valido';
    }elseif (existeEmail($email)) {
        $errores['email'] = 'che el email ya existe';
    }
    if ($pais == '') {
        $errores['pais'] = 'Por favor completa el pais';
    }
    if ($pass == '' || $rpass = '') {
        $errores['pass'] = 'Por favor completa tus password';
    }
    // elseif ($pass !== $rpass) {
    //     $errores['pass'] = 'Tus contraseñas no coinciden';
    // }

    return $errores;
}

function crearArrayUsuario($data,$nombredelinput){
    $ext = pathinfo($_FILES[$nombredelinput]['name'], PATHINFO_EXTENSION);
    $usuario = [
        'id' => traerUltimoID(),
        'name' => $data['name'],
        'email' => $data['email'],
        'pais' => $data['pais'],
        'pass' => password_hash($data['pass'], PASSWORD_DEFAULT),
        'src' => 'imagenes/'.traerUltimoID().'.'.$ext,
    ];
    return $usuario;
}

function guardarUsuario($usuario){
    $usuarioJSON = json_encode($usuario);

    file_put_contents('usuarios.json',$usuarioJSON.PHP_EOL, FILE_APPEND);
}

function traerTodos(){
    $usuariosJSON = file_get_contents('usuarios.json');

    $usuariosArrayJSON = explode(PHP_EOL, $usuariosJSON);
    $usuariosPHP = [];
    foreach ($usuariosArrayJSON as $value) {
        $usuariosPHP[] = json_decode($value, true);
    }

    array_pop($usuariosPHP);

    return $usuariosPHP;
}

function existeEmail($email){
    $usuarios = traerTodos();

    foreach ($usuarios as $unUsuario) {
        if ($email == $unUsuario['email']) {
            return $unUsuario;
        }

    }
    return false;

}

function traerUltimoID(){
    $usuarios = traerTodos();

    if (empty($usuarios)) {
        return 1;
    }

    $ultimoUsuario = array_pop($usuarios);

    $ultimoID = $ultimoUsuario['id'];

    return $ultimoID + 1;


}

function guardarImagen($nombreInput){
    $errores = [];

    if ($_FILES[$nombreInput]['error'] === UPLOAD_ERR_OK) {
        $nombreDelArchivo = $_FILES[$nombreInput]['name'];
        $ext = pathinfo($nombreDelArchivo, PATHINFO_EXTENSION);
        $archivo = $_FILES[$nombreInput]['tmp_name'];

        if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png') {
            $dondeEstoy = dirname(__FILE__);
            $dondeLoVoyAGuardar = $dondeEstoy . '/imagenes/'. traerUltimoID().'.'.$ext;
            move_uploaded_file($archivo, $dondeLoVoyAGuardar);
        }else {
            $errores[$nombreInput] = 'Che no estas subiendo algo con formato valido';
        }

    }else{
        $errores[$nombreInput] = 'Che no estas subiendo nah';
    }

    return $errores;
}

function validarLogin($data){
    $email = trim($data['email']);
    $pass = trim($data['pass']);
    $errores = [];
    if ($email == '') {
        $errores['email'] = 'Por favor completa el email';
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'Por favor completa el email con un formato valido';
    }elseif (!$usuario = existeEmail($email)) {
        $errores['email'] = 'credenciales invalidas';
    }
    if ($pass == '') {
        $errores['pass'] = 'Por favor completa tu password';
    }elseif (!password_verify($pass, $usuario['pass'])) {
        $errores['pass'] = 'credenciales invalidas';
    }

    return $errores;
}

function loguear($usuario){
    $_SESSION['id'] = $usuario['id'];
}

function estaLogueado() {
    return isset($_SESSION['id']);
}

function traerPorID($id) {
    $usuarios = traerTodos();

    foreach ($usuarios as $unUsuario) {
        if ($id == $unUsuario['id']) {
            return $unUsuario;
        }

    }
    return false;
}

?>
