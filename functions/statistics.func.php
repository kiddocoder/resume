<?php
/*  be sure that the $db global variable is included as well*/

/**
  * @return object
*/
function get_user(){
    global $db;
    $req = $db->query("
        SELECT  *
        FROM utilisateurs
        WHERE email ='{$_SESSION['user']}'
    ");

    $result = $req->fetchObject();
    return $result;
}


// userID from session

$userdata = get_user();
$userID = $userdata->uid;


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
function insertStats($data) {
    global $db;
    global $userID;

    $sql = "INSERT INTO `statistics`(`uid`, `recommandation`, `project`, `experience`, `formations`) VALUES (:id,:recommandation,:project,:experience,:formations)";

    $stmt = $db->prepare($sql);

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
    global $db;

    $sql = "UPDATE `statistics` SET `recommandation`=':recommandation,`project`=:project,`experience`=:experience,`formations`=:formation WHERE  uid = :id";
    $stmt = $db->prepare($sql);

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
    global $db;

    $sql = "DELETE FROM statistics WHERE uid = :id";
    $stmt = $db->prepare($sql);

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
    global $db;

    $sql = "SELECT *
    FROM statistics t
    LEFT JOIN utilisateurs u ON u.uid = t.uid
    WHERE t.uid = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute([':id'=>$id]);
   return $stmt->fetch(PDO::FETCH_ASSOC);
}

?>