<?php

class PetShop {
    private $id;
    private $name;
    private $category;
    private $price;
    private $image;

    public function __construct() {
        if (!isset($_SESSION['petshop'])) {
            $_SESSION['petshop'] = [
                'id' => [1, 2, 3],
                'name' => ["Kucing Persia", "Penyu Madura", "Katak Acumalaka"],
                'category' => ["Hewan", "Hewan", "Hewan"],
                'price' => [98999, 215999, 14199],
                'image' => [
                    "https://images.unsplash.com/photo-1592194996308-7b43878e84a6?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cGV0fGVufDB8MXwwfHx8Mg%3D%3D",
                    "https://images.unsplash.com/photo-1572713629470-3e9f5d4fdf4c?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8dHVydGxlfGVufDB8MXwwfHx8Mg%3D%3D",
                    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-VY-oM0QlIH4q8o_7Mg7walaraX9h4skiwg&s"
                ]
            ];
        }

        $this->id = &$_SESSION['petshop']['id'];
        $this->name = &$_SESSION['petshop']['name'];
        $this->category = &$_SESSION['petshop']['category'];
        $this->price = &$_SESSION['petshop']['price'];
        $this->image = &$_SESSION['petshop']['image'];
    }

    public function addPet($name, $category, $price, $image) {
        $new_id = empty($this->id) ? 1 : max($this->id) + 1;
        $this->id[] = $new_id;
        $this->name[] = htmlspecialchars($name);
        $this->category[] = htmlspecialchars($category);
        $this->price[] = (float)$price;
        $this->image[] = htmlspecialchars($image);
        return $new_id;
    }

    public function deletePet($id) {
        foreach ($this->id as $index => $petId) {
            if ($petId == $id) {
                array_splice($this->id, $index, 1);
                array_splice($this->name, $index, 1);
                array_splice($this->category, $index, 1);
                array_splice($this->price, $index, 1);
                array_splice($this->image, $index, 1);
                return true;
            }
        }
        return false;
    }

    public function updatePet($id, $new_name, $new_category, $new_price, $new_image) {
        foreach ($this->id as $index => $petId) {
            if ($petId == $id) {
                $this->name[$index] = htmlspecialchars($new_name);
                $this->category[$index] = htmlspecialchars($new_category);
                $this->price[$index] = (float)$new_price;
                $this->image[$index] = htmlspecialchars($new_image);
                return true;
            }
        }
        return false;
    }

    public function findByName($name) {
        foreach ($this->name as $index => $petName) {
            if (strtolower($petName) === strtolower($name)) {
                return $this->getPetData($index);
            }
        }
        return null;
    }

    public function getPetById($id) {
        foreach ($this->id as $index => $petId) {
            if ($petId == $id) {
                return $this->getPetData($index);
            }
        }
        return null;
    }

    public function getAllPets() {
        $pets = [];
        foreach ($this->id as $index => $id) {
            $pets[] = $this->getPetData($index);
        }
        return $pets;
    }

    private function getPetData($index) {
        return [
            'id' => $this->id[$index],
            'name' => $this->name[$index],
            'category' => $this->category[$index],
            'price' => $this->price[$index],
            'image' => $this->image[$index]
        ];
    }
}
?>