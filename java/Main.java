public class Main {
  public static void main(String[] args) {
      // Instansiasi objek PetShop
      PetShop petshop = new PetShop();

      // #1. Menambahkan data baru
      petshop.setPetShop(4, "Hamster Detektif", "Hewan", 51999);
      petshop.setPetShop(5, "Kelinci Anggora", "Hewan", 73999);

      // #2. Menampilkan data yang tersedia
      petshop.showPetShop();
      System.out.println("\n===============================================");
      
      // #3. Mencari data berdasarkan nama
      petshop.findName("Kucing");
      System.out.println("\n===============================================");
      petshop.findName("Katak Acumalaka");
      System.out.println("\n===============================================");
      
      // #4. Mengubah data berdasarkan nama
      petshop.updatePetShop("Kelinci Anggora", "Arnab", "Hewan", 22500);
      System.out.println("\n===============================================");
      
      // #5. Menghapus data berdasarkan nama
      petshop.deletePetShop("Hamster Detektif");
      System.out.println("\n===============================================");

      // Menampilkan data terakhir setelah diubah dan dihapus
      petshop.showPetShop();
  }
}