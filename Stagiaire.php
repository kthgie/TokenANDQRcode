<?php

class Stagiaire{


    public string $nom;
    public string $prenom;
    public string $classe;
    public bool $present;


    public function __construct(string $nom, string $prenom, string $classe, bool $present){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->classe = $classe;
        $this->present = $present;

    }

    public function getPresent($token){
        if($token === true){
            $path = 'Cours/' .DIRECTORY_SEPARATOR . 'present.txt' . DIRECTORY_SEPARATOR .date("d/m/Y-H:i:s");
            file_put_contents($path, $token['payload'], FILE_APPEND); 
        
        }
    }
}