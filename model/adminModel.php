<?php
//fonction pour mettre à jour un instrument dans la DB
function updateInstrument(PDO $db, $nom, string $resume, string $description, string $son, string $url, $id){
    $retour = $db->prepare('UPDATE instruments SET nom = ?, resume = ?, description = ?, son = ?, url = ? WHERE id = ?');
    var_dump($retour);
    try{
        $retour->execute([$nom, $resume, $description, $son, $url, $id]);
    }catch(Exception $e){
        die($e->getMessage());
    }
    return $retour->rowCount();
}

//fonction pour supprimer un instrument dans la DB
function deleteInstrument(PDO $db, $id){
    $retour = $db->prepare('DELETE FROM instruments WHERE id = ?');
    try{
        $retour->execute([$id]);
    }catch(Exception $e){
        die($e->getMessage());
    }
    return $retour->rowCount();
}

//fonction pour ajouter un instrument dans la DB
function addInstrument(PDO $db, $nom, string $resume, string $description, string $son, string $url, $id){
    $retour = $db->prepare('INSERT INTO instruments (nom, resume, description, son, url, categorie_id) VALUES (?, ?, ?, ?, ?, ?)');
    try{
        $retour->execute([$nom, $resume, $description, $son, $url, $id]);
    }catch(Exception $e){
        die($e->getMessage());
    }
    return $retour->rowCount();
}
