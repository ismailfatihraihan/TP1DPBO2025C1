#include <iostream>
#include <bits/stdc++.h>

using namespace std;

class PetShop{
  private:
    // Atribut petshop
    // menggunakan list untuk bisa menyimpan banyak data dan mudah jika ingin menambahkan data baru
    list<int> id;
    list<string> name;
    list<string> category;
    list<int> price;

  public:

    // Constructor
    // saat objek di instansiasi, maka data akan langsung diisi oleh data default
    PetShop(){
      // Data default
      id.push_back(1);
      name.push_back("Kucing Persia");
      category.push_back("Hewan");
      price.push_back(98999);

      id.push_back(2);
      name.push_back("Penyu Madura");
      category.push_back("Hewan");
      price.push_back(215999);

      id.push_back(3);
      name.push_back("Katak Acumalaka");
      category.push_back("Hewan");
      price.push_back(14199);
    }

    // SETTER
    // setter untuk menambahkan data seluruh data baru ke list (tidak bisa set satu persatu attribute)
    void setPetShop(int id, string name, string category, int price){
      // Menambahkan data baru ke list menggunakan pushback untuk menambahkan di akhir list
      this->id.push_back(id);
      this->name.push_back(name);
      this->category.push_back(category);
      this->price.push_back(price);
    }

    // GETTER
    // getter ini akan mereturn seluruh data yang ada
    list<int> getId(){
      // Mengembalikan data id
      return this->id;
    }
    list<string> getName(){
      // Mengembalikan data name
      return this->name;
    }
    list<string> getCategory(){
      // Mengembalikan data category
      return this->category;
    }
    list<int> getPrice(){
      // Mengembalikan data price
      return this->price;
    }


    // Method
    // menampilkan data dalam bentuk tabel yang rapi
    // menggunakan library <iomanip> untuk mempermudah dalam membuat tabel
    void showPetShop() {
      // Inisialisasi iterator
      // digunakan untuk mengakses data dalam list produk
      auto id_it = id.begin();
      auto name_it = name.begin();
      auto category_it = category.begin();
      auto price_it = price.begin();

      // Header tabel
      cout << "\n🐾 Daftar Hewan di Pet Shop 🐾\n";
      cout << left  // Membuat teks rata kiri
             << setw(5) << "ID"        // Lebar kolom ID: 5 karakter
             << setw(20) << "Name"     // Lebar kolom Name: 20 karakter
             << setw(15) << "Category" // Lebar kolom Category: 15 karakter
             << setw(10) << "Price"    // Lebar kolom Price: 10 karakter
             << endl;

      // Garis pemisah antara header tabel dan baris data
      cout << string(50, '-') << endl;

      // Menampilkan data dalam bentuk tabel
      while (id_it != id.end()) {
        cout << left  // membuat teks rata kiri agar rapi
             << setw(5) << *id_it          // ID
             << setw(20) << *name_it       // Nama Hewan
             << setw(15) << *category_it   // Kategori Hewan
             << "Rp " << fixed << *price_it // Harga dengan format tetap
             << endl;

        // Menggeser iterator ke elemen berikutnya
        ++id_it;
        ++name_it;
        ++category_it;
        ++price_it;
      }
      cout << "\n";
  }

    // Mencari hewan berdasarkan nama dan menampilkan data lengkap jika ditemukan
    bool findName(string searchName) {
      // Inisialisasi iterator
      // digunakan untuk mengakses data dalam list produk
      auto id_it = id.begin();
      auto name_it = name.begin();
      auto category_it = category.begin();
      auto price_it = price.begin();

      cout << "\n🔍 Mencari '" << searchName << "'...\n";
      // algoritma yang dicari hanyalah looping sampai akhir
      // jika data ditemukan, maka akan menampilkan data lengkapnya
      while (name_it != name.end()) {
          if (*name_it == searchName) {
              // Menampilkan data lengkap dengan format tabel
              cout << "\n✅ Data ditemukan!\n";
              // header tabel
              cout << left << setw(5) << "ID"
                   << setw(20) << "Name"     
                   << setw(15) << "Category" 
                   << setw(10) << "Price" << endl; 
              cout << string(50, '-') << endl;
              // data yang ditemukan
              cout << left << setw(5) << *id_it
                   << setw(20) << *name_it
                   << setw(15) << *category_it
                   << "Rp " << fixed << *price_it << endl;
              return true;
          }
          // iterator untuk next elemen
          ++id_it;
          ++name_it;
          ++category_it;
          ++price_it;
      }
      // jika data tidak ditemukan, maka akan menampilkan pesan
      cout << "❌ Data tidak ditemukan.\n";
      return false;
    }

    // menghapus data berdasarkan nama yang akan dicari
    void deletePetShop(string name){
      // Inisialisasi iterator
      // digunakan untuk mengakses data dalam list produk
      auto id_it = this->id.begin();
      auto name_it = this->name.begin();
      auto category_it = this->category.begin();
      auto price_it = this->price.begin();

      cout << "\n🔍 Menghapus '" << name << "'...\n";
      // mencari dulu data nya, jika ditemukan maka hapus data tersebut
      while (name_it != this->name.end()) {
        if (*name_it == name) {
          // hapus menggunakan erase prosedur bawaan dari list
          id_it = this->id.erase(id_it);
          name_it = this->name.erase(name_it);
          category_it = this->category.erase(category_it);
          price_it = this->price.erase(price_it);
          cout << "\n✅ Data berhasil dihapus!\n";
          return;
        }
        // iterator untuk next elemen
        ++id_it;
        ++name_it;
        ++category_it;
        ++price_it;
      }
      // jika data tidak ditemukan, maka akan menampilkan pesan
      cout << "❌ Data tidak ditemukan.\n";
    }

    // mengupdate data berdasarkan nama yang akan dicari
    void updatePetShop(string name, string newName, string newCategory, int newPrice){
      // Inisialisasi iterator
      // digunakan untuk mengakses data dalam list produk
      auto name_it = this->name.begin();
      auto category_it = this->category.begin();
      auto price_it = this->price.begin();

      cout << "\n🔍 Mengupdate '" << name << "'...\n";
      // mencari dulu data nya, jika ditemukan maka update data tersebut
      while (name_it != this->name.end()) {
        if (*name_it == name) {
          // menimpa data lama dengan data baru
          *name_it = newName;
          *category_it = newCategory;
          *price_it = newPrice;
          cout << "\n✅ Data berhasil diupdate!\n";

          return;
        }
        // iterator untuk next elemen
        ++name_it;
        ++category_it;
        ++price_it;
      }
      // jika data tidak ditemukan, maka akan menampilkan pesan
      cout << "❌ Data tidak ditemukan.\n";
    }

    // destruct
    ~PetShop(){
    }
};