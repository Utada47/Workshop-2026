#include <iostream>

using namespace std;

const int MAX_DATA = 100;

// ─────────────────────────────────────────────────────────────
// Fungsi bantu bersihkanInput, cetakAngkaKiri, cetakTeksKiri,
// dan cetakDuaDesimal DIHAPUS — diganti langsung (inline) di
// masing-masing fungsi yang membutuhkannya.
// ─────────────────────────────────────────────────────────────

void inputData(int nim[], int nilai[], int &jumlahData) {
    if (jumlahData >= MAX_DATA) {
        cout << "Data sudah penuh!\n";
        return;
    }

    int nimBaru, nilaiBaru;
    cout << "\n--- Input Data Mahasiswa ---\n";
    cout << "Masukkan NIM (4 digit, contoh 2301): ";
    while (!(cin >> nimBaru)) {
        cout << "Input tidak valid. Masukkan NIM (angka): ";
        cin.clear();                    // reset error flag
        cin.ignore(1000000, '\n');      // buang sisa buffer
    }

    // Cek duplikasi NIM
    for (int i = 0; i < jumlahData; i++) {
        if (nim[i] == nimBaru) {
            cout << "NIM " << nimBaru << " sudah terdaftar!\n";
            return;
        }
    }

    cout << "Masukkan Nilai Ujian (0-100): ";
    while (!(cin >> nilaiBaru) || nilaiBaru < 0 || nilaiBaru > 100) {
        cout << "Nilai tidak valid. Masukkan Nilai (0-100): ";
        cin.clear();
        cin.ignore(1000000, '\n');
    }

    nim[jumlahData]   = nimBaru;
    nilai[jumlahData] = nilaiBaru;
    jumlahData++;

    cout << "Data berhasil ditambahkan!\n";
}

void isiDataAwal(int nim[], int nilai[], int &jumlahData) {
    int nimAwal[15]   = {2301, 2302, 2303, 2304, 2305, 2306, 2307, 2308,
                         2309, 2310, 2311, 2312, 2313, 2314, 2315};
    int nilaiAwal[15] = {  75,   85,   60,   45,   90,   55,   70,   88,
                            92,   40,   65,   78,   83,   50,   90};

    for (int i = 0; i < 15; i++) {
        nim[jumlahData]   = nimAwal[i];
        nilai[jumlahData] = nilaiAwal[i];
        jumlahData++;
    }
}

void bubbleSortDescending(int nim[], int nilai[], int jumlahData) {
    for (int i = 0; i < jumlahData - 1; i++) {
        bool adaPertukaran = false;
        for (int j = 0; j < jumlahData - 1 - i; j++) {
            if (nilai[j] < nilai[j + 1]) {
                // tukar NIM
                int tempNim  = nim[j];
                nim[j]       = nim[j + 1];
                nim[j + 1]   = tempNim;
                // tukar Nilai
                int tempNilai  = nilai[j];
                nilai[j]       = nilai[j + 1];
                nilai[j + 1]   = tempNilai;

                adaPertukaran = true;
            }
        }
        if (!adaPertukaran) break;  // optimisasi: sudah terurut
    }
    cout << "\nData berhasil diurutkan berdasarkan nilai (tertinggi -> terendah).\n";
}

int linearSearchByNIM(int nim[], int jumlahData, int nimCari) {
    for (int i = 0; i < jumlahData; i++) {
        if (nim[i] == nimCari) return i;
    }
    return -1;
}

