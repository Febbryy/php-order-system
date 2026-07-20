let slide = document.getElementsByClassName('img_kontent1');
let slideIndex = 0;

function showSlide(){
    // Hapus semua class 'active'
    for(let i = 0; i < slide.length; i++){
        slide[i].classList.remove('active');
    }
    
    // Tambahkan class 'active' ke slide saat ini
    slide[slideIndex].classList.add('active');
    
    // Pindah ke slide berikutnya (dengan pengecekan)
    slideIndex++;
    if (slideIndex >= slide.length) {
        slideIndex = 0;
    }
}
// Tampilkan slide pertama
showSlide(0);

// Jalankan setiap 5 detik
setInterval(showSlide, 5000);