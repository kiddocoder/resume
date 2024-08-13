<?php
/*  be sure that the $dbconnect global variable is included as well*/

###############################################
#         ALL INSERT / POST  METHODS
#
################################################

/**
 * unsure that identities table exist and Save data to the identities table
 *
 * @param array $data from post
 * @return bool
 */
function insertIdentity($data) {
    global $dbconnect;

    $sql = "INSERT INTO `identities`(`description`, `telephone`, `birthday`, `pays`, `grade`) VALUES (:id,:description,:telephone,:birthday,:pays,:grade)";

    $stmt = $dbconnect->prepare($sql);

    return $stmt->execute([
      ':description' => $data['description'],
      ':telephone' => $data['telephone'],
      ':birthday' => $data['birthday'],
      ':pays' => $data['pays'],
      ':grade' => $data['grade']
 ]);
}


###############################################
#         ALL UPDATE METHODS
#
################################################


/**
 * Update  data in the identities table
 *
 * @param int $id
 * @param array $data
 * @return bool
 */
function updateIdentity($id, $data) {
    global $dbconnect;

    $sql = "UPDATE identities SET `description` =:description,telephone =:telephone,birthday=:birthday,pays =:pays,grade =:grade WHERE uid = :id";
    $stmt = $dbconnect->prepare($sql);

    return $stmt->execute([
      ':id' =>$id,
      ':description' => $data['description'],
      ':telephone' => $data['phone'],
      ':birthday' => $data['birthday'],
      ':pays' => $data['pays'],
      ':grade' => $data['grade']
    ]);
}


###############################################
#         ALL DELETE METHODS
#
###############################################


/**
 * Delete a identities in  table
 *
 * @param int $id
 * @return bool
 */
function deleteIdentity($id) {
    global $dbconnect;

    $sql = "DELETE FROM identities WHERE uid = :id";
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
function getUserIdentity($id) {
    global $dbconnect;
    $data = [];

    $sql = "SELECT
      t.`uid`,t.`description`,
      `telephone`, `birthday`,
       `pays`, `grade`
    FROM identities t
    LEFT JOIN utilisateurs u ON u.uid = t.uid
    WHERE t.uid = :id";
    $stmt = $dbconnect->prepare($sql);
    $stmt->execute([':id'=>$id]);
    if($stmt->rowCount()>0){
      while($rows = $stmt->fetch(PDO::FETCH_ASSOC)){
        $data[] = $rows;
      }
    }

   return $data;
}

?>