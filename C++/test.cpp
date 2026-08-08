#include <iostream>
#include <iomanip>
#include <string>
#include <limits>
 
using namespace std;
 
const int MAX_DATA = 100; // kapasitas maksimum data mahasiswa
 
struct Mahasiswa {
    int nim;
    int nilai;
};
 
Mahasiswa mhs[MAX_DATA];
int jumlahData = 0;
 
void bersihkanInput() {
    cin.clear();
    cin.ignore(numeric_limits<streamsize>::max(), '\n');
}
 
void inputData() {
    if (jumlahData >= MAX_DATA) {
        cout << "Data sudah penuh!\n";
        return;
    }
 
    int nim, nilai;
    cout << "\n--- Input Data Mahasiswa ---\n";
    cout << "Masukkan NIM (4 digit, contoh 2301): ";
    while (!(cin >> nim)) {
        cout << "Input tidak valid. Masukkan NIM (angka): ";
        bersihkanInput();
    }
 
    // Cek duplikasi NIM
    for (int i = 0; i < jumlahData; i++) {
        if (mhs[i].nim == nim) {
            cout << "NIM " << nim << " sudah terdaftar!\n";
            return;
        }
    }
 
    cout << "Masukkan Nilai Ujian (0-100): ";
    while (!(cin >> nilai) || nilai < 0 || nilai > 100) {
        cout << "Nilai tidak valid. Masukkan Nilai (0-100): ";
        bersihkanInput();
    }
 
    mhs[jumlahData].nim = nim;
    mhs[jumlahData].nilai = nilai;
    jumlahData++;
 
    cout << "Data berhasil ditambahkan!\n";
}

void isiDataAwal() {
    int nimAwal[15]  = {2301,2302,2303,2304,2305,2306,2307,2308,
                         2309,2310,2311,2312,2313,2314,2315};
    int nilaiAwal[15]= {75, 85, 60, 45, 90, 55, 70, 88,
                         92, 40, 65, 78, 83, 50, 90};
 
    for (int i = 0; i < 15; i++) {
        mhs[jumlahData].nim = nimAwal[i];
        mhs[jumlahData].nilai = nilaiAwal[i];
        jumlahData++;
    }
}

void bubbleSortDescending() {
    for (int i = 0; i < jumlahData - 1; i++) {
        bool adaPertukaran = false;
        for (int j = 0; j < jumlahData - 1 - i; j++) {
            if (mhs[j].nilai < mhs[j + 1].nilai) {
                Mahasiswa temp = mhs[j];
                mhs[j] = mhs[j + 1];
                mhs[j + 1] = temp;
                adaPertukaran = true;
            }
        }
        // Optimisasi: jika tidak ada pertukaran, data sudah terurut
        if (!adaPertukaran) break;
    }
    cout << "\nData berhasil diurutkan berdasarkan nilai (tertinggi -> terendah).\n";
}
 
int linearSearchByNIM(int nimCari) {
    for (int i = 0; i < jumlahData; i++) {
        if (mhs[i].nim == nimCari) {
            return i; // index ditemukan
        }
    }
    return -1; // tidak ditemukan
}
 
void cariMahasiswa() {
    if (jumlahData == 0) {
        cout << "Belum ada data mahasiswa!\n";
        return;
    }
 
    int nimCari;
    cout << "\n--- Cari Mahasiswa berdasarkan NIM ---\n";
    cout << "Masukkan NIM yang dicari: ";
    while (!(cin >> nimCari)) {
        cout << "Input tidak valid. Masukkan NIM (angka): ";
        bersihkanInput();
    }
 
    int index = linearSearchByNIM(nimCari);
 
    if (index != -1) {
        cout << "\nMahasiswa ditemukan!\n";
        cout << "NIM   : " << mhs[index].nim << "\n";
        cout << "Nilai : " << mhs[index].nilai << "\n";
        cout << "Status: " << (mhs[index].nilai >= 60 ? "LULUS" : "TIDAK LULUS") << "\n";
    } else {
        cout << "\nNIM " << nimCari << " tidak ditemukan dalam data!\n";
    }
}
 
