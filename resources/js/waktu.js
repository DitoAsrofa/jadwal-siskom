function updateClock() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();

    // Tambahkan 0 di depan angka satu digit
    hours = hours < 10 ? '0' + hours : hours;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;

    var timeString = hours + ':' + minutes + ':' + seconds;

    document.getElementById('clock').innerText = timeString;
}

// Perbarui waktu setiap detik
setInterval(updateClock, 1000);

// Panggil updateClock sekali untuk menampilkan waktu segera saat halaman dimuat
updateClock();
