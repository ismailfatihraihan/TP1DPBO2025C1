#import petshop
from PetShop import PetShop

# Instansiasi objek PetShop
petshop = PetShop()

# #1. Menambahkan data baru
petshop.set_pet_shop(4, "Hamster Detektif", "Hewan", 51999)
petshop.set_pet_shop(5, "Kelinci Anggora", "Hewan", 73999)

# #2. Menampilkan data yang tersedia
petshop.show_pet_shop()

# #3. Mencari data berdasarkan nama
petshop.find_name("Kucing")
petshop.find_name("Katak Acumalaka")

# #4. Mengubah data berdasarkan nama
petshop.update_pet_shop("Kelinci Anggora", "Arnab", "Hewan", 22500)

# #5. Menghapus data berdasarkan nama
petshop.delete_pet_shop("Hamster Detektif")

# Menampilkan data terakhir setelah diubah dan dihapus
petshop.show_pet_shop()
