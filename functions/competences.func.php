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
 * unsure that competances table exist and Save data to the competances table
 *
 * @param array $data from post
 * @return bool
 */
function insertComp($data) {
    global $db;
    global $userID;

    $sql = "INSERT INTO `competances`( `uid`, `competence`, `niveau`) VALUES (:id,:competence,:niveau,:experience,:formations)";

    $stmt = $db->prepare($sql);

    return $stmt->execute([
      ':id' =>$userID,
      ':recommation' => $data['recommation'],
      ':niveau' => $data['niveau']
 ]);
}


###############################################
#         ALL UPDATE METHODS
#
################################################


/**
 * Update  data in the competances table
 *
 * @param int $id
 * @param array $data
 * @return bool
 */
function updateComp($id, $data) {
    global $db;

    $sql = "UPDATE `competances` SET `competence`=':competence,`niveau`=:niveau,`experience`=:experience WHERE  uid = :id";
    $stmt = $db->prepare($sql);

    return $stmt->execute([
      ':id' =>$id,
      ':recommation' => $data['recommation'],
      ':niveau' => $data['niveau'],
      ':experience' => $data['experience']
 ]);
}


###############################################
#         ALL DELETE METHODS
#
###############################################


/**
 * Delete a competances in  table
 *
 * @param int $id
 * @return bool
 */
function deleteComp($id) {
    global $db;

    $sql = "DELETE FROM competances WHERE uid = :id";
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
function getUserComp($id) {
    global $db;

    $sql = "SELECT *
    FROM competances t
    LEFT JOIN utilisateurs u ON u.uid = t.uid
    WHERE t.uid = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute([':id'=>$id]);
   return $stmt->fetch(PDO::FETCH_ASSOC);
}

?>