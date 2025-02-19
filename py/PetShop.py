class PetShop:
    def __init__(self):
        """
        Constructor class PetShop.
        Ini bakal jalan pas pertama kali kita bikin objek dari class ini.
        Di sini kita inisialisasi list kosong buat nyimpen data hewan.
        """
        # List buat nyimpen ID hewan
        self.id = []
        # List buat nyimpen nama hewan
        self.name = []
        # List buat nyimpen kategori hewan
        self.category = []
        # List buat nyimpen harga hewan
        self.price = []

        """
        Data default biar gak kosong pas pertama kali dibuka.
        Kita tambahin beberapa hewan langsung di sini.
        """
        self.id.append(1)  # ID hewan pertama
        self.name.append("Kucing Persia")  # Nama hewan pertama
        self.category.append("Hewan")  # Kategori hewan pertama
        self.price.append(98999)  # Harga hewan pertama

        self.id.append(2)  # ID hewan kedua
        self.name.append("Penyu Madura")  # Nama hewan kedua
        self.category.append("Hewan")  # Kategori hewan kedua
        self.price.append(215999)  # Harga hewan kedua

        self.id.append(3)  # ID hewan ketiga
        self.name.append("Katak Acumalaka")  # Nama hewan ketiga
        self.category.append("Hewan")  # Kategori hewan ketiga
        self.price.append(14199)  # Harga hewan ketiga

    # SETTER: Buat nambahin data hewan baru
    def set_pet_shop(self, id, name, category, price):
        """
        Method buat nambahin data hewan baru ke dalam list.
        Parameter:
        - id: ID hewan (integer)
        - name: Nama hewan (string)
        - category: Kategori hewan (string)
        - price: Harga hewan (integer)
        """
        self.id.append(id)  # Tambahin ID ke list
        self.name.append(name)  # Tambahin nama ke list
        self.category.append(category)  # Tambahin kategori ke list
        self.price.append(price)  # Tambahin harga ke list

    # GETTER: Buat ngambil data atribut class
    def get_id(self):
        return self.id

    def get_name(self):
        return self.name

    def get_category(self):
        return self.category

    def get_price(self):
        return self.price

    # Method buat nampilin data dalam bentuk tabel yang rapi
    def show_pet_shop(self):
        """
        Method buat nampilin semua data hewan dalam bentuk tabel.
        Bakal nampilin ID, Nama, Kategori, dan Harga.
        """
        print("\n           🐾 Daftar Hewan di Pet Shop 🐾")
        print("-" * 50)  # Garis pemisah buat header tabel
        # Header tabel
        print("{:<5} {:<20} {:<15} {:<10}".format("ID", "Name", "Category", "Price"))
        print("-" * 50)  # Garis pemisah buat data

        # Loop buat nampilin semua data hewan
        for i in range(len(self.id)):
            # Tampilin data per baris
            print("{:<5} {:<20} {:<15} Rp {:<10}".format(
                self.id[i],  # ID hewan
                self.name[i],  # Nama hewan
                self.category[i],  # Kategori hewan
                self.price[i]  # Harga hewan
            ))
        print("\n")  # Spasi biar rapi

    # Method buat nyari hewan berdasarkan nama
    def find_name(self, search_name):
        """
        Method buat nyari hewan berdasarkan nama.
        Parameter:
        - search_name: Nama hewan yang mau dicari (string).
        """
        print(f"\n🔍 Mencari '{search_name}'...")
        # Loop buat cek semua nama hewan
        for i in range(len(self.name)):
            if self.name[i] == search_name:
                # Kalo ketemu, tampilin datanya
                print("\n✅ Data ditemukan!")
                print("{:<5} {:<20} {:<15} {:<10}".format("ID", "Name", "Category", "Price"))
                print("-" * 50)
                print("{:<5} {:<20} {:<15} Rp {:<10}".format(
                    self.id[i],  # ID hewan
                    self.name[i],  # Nama hewan
                    self.category[i],  # Kategori hewan
                    self.price[i]  # Harga hewan
                ))
                return True  # Kembaliin True kalo ketemu
        # Kalo gak ketemu, tampilin pesan
        print("❌ Data tidak ditemukan.")
        return False  # Kembaliin False kalo gak ketemu

    # Method buat hapus data berdasarkan nama
    def delete_pet_shop(self, name):
        """
        Method buat hapus data hewan berdasarkan nama.
        Parameter:
        - name: Nama hewan yang mau dihapus (string).
        """
        print(f"\n🔍 Menghapus '{name}'...")
        # Loop buat cari hewan yang mau dihapus
        for i in range(len(self.name)):
            if self.name[i] == name:
                # Kalo ketemu, hapus data dari semua list
                del self.id[i]
                del self.name[i]
                del self.category[i]
                del self.price[i]
                print("\n✅ Data berhasil dihapus!")
                return  # Keluar dari method
        # Kalo gak ketemu, tampilin pesan
        print("❌ Data tidak ditemukan.")

    # Method buat update data berdasarkan nama
    def update_pet_shop(self, name, new_name, new_category, new_price):
        """
        Method buat update data hewan berdasarkan nama.
        Parameter:
        - name: Nama hewan yang mau diupdate (string).
        - new_name: Nama baru hewan (string).
        - new_category: Kategori baru hewan (string).
        - new_price: Harga baru hewan (integer).
        """
        print(f"\n🔍 Mengupdate '{name}'...")
        # Loop buat cari hewan yang mau diupdate
        for i in range(len(self.name)):
            if self.name[i] == name:
                # Kalo ketemu, update datanya
                self.name[i] = new_name
                self.category[i] = new_category
                self.price[i] = new_price
                print("\n✅ Data berhasil diupdate!")
                return  # Keluar dari method
        # Kalo gak ketemu, tampilin pesan
        print("❌ Data tidak ditemukan.")