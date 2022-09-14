<?php



class Gite {
    private $_id_logement;
    private $_ville ;
    private $_departement ;
    private $_adresse;
    private $_description;
    private $_disponibilite;
    private $_nb_couchage;
    private $_nb_pieces;
    private $_prix; 
    private $_type_logement; 
    private $_nom_logement; 
    private $_img; 
    
     
 
 
    public function __construct(array $datas){
        if(isset($datas)){
  
        $this->hydrate($datas);
        }
    }
       
        private function hydrate(array $datas){
        foreach($datas as $key => $value){
        $method = 'set' . ucfirst($key);
       
        if (method_exists($this, $method)){
        $this->$method($value);
        }
        }
   

}
    
public function getId_logement(){
    return $this->_id_logement;
}
public function setId_logement($id_logement){
    $this->_id_logement = $id_logement;
}

public function getVille(){
    return $this->_ville;
}
public function setVille($ville){
    $this->_ville = $ville;
}
public function getDepartement(){
    return $this->_departement;
}
public function setDepartement($departement){
    $this->_departement = $departement;
}
public function getAdresse(){
    return $this->_adresse;
}
public function setAdresse($adresse){
    $this->_adresse = $adresse;
}
public function getDescription(){
    return $this->_description;
}
public function setDescription($description){
    $this->_description = $description;
}
public function getDisponibilite(){
    return $this->_disponibilite;
}
public function setDisponibilite($disponibilite){
    $this->_disponibilite = $disponibilite;
}
public function getNb_couchage(){
    return $this->_nb_couchage;
}
public function setNb_couchage($nb_couchage){
    $this->_nb_couchage = $nb_couchage;
}
public function getNb_pieces(){
    return $this->_nb_pieces;
}
public function setNb_pieces($nb_pieces){
    $this->_nb_pieces = $nb_pieces;
}
public function getPrix(){
    return $this->_prix;
}
public function setPrix($prix){
    $this->_prix = $prix;
}
public function getType_logement(){
    return $this->_type_logement;
}
public function setType_logement($type_logement){
    $this->_type_logement = $type_logement;
}
public function getNom_logement(){
    return $this->_nom_logement;
}
public function setNom_logement($nom_logement){
    $this->_nom_logement = $nom_logement;
}
public function getImg(){
    return $this->_img;
}
public function setImg($img){
    $this->_img = $img;
}



}










