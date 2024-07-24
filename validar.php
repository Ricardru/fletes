<?php
/* variables*/
$usuario = $_POST['usuario'];
$pass = $_POST['pass'];

/*metodo*/
session_start();
$_SESSION['usuario'] = $usuario;

include("db.php");

$consulta="SELECT*FROM usuarios where usuario ='$usuario' and pass='$pass'";

$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    header("location:home.php");
}else{
    ?>
    <?php
    include("index.php");
    ?>
    <h1 class="bad">Error en el usuario o la contraseña</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);

?>
