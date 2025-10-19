<?php

class USER {
    private $id;
    private $name;
    private $age;
    private $pastpurchase;

    
    public function toArray() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'age' => $this->age,
            'pastpurchase' => $this->pastpurchase
        ];
    }

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }
    public function getName() { return $this->name; }
    public function setName($name) { $this->name = trim($name); }
    public function getAge() { return $this->age; }
    public function setAge($age) { $this->age = trim($age); }
    public function getPastpurchase() { return $this->pastpurchase; }
    public function setPastpurchase($pastpurchase) { $this->pastpurchase = trim($pastpurchase); }


}

?>