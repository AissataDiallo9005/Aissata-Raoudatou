<?php
class Provider {
    private $host = 'localhost';
    private $dbname = 'projet_php'; 
    private $username = 'root'; 
    private $password = ''; 

    private $con;

    public function getConnection() {
        try {
            // Création de la connexion avec PDO
            $this->con = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);

            // Définir le mode d'erreur de PDO pour les exceptions
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->con;

        } catch (PDOException $exception) {
            // Gestion des erreurs si la connexion échoue
            echo "Erreur de connexion à la base de données: " . $exception->getMessage();
            return NULL;
        }
    }
}
?>
