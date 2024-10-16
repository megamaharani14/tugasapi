<?php header('Content-Type: application/xml'); 
    $xml = new SimpleXMLElement('<book/>'); 
    $book1 = $xml->addChild('book'); 
    $book1->addChild('id', 1); 
    $book1->addChild('title', 'Laskar Pelangi'); 
    $book1->addChild('author', 'Andrea Hirata');
    $book1->addChild('year', 2008);

    $book2 = $xml->addChild('book'); 
    $book2->addChild('id', 2); 
    $book2->addChild('title', 'Laut Bercerita'); 
    $book2->addChild('author', 'Leila S.Chudori');
    $book2->addChild('year', 2020);
    
    echo $xml->asXML(); 
?>