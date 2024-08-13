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
 * unsure that educations table exist and Save data to the educations table
 *
 * @param array $data from post
 * @return bool
 */
function insertEducation($data) {
    global $db;
    global $userID;

    $sql = "INSERT INTO `educations`(`uid`, `etablissement`, `diplome`, `date_debut`, `date_fin`, `description`) VALUES (:id,:etablissement,:diplome,:date_debut,:date_fin,:description)";

    $stmt = $db->prepare($sql);

    return $stmt->execute([
      ':id' =>$userID,
      ':recommation' => $data['recommation'],
      ':diplome' => $data['diplome'],
      ':date_debut' => $data['date_debut'],
      ':date_fin' => $data['date_fin'],
      ':description' =>$data['description']
 ]);
}


###############################################
#         ALL UPDATE METHODS
#
################################################


/**
 * Update  data in the educations table
 *
 * @param int $id
 * @param array $data
 * @return bool
 */
function updateEducation($id, $data) {
    global $db;

    $sql = "UPDATE `educations` SET `etablissement`=':etablissement,`diplome`=:diplome,`date_debut`=:date_debut,`date_fin`=:date_fin WHERE  uid = :id";
    $stmt = $db->prepare($sql);

    return $stmt->execute([
      ':id' =>$id,
      ':etablissement' => $data['etablissement'],
      ':diplome' => $data['diplome'],
      ':date_debut' => $data['date_debut'],
      ':date_fin' => $data['date_fin'],
      ':description' => $data['description'],
 ]);
}


###############################################
#         ALL DELETE METHODS
#
###############################################


/**
 * Delete a educations in  table
 *
 * @param int $id
 * @return bool
 */
function deleteEducation($id) {
    global $db;

    $sql = "DELETE FROM educations WHERE uid = :id";
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
function getUserEducation($id) {
    global $db;

    $sql = "SELECT *
    FROM educations t
    LEFT JOIN utilisateurs u ON u.uid = t.uid
    WHERE t.uid = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute([':id'=>$id]);
   return $stmt->fetch(PDO::FETCH_ASSOC);
}

?>