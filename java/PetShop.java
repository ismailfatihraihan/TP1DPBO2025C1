import java.util.ArrayList; // Menggunakan ArrayList untuk menyimpan daftar hewan

// Kelas utama PetShop
public class PetShop {
    // Deklarasi ArrayList untuk menyimpan atribut hewan
    private ArrayList<Integer> id;       // Menyimpan ID hewan
    private ArrayList<String> name;      // Menyimpan nama hewan
    private ArrayList<String> category;  // Menyimpan kategori
    private ArrayList<Integer> price;    // Menyimpan harga hewan

    // Konstruktor (dijalankan saat objek dibuat)
    public PetShop() {
        // Inisialisasi list kosong
        id = new ArrayList<>();
        name = new ArrayList<>();
        category = new ArrayList<>();
        price = new ArrayList<>();

        // Menambahkan data hewan awal ke dalam list
        id.add(1);
        name.add("Kucing Persia");
        category.add("Hewan");
        price.add(98999);

        id.add(2);
        name.add("Penyu Madura");
        category.add("Hewan");
        price.add(215999);

        id.add(3);
        name.add("Katak Acumalaka");
        category.add("Hewan");
        price.add(14199);
    }

    // Metode untuk menambahkan hewan baru ke dalam daftar
    public void setPetShop(int id, String name, String category, int price) {
        this.id.add(id);
        this.name.add(name);
        this.category.add(category);
        this.price.add(price);
    }

    // Getter untuk mengambil daftar ID hewan
    public ArrayList<Integer> getId() {
        return id;
    }

    // Getter untuk mengambil daftar nama hewan
    public ArrayList<String> getName() {
        return name;
    }

    // Getter untuk mengambil daftar kategori hewan
    public ArrayList<String> getCategory() {
        return category;
    }

    // Getter untuk mengambil daftar harga hewan
    public ArrayList<Integer> getPrice() {
        return price;
    }

    // Metode untuk menampilkan daftar hewan dalam bentuk tabel yang rapi
    public void showPetShop() {
        System.out.println("\n            Daftar Hewan di Pet Shop ");
        System.out.println("--------------------------------------------------");
        // Header tabel
        System.out.printf("%-5s %-20s %-15s %-10s\n", "ID", "Name", "Category", "Price");
        System.out.println("--------------------------------------------------");

        // Loop untuk menampilkan semua hewan yang ada dalam daftar
        for (int i = 0; i < id.size(); i++) {
            System.out.printf("%-5d %-20s %-15s Rp %-10d\n", 
                id.get(i), name.get(i), category.get(i), price.get(i));
        }
        System.out.println(); // Menambahkan baris kosong agar tampilan lebih rapi
    }

    // Metode untuk mencari hewan berdasarkan nama
    public boolean findName(String searchName) {
        System.out.println("Mencari '" + searchName + "'...");

        // Loop untuk mencari nama dalam daftar
        for (int i = 0; i < name.size(); i++) {
            if (name.get(i).equals(searchName)) { // Jika nama ditemukan
                System.out.println("Data ditemukan!\n");
                System.out.printf("%-5s %-20s %-15s %-10s\n", "ID", "Name", "Category", "Price");
                System.out.println("--------------------------------------------------");
                System.out.printf("%-5d %-20s %-15s Rp %-10d\n", 
                    id.get(i), name.get(i), category.get(i), price.get(i));
                return true; // Mengembalikan true jika ditemukan
            }
        }
        System.out.println("Data tidak ditemukan.");
        return false; // Mengembalikan false jika tidak ditemukan
    }

    // Metode untuk menghapus hewan berdasarkan nama
    public void deletePetShop(String nameToDelete) {
        System.out.println("Menghapus '" + nameToDelete + "'...");
        for (int i = 0; i < name.size(); i++) {
            if (name.get(i).equals(nameToDelete)) { // Jika nama ditemukan
                id.remove(i);       // Hapus ID dari daftar
                name.remove(i);     // Hapus nama dari daftar
                category.remove(i); // Hapus kategori dari daftar
                price.remove(i);    // Hapus harga dari daftar
                System.out.println("Data berhasil dihapus!");
                return;
            }
        }
        System.out.println("Data tidak ditemukan."); // Jika tidak ditemukan
    }

    // Metode untuk memperbarui data hewan berdasarkan nama
    public void updatePetShop(String oldName, String newName, String newCategory, int newPrice) {
        System.out.println("Mengupdate '" + oldName + "'...");
        for (int i = 0; i < name.size(); i++) {
            if (name.get(i).equals(oldName)) { // Jika nama ditemukan
                name.set(i, newName);          // Update nama
                category.set(i, newCategory);  // Update kategori
                price.set(i, newPrice);        // Update harga
                System.out.println("Data berhasil diupdate!");
                return;
            }
        }
        System.out.println("Data tidak ditemukan."); // Jika tidak ditemukan
    }
}