void tampilkanStatistik() {
    if (jumlahData == 0) {
        cout << "Belum ada data mahasiswa!\n";
        return;
    }
 
    int nilaiTertinggi = mhs[0].nilai;
    int nilaiTerendah  = mhs[0].nilai;
    long total = 0;
    int jumlahLulus = 0;
    int jumlahTidakLulus = 0;
 
    for (int i = 0; i < jumlahData; i++) {
        int n = mhs[i].nilai;
        if (n > nilaiTertinggi) nilaiTertinggi = n;
        if (n < nilaiTerendah)  nilaiTerendah  = n;
        total += n;
 
        if (n >= 60) jumlahLulus++;
        else jumlahTidakLulus++;
    }
 
    double rataRata = (double) total / jumlahData;
 
    cout << "\n=========== STATISTIK NILAI KELAS ===========\n";
    cout << "Jumlah Mahasiswa      : " << jumlahData << "\n";
    cout << "Nilai Tertinggi        : " << nilaiTertinggi << "\n";
    cout << "Nilai Terendah         : " << nilaiTerendah << "\n";
    cout << fixed << setprecision(2);
    cout << "Nilai Rata-rata        : " << rataRata << "\n";
    cout << "Jumlah Lulus (>=60)    : " << jumlahLulus << "\n";
    cout << "Jumlah Tidak Lulus(<60): " << jumlahTidakLulus << "\n";
    cout << "==============================================\n";
}
 
void tampilkanData() {
    if (jumlahData == 0) {
        cout << "Belum ada data mahasiswa!\n";
        return;
    }
 
    cout << "\n================ DAFTAR NILAI MAHASISWA ================\n";
    cout << left << setw(6)  << "No"
         << setw(10) << "NIM"
         << setw(10) << "Nilai"
         << setw(12) << "Status" << "\n";
    cout << "---------------------------------------------------------\n";
 
    for (int i = 0; i < jumlahData; i++) {
        cout << left << setw(6)  << (i + 1)
             << setw(10) << mhs[i].nim
             << setw(10) << mhs[i].nilai
             << setw(12) << (mhs[i].nilai >= 60 ? "LULUS" : "TIDAK LULUS")
             << "\n";
    }
    cout << "===========================================================\n";
}
 
void tampilkanMenu() {
    cout << "\n===================================================\n";
    cout << "   SISTEM MANAJEMEN DATA NILAI MAHASISWA\n";
    cout << "===================================================\n";
    cout << "1. Input Data Mahasiswa\n";
    cout << "2. Sorting Data (Bubble Sort - Nilai Tertinggi->Terendah)\n";
    cout << "3. Searching Data (Cari berdasarkan NIM)\n";
    cout << "4. Analisis Data (Statistik)\n";
    cout << "5. Tampilkan Semua Data\n";
    cout << "0. Keluar\n";
    cout << "===================================================\n";
    cout << "Pilih menu: ";
}
 
int main() {
    isiDataAwal(); // load 15 data mahasiswa sesuai contoh soal
 
    int pilihan;
 
    do {
        tampilkanMenu();
        while (!(cin >> pilihan)) {
            cout << "Input tidak valid. Pilih menu (angka): ";
            bersihkanInput();
        }
 
        switch (pilihan) {
            case 1:
                inputData();
                break;
            case 2:
                bubbleSortDescending();
                tampilkanData();
                break;
            case 3:
                cariMahasiswa();
                break;
            case 4:
                tampilkanStatistik();
                break;
            case 5:
                tampilkanData();
                break;
            case 0:
                cout << "\nTerima kasih telah menggunakan sistem ini!\n";
                break;
            default:
                cout << "\nPilihan tidak valid, silakan coba lagi.\n";
        }
 
    } while (pilihan != 0);
 
    return 0;
}