void cariMahasiswa(int nim[], int nilai[], int jumlahData) {
    if (jumlahData == 0) {
        cout << "Belum ada data mahasiswa!\n";
        return;
    }

    int nimCari;
    cout << "\n--- Cari Mahasiswa berdasarkan NIM ---\n";
    cout << "Masukkan NIM yang dicari: ";
    while (!(cin >> nimCari)) {
        cout << "Input tidak valid. Masukkan NIM (angka): ";
        cin.clear();
        cin.ignore(1000000, '\n');
    }

    int index = linearSearchByNIM(nim, jumlahData, nimCari);

    if (index != -1) {
        cout << "\nMahasiswa ditemukan!\n";
        cout << "NIM   : " << nim[index] << "\n";
        cout << "Nilai : " << nilai[index] << "\n";
        cout << "Status: " << (nilai[index] >= 60 ? "LULUS" : "TIDAK LULUS") << "\n";
    } else {
        cout << "\nNIM " << nimCari << " tidak ditemukan dalam data!\n";
    }
}

void tampilkanStatistik(int nilai[], int jumlahData) {
    if (jumlahData == 0) {
        cout << "Belum ada data mahasiswa!\n";
        return;
    }

    int nilaiTertinggi = nilai[0];
    int nilaiTerendah  = nilai[0];
    long total = 0;
    int jumlahLulus = 0, jumlahTidakLulus = 0;

    for (int i = 0; i < jumlahData; i++) {
        int n = nilai[i];
        if (n > nilaiTertinggi) nilaiTertinggi = n;
        if (n < nilaiTerendah)  nilaiTerendah  = n;
        total += n;
        if (n >= 60) jumlahLulus++;
        else         jumlahTidakLulus++;
    }

    double rataRata = (double)total / jumlahData;

    // ── Cetak 2 desimal secara manual (tanpa iomanip) ──────────
    long dibulatkan    = (long)(rataRata * 100 + 0.5);
    long bagianBulat   = dibulatkan / 100;
    long bagianDesimal = dibulatkan % 100;
    // ───────────────────────────────────────────────────────────

    cout << "\n=========== STATISTIK NILAI KELAS ===========\n";
    cout << "Jumlah Mahasiswa       : " << jumlahData       << "\n";
    cout << "Nilai Tertinggi        : " << nilaiTertinggi   << "\n";
    cout << "Nilai Terendah         : " << nilaiTerendah    << "\n";
    cout << "Nilai Rata-rata        : " << bagianBulat << ".";
    if (bagianDesimal < 10) cout << "0";   // cetak leading zero jika perlu
    cout << bagianDesimal << "\n";
    cout << "Jumlah Lulus (>=60)    : " << jumlahLulus      << "\n";
    cout << "Jumlah Tidak Lulus(<60): " << jumlahTidakLulus << "\n";
    cout << "==============================================\n";
}

void tampilkanData(int nim[], int nilai[], int jumlahData) {
    if (jumlahData == 0) {
        cout << "Belum ada data mahasiswa!\n";
        return;
    }

    // ── Tabel dengan tab (\t) sebagai pemisah kolom ────────────
    cout << "\n================ DAFTAR NILAI MAHASISWA ================\n";
    cout << "No\tNIM\tNilai\tStatus\n";
    cout << "---------------------------------------------------------\n";

    for (int i = 0; i < jumlahData; i++) {
        cout << (i + 1)  << "\t"
             << nim[i]   << "\t"
             << nilai[i] << "\t"
             << (nilai[i] >= 60 ? "LULUS" : "TIDAK LULUS") << "\n";
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
    int nim[MAX_DATA];
    int nilai[MAX_DATA];
    int jumlahData = 0;

    isiDataAwal(nim, nilai, jumlahData);

    int pilihan;

    do {
        tampilkanMenu();
        while (!(cin >> pilihan)) {
            cout << "Input tidak valid. Pilih menu (angka): ";
            cin.clear();
            cin.ignore(1000000, '\n');
        }

        switch (pilihan) {
            case 1:
                inputData(nim, nilai, jumlahData);
                break;
            case 2:
                bubbleSortDescending(nim, nilai, jumlahData);
                tampilkanData(nim, nilai, jumlahData);
                break;
            case 3:
                cariMahasiswa(nim, nilai, jumlahData);
                break;
            case 4:
                tampilkanStatistik(nilai, jumlahData);
                break;
            case 5:
                tampilkanData(nim, nilai, jumlahData);
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