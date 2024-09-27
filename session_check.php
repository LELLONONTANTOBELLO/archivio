session_start();

// Verifica accesso eseguito
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: /index.php");
    exit;
}
