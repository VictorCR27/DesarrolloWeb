<?

include("db_conn.php");

if(isset($_POST['register'])){
    if(strlen($_POST['username']) >= 1 && strlen($_POST['email']) >= 1 && strlen($_POST['password']) >= 1){
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $consulta = 'INSERT INTO RegistroWeb(username, email, password) values ($username, $email, $password)';
        $resultado = mysqli_query($conex,$consulta);

        if($resultado){
            ?>
            <h3>todo bien</h3>
            <?
        }else{
            ?>
            <h3>todo mail</h3>
            <?
        }
    }
}
  
?>
