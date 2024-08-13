<?php
/*  be sure that the $db global variable is included as well*/


###############################################
#         ALL INSERT / POST  METHODS
#
################################################

/**
 * unsure that langues table exist and Save data to the langues table
 *
 * @param array $data from post
 * @return bool
 */
function insertLanguage($data) {
    global $db;

    $sql = "INSERT INTO `langues` (`langue`) VALUES (:language)";

    $stmt = $db->prepare($sql);

    return $stmt->execute([':language' => $data['language']]);
}


/**
 * unsure that utilisateur_langue table exist and Save data to the utilisateur_langue table
 *
 * @param array $data from post
 * @return bool
 */
$userID = $_SESSION['uid'];
function giveUserlang($data) {
    global $db;
    global $userID;

    $sql = "INSERT INTO `utilisateur_langue` (`uid`,`lid`,`niveau`) VALUES (:id,:language,:niveau)";

    $stmt = $db->prepare($sql);

    return $stmt->execute([
        ':id' => $userID,
        ':language' => $data['language'],
        'niveau' => $data['niveau'],
    ]);
}



###############################################
#         ALL UPDATE METHODS
#
################################################


/**
 * Update  data in the langues table
 *
 * @param int $id
 * @param array $data
 * @return bool
 */
function updateLanguage($id, $data) {
    global $db;

    $sql = "UPDATE langues SET `langue` =:language WHERE lid = :id";
    $stmt = $db->prepare($sql);

    return $stmt->execute([
        ':language' => $data['language'],
        ':id' => $id
    ]);
}


###############################################
#         ALL DELETE METHODS
#
###############################################


/**
 * Delete a language in  table
 *
 * @param int $id
 * @return bool
 */
function deleteLanguage($id) {
    global $db;

    $sql = "DELETE FROM langues WHERE lid = :id";
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
function getUserLanguage($id) {
    global $db;

    $sql = "SELECT * FROM utilisateurs u
     INNER JOIN utilisateur_langue ul ON ul.`uid` = l.`uid`
     INNER JOIN langues l ON l.`lid` = ul.`lid`
     WHERE ul.`uid` = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute([':id'=>$id]);
   return $stmt->fetch(PDO::FETCH_ASSOC);
}


/**
 * get all langues table records
 *
 * @return array
 */
function getAllLanguages() {
    global $db;

    $sql = "SELECT * FROM langues";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

?>