<?php
/*  be sure that the $dbconnect global variable is included as well*/


###############################################
#         ALL INSERT / POST  METHODS
#
################################################

/**
 * unsure that statistics table exist and Save data to the statistics table
 *
 * @param array $data from post
 * @return bool
 */
$userID = $_SESSION['uid'];

function insertStats($data) {
    global $dbconnect;
    global $userID;

    $sql = "INSERT INTO `statistics`(`uid`, `recommandation`, `project`, `experience`, `formations`) VALUES (:id,:recommandation,:project,:experience,:formations)";

    $stmt = $dbconnect->prepare($sql);

    return $stmt->execute([
      ':id' =>$userID,
      ':recommation' => $data['recommation'],
      ':project' => $data['project'],
      ':experience' => $data['experience'],
      ':formations' => $data['formations'],
 ]);
}


###############################################
#         ALL UPDATE METHODS
#
################################################


/**
 * Update  data in the statistics table
 *
 * @param int $id
 * @param array $data
 * @return bool
 */
function updateStats($id, $data) {
    global $dbconnect;

    $sql = "UPDATE `statistics` SET `recommandation`=':recommandation,`project`=:project,`experience`=:experience,`formations`=:formation WHERE  uid = :id";
    $stmt = $dbconnect->prepare($sql);

    return $stmt->execute([
      ':id' =>$id,
      ':recommation' => $data['recommation'],
      ':project' => $data['project'],
      ':experience' => $data['experience'],
      ':formations' => $data['formations'],
 ]);
}


###############################################
#         ALL DELETE METHODS
#
###############################################


/**
 * Delete a statistics in  table
 *
 * @param int $id
 * @return bool
 */
function deleteStats($id) {
    global $dbconnect;

    $sql = "DELETE FROM statistics WHERE uid = :id";
    $stmt = $dbconnect->prepare($sql);

    return $stmt->execute([':id' => $id]);
}


###############################################
#         ALL GET METHODS
#
################################################


/**
 * get all langues of user from  table
 *
 * @return array
 */
function getUserStats($id) {
    global $dbconnect;

    // Requête SQL pour récupérer les statistiques de l'utilisateur
    $sql = "
        SELECT
            COALESCE(SUM(t.recommandation), 0) AS total_recommandation,
            COALESCE(SUM(t.project), 0) AS total_project,
            COALESCE(SUM(t.experience), 0) AS total_experiences,
            COALESCE(SUM(t.formations), 0) AS total_formation
        FROM statistics t
        LEFT JOIN utilisateurs u ON u.uid = t.uid
        WHERE u.uid = :id
    ";

    try {
        // Préparation et exécution de la requête
        $stmt = $dbconnect->prepare($sql);
        $stmt->execute([':id' => $id]);

        // Récupération des résultats
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérification si des résultats ont été trouvés
        if ($result) {
            return $result;
        } else {
            // Retourne un tableau vide si aucun résultat
            return [
                'total_recommandation' => 0,
                'total_project' => 0,
                'total_experiences' => 0,
                'total_formation' => 0
            ];
        }
    } catch (PDOException $e) {
        error_log("Erreur lors de la récupération des statistiques de l'utilisateur : " . $e->getMessage());
        return null; // erreurs
    }
}
?>