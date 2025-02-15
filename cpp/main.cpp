#include "PetShop.cpp"

int main(){
  
  // instansiasi
  PetShop petshop;

  // #1. Menambahkan data baru
  petshop.setPetShop(4, "Hamster Detektif", "Hewan", 51999);
  petshop.setPetShop(5, "Kelinci Anggora", "Hewan", 73999);

  // #2. Menampilkan data yang tersedia
  petshop.showPetShop();

  // #3. Mencari data berdasarkan nama
  petshop.findName("Kucing");
  petshop.findName("Katak Acumalaka");

  // #4. Mengubah data berdasarkan nama
  petshop.updatePetShop("Kelinci Anggora", "Arnab", "Hewan", 22500);

  // #5. Menghapus data berdasarkan nama
  petshop.deletePetShop("Hamster Detektif");
  
  petshop.showPetShop();


  return 0;
}