<?php

require_once '../_database.php';


// CREATE NEW ITEM
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "INSERT INTO item (title, quantity, fulfilled, list) VALUES(?, ?, ?, ?)";
    $params = [$_POST['title'], $_POST['quantity'], $_POST['fulfilled'], $_POST['list']];
    $stmt = $db->prepare($sql);
    $result = $stmt->execute($params);

    if ($result) {
        $id = $db->lastInsertId();
        $sql = "SELECT * FROM item where id = ?";
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
    return;
}


// UPDATE EXISTING ITEM

    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        parse_str(file_get_contents('php://input'), $_PUT);

        $id = $_PUT["id"];
        $title = $_PUT["title"];
        $quantity = $_PUT["quantity"];
        $fulfilled = $_PUT["fulfilled"];
        $list = $_PUT["list"];

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
        if (empty($fulfilled)) {
            $response = [
                'status' => 'FAILED',
                'message' => 'No fulfilled supplied for update'
            ];

            echo prepareResponse($response);
            return;
        }

        if (empty($quantity)) {
            $response = [
                'status' => 'FAILED',
                'message' => 'No quantity supplied for update'
            ];

            echo prepareResponse($response);
            return;
        }
        if (empty($list)) {
            $response = [
                'status' => 'FAILED',
                'message' => 'No list supplied for update'
            ];

            echo prepareResponse($response);
            return;
        }


        $sql = "UPDATE item SET title = ?, fulfilled = ?, quantity = ?, list = ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        $params = [$title, $fulfilled, $quantity, $list, $id];
        $result = $stmt->execute($params);


        if ($result) {
            $sql = "SELECT * FROM item WHERE id = ?";
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

// DELETE ITEM
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        parse_str(file_get_contents('php://input'), $_DELETE);


        $id = $_DELETE["id"];
        $sql = "DELETE FROM item WHERE  id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($id));
        $items = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if ($items) {
            $sql = 'SELECT * FROM list WHERE id =?';
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
                'message' => 'Failed to update record'
            ];
        }

        echo prepareResponse($response);
    }

// READ ITEMS
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $sql = "
      SELECT * FROM item
    ";
            $populatedLists = [];
            $stmt = $db->prepare($sql);
            $stmt->execute(array());
            $items = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($items as $key => $item) {
                $sql = "SELECT * FROM list WHERE id = ?";
                $stmt = $db->prepare($sql);
                $stmt->execute(array($item['id']));
                $item["items"] = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                array_push($populatedLists, $item);

            }

            echo prepareResponse($items);
        }


        function prepareResponse($data)
        {
            header('Content-Type: application/json');
            header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS');
            header('Access-Control-Allow-Headers: Content-Type, Accept');

            return json_encode($data);
        }

