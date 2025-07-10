<?php
session_start();

// Funzione per verificare se l'utente è loggato
function verificaAutenticazione() {
    // Controlla se l'utente è loggato
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        // Reindirizza alla pagina di login
        header("Location: /index.php");
        exit("Accesso negato. Effettua il login.");
    }
    
    // Controlla se la sessione è scaduta (opzionale - 30 minuti)
    if (isset($_SESSION['ultima_attivita']) && (time() - $_SESSION['ultima_attivita'] > 1800)) {
        // Distruggi la sessione scaduta
        session_destroy();
        header("Location: /index.php?scaduta=1");
        exit("Sessione scaduta. Effettua nuovamente il login.");
    }
    
    // Aggiorna il timestamp dell'ultima attività
    $_SESSION['ultima_attivita'] = time();
    
    return true;
}

// Esegui la verifica
verificaAutenticazione();
?>
