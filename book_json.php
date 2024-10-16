<?php header('Content-Type: application/json'); 
 
// Data dummy 
$books = [ 
    [ 
        "id" => 1, 
        "title" => "Laskar Pelangi", 
        "author" => "Andrea Hirata",
        "year" => 2008

    ], 
    [ 
        "id" => 2, 
        "title" => "Laut Bercerita", 
        "author" => "Leila S.Chudori", 
        "year" => 2020
        
    ] 
]; 
 
$method = $_SERVER['REQUEST_METHOD']; 

switch ($method) { 
    case 'GET':  
        echo json_encode($books); 
        break; 
 
    case 'POST': 
        // Mendapatkan data dari body request 
        $input = json_decode(file_get_contents('php://input'), true); 
        $input ['id'] = end(($books)) ['id'] + 1;
        $books [] =$input;

        $newBook = $xml->addChild('book');
        $newBook->addChild('id', (int)$input['id']);
        $newBook->addChild('title', $input['title']);
        $newBook->addChild('author', $input['author']);
        $newBook->addChild('year', (int)$input['year']);

        echo $xml->asXML();
        break; 
 
    default: 
        // Metode HTTP tidak didukung 
        http_response_code(405); 
        echo json_encode(["message" => "Metode HTTP tidak didukung"]); 
        break; 
} 
?> 