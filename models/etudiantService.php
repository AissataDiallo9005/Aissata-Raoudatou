<?php
require_once('Provider.php');

class etudiantService {
    private $con;

    public function __construct() {
        // Crée une instance de la classe Provider pour obtenir la connexion à la base de données
        $provider = new Provider();
        $this->con = $provider->getConnection();
    }

    public function add($matricule, $nom, $prenom, $sexe, $tel, $email, $date_naiss) {
        // Insérer un étudiant dans la base de données
        try {
            $requete = "INSERT INTO etudiants (matricule, nom, prenom, sexe, tel, email, date_naiss) 
                        VALUES (:mat, :nm, :pr, :sexe, :tel, :email, :ddn)";
            $stmt = $this->con->prepare($requete);
            $stmt->execute([
                ':mat' => $matricule,
                ':nm' => $nom,
                ':pr' => $prenom,
                ':sexe' => $sexe,
                ':tel' => $tel,
                ':email' => $email,
                ':ddn' => $date_naiss
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout de l'étudiant: " . $e->getMessage();
            return false;
        }
    }

    public function getByMatricule($matricule) {
        $requete = "SELECT * FROM etudiants WHERE matricule = :matricule";
        $stmt = $this->con->prepare($requete);
        $stmt->execute(['matricule' => $matricule]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateEtudiant($matricule, $nom, $prenom, $sexe, $tel, $email, $date_naiss) {
        $requete = "UPDATE etudiants SET nom = :nom, prenom = :prenom, sexe = :sexe, tel = :tel, email = :email, date_naiss = :date_naiss 
                    WHERE matricule = :matricule";
        $stmt = $this->con->prepare($requete);
        $stmt->execute([
            'matricule' => $matricule,
            'nom' => $nom,
            'prenom' => $prenom,
            'sexe' => $sexe,
            'tel' => $tel,
            'email' => $email,
            'date_naiss' => $date_naiss
        ]);
        return true;
    }

    public function deleteEtudiant($matricule) {
        $requete = "DELETE FROM etudiants WHERE matricule = :matricule";
        $stmt = $this->con->prepare($requete);
        $stmt->execute(['matricule' => $matricule]);
        return true;
    }
    
    public function getAllEtudiants() {
        // Récupérer tous les étudiants de la base de données
        try {
            $requete = "SELECT * FROM etudiants ORDER BY matricule DESC";
            $stmt = $this->con->prepare($requete);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des étudiants: " . $e->getMessage();
            return [];
        }
    }
    public function addEnseignants($nom, $prenom, $tel, $email, $matiere) {
        // Insérer un étudiant dans la base de données
        try {
            $requete = "INSERT INTO enseignants ( nom, prenom,  tel, email, matiere) 
                        VALUES (:nm, :pr, :tel, :email, :mat)";
            $stmt = $this->con->prepare($requete);
            $stmt->execute([
                ':nm' => $nom,
                ':pr' => $prenom,
                ':tel' => $tel,
                ':email' => $email,
                ':mat' => $matiere
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout de l'enseignant " . $e->getMessage();
            return false;
        }
    }
    public function getById($id) {
        
        $requete = "SELECT * FROM enseignants WHERE id = :id";
        $stmt = $this->con->prepare($requete);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateEnseignants( $id,$nom, $prenom, $tel, $email, $matiere) {
        $requete = "UPDATE enseignants SET nom = :nom, prenom = :prenom, tel = :tel, email = :email, matiere = :matiere 
                    WHERE id = :id";
        $stmt = $this->con->prepare($requete);
        $stmt->execute([
            'id' => $id,
            'nom' => $nom,
            'prenom' => $prenom,
            'tel' => $tel,
            'email' => $email,
            'matiere' => $matiere
        ]);
        return true;
    }
    public function deleteEnseignant($id) {
        $requete = "DELETE FROM enseignants WHERE id = :id";
        $stmt = $this->con->prepare($requete);
        $stmt->execute(['id' => $id]);
        return true;
    }
    
    public function getAllEnseignants() {
        // Récupérer tous les enseigants de la base de données
        try {
            $requete = "SELECT * FROM enseignants ORDER BY id DESC";
            $stmt = $this->con->prepare($requete);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des enseignants: " . $e->getMessage();
            return [];
        }
    }
    public function addSalle( $num, $nbre) {
        // Insérer un étudiant dans la base de données
        try {
            $requete = "INSERT INTO salles ( num, nbre) VALUES (:num, :nbre)";
            $stmt = $this->con->prepare($requete);
            $stmt->execute([
                ':num' => $num,
                ':nbre' => $nbre
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout de la salle " . $e->getMessage();
            return false;
        }

}

public function getByIdSalle($idSalle) {
        
    $requete = "SELECT * FROM salles WHERE idSalle = :idSalle";
    $stmt = $this->con->prepare($requete);
    $stmt->execute(['idSalle' => $idSalle]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function updateSalle($idSalle ,$num, $nbre) {
    $requete = "UPDATE salles SET num = :num, nbre = :nbre WHERE idSalle = :idSalle";
    $stmt = $this->con->prepare($requete);
    $stmt->execute([
        'idSalle' => intval($idSalle),
        'num' => (int)$num,
        'nbre' => (int)$nbre
    ]);
    return true;
}

public function deleteSalle($idSalle) {
    $requete = "DELETE FROM salles WHERE idSalle = :idSalle";
    $stmt = $this->con->prepare($requete);
    $stmt->execute(['idSalle' => $idSalle]);
    return $stmt->rowCount() > 0;    
}

public function getAllSalle() {
    // Récupérer tous les enseigants de la base de données
    try {
        $requete = "SELECT * FROM salles ORDER BY idSalle DESC";
        $stmt = $this->con->prepare($requete);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des enseignants: " . $e->getMessage();
        return [];
    }
}

public function addCours($matricule, $id, $idSalle) {
    $requete = "INSERT INTO cours (matricule, id, idSalle) VALUES (:matricule, :id, :idSalle)";
    $stmt = $this->con->prepare($requete);
    $stmt->execute([
        ':matricule' => $matricule,
        ':id' => $id,
        ':idSalle' => $idSalle
    ]);
    return true;
}

public function getByIdCours($idCours) {
        
    $requete = "SELECT * FROM cours WHERE idCours = :idCours";
    $stmt = $this->con->prepare($requete);
    $stmt->execute(['idCours' => $idCours]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function updateCours($idCours, $matricule, $id, $idSalle) {
    $requete = "UPDATE cours SET matricule = :matricule, id = :id, idSalle = :idSalle WHERE idCours = :idCours";
    $stmt = $this->con->prepare($requete);
    $stmt->execute([
        ':matricule' => $matricule,
        ':id' => $id,
        ':idSalle' => $idSalle,
        ':idCours' => $idCours
    ]);
    return true;
}

public function deleteCours($idCours) {
    $requete = "DELETE FROM cours WHERE idCours = :idCours";
    $stmt = $this->con->prepare($requete);
    $stmt->bindParam(':idCours', $idCours, PDO::PARAM_INT);
    return $stmt->execute();
}


public function getAllCours() {
    $requete = "SELECT cours.idCours, etudiants.nom AS Nom, enseignants.nom AS Num, salles.num AS Numero
                FROM cours
                JOIN etudiants ON cours.matricule = etudiants.matricule
                JOIN enseignants ON cours.id = enseignants.id
                JOIN salles ON cours.idSalle = salles.idSalle";
    $stmt = $this->con->query($requete);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}

?>
