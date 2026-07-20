// 1. Fungsi Utama Rekursif (Sesuai skema DIVIDE_and_CONQUER)
function mergeSort(arr) {
    // Basis: Jika ukuran masalah sudah cukup kecil (n <= 1)
    if (arr.length <= 1) {
        return arr; // SOLVE secara langsung karena array 1 elemen pasti terurut
    }

    // DIVIDE: Bagi masalah menjadi r=2 upa-masalah, masing-masing berukuran n/2
    const mid = Math.floor(arr.length / 2);
    const leftArray = arr.slice(0, mid);   // Upa-masalah bagian kiri
    const rightArray = arr.slice(mid);     // Upa-masalah bagian kanan

    // CONQUER: Selesaikan masing-masing upa-masalah secara rekursif
    const sortedLeft = mergeSort(leftArray);
    const sortedRight = mergeSort(rightArray);

    // COMBINE: Gabungkan solusi dari kedua upa-masalah menjadi solusi semula
    return combine(sortedLeft, sortedRight);
}

// 2. Fungsi COMBINE untuk menggabungkan dua array yang sudah terurut
function combine(left, right) {
    let result = [];
    let i = 0; // Indeks untuk array kiri
    let j = 0; // Indeks untuk array kanan

    // Bandingkan elemen dari kedua array dan gabungkan secara terurut
    while (i < left.length && j < right.length) {
        if (left[i] <= right[j]) {
            result.push(left[i]);
            i++;
        } else {
            result.push(right[j]);
            j++;
        }
    }

    // Salin sisa elemen yang belum dimasukkan (jika ada)
    // Di JavaScript, kita bisa langsung menggunakan slice untuk mengambil sisanya
    return result.concat(left.slice(i)).concat(right.slice(j));
}

// --- Contoh Penggunaan (Driver Code) ---
const data = [38, 27, 43, 3, 9, 82, 10];

console.log("Array sebelum diurutkan:", data);

const dataTerurut = mergeSort(data);

console.log("Array setelah diurutkan:", dataTerurut);