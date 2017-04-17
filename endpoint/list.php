<?php

require_once '../_database.php';


// CREATE NEW LIST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "INSERT INTO list (title) VALUES(?)";
    $params = [$_POST['title']];
    $stmt = $db->prepare($sql);
    $result = $stmt->execute($params);

    if ($result) {
        $id = $db->lastInsertId();
        $sql = "SELECT * FROM list where id = ?";
        $stmt = $db->prepare($sql);
        $result = $stmt->execute([$id]);
        $newRecord = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $response = [
            'status' => 'OK',
            'records' => $newRecord
        ];
    } else {
        $response = [
            'status' => 'FAILED',
            'message' => 'Failed to insert new record'
        ];
    }

    echo prepareResponse($response);

}
// UPDATE EXISTING LIST
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents('php://input'), $_PUT);

    $id = $_PUT["id"];
    $title = $_PUT["title"];

    if (empty($id)) {
        $response = [
            'status' => 'FAILED',
            'message' => 'No id supplied for update'
        ];

        echo prepareResponse($response);
        return;
    }

    if (empty($title)) {
        $response = [
            'status' => 'FAILED',
            'message' => 'No title supplied for update'
        ];


        echo prepareResponse($response);
        return;
    }

    $sql = "UPDATE list SET title = ?, updated_at = ? WHERE id = ?";
    $stmt = $db->prepare($sql);
    $params = [$title, date('Y-m-d H:i:s'), $id];
    $result = $stmt->execute($params);

    if ($result) {
        $sql = "SELECT * FROM list WHERE id = ?";
        $stmt = $db->prepare($sql);
        $result = $stmt->execute([$id]);
        $updatedRecord = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $response = [
            'status' => 'OK',
            'records' => $updatedRecord
        ];
    } else {
        $response = [
            'status' => 'FAILED',
            'message' => 'Failed to update record'
        ];
    }

    echo prepareResponse($response);
}
// DELETE LIST
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents('php://input'), $_DELETE);

    $id = $_DELETE["id"];

    $sql = "DELETE FROM list WHERE  id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute(array($id));
    $lists = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    if($lists){
        $sql = 'SELECT * FROM item WHERE id =?';
        $stmt = $db->prepare($sql);
        $result = $stmt->execute([$id]);
        $updatedRecord = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $response = [
            'status' => 'OK',
            'message' => $updatedRecord

        ];
    } else {
        $response = [
            'status' => 'FAILED',
            'message'=> 'Failed to update record'
        ];
    }

    echo prepareResponse($response);

    // insert validation

}

// READ LIST
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "
      SELECT * FROM list
    ";
    $populatedLists = [];
    $stmt = $db->prepare($sql);
    $stmt->execute(array());
    $lists = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    foreach ($lists as $key => $list) {
        $sql = "SELECT * FROM item WHERE list = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($list['id']));
        $list["items"] = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        array_push($populatedLists, $list);

    }

    echo prepareResponse($populatedLists);
}


function prepareResponse($data) {
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Accept');

    return json_encode($data);
}