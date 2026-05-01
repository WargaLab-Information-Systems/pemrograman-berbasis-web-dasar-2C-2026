# 📱 CHEATSHEET JS — PRAKTIKUM PBWD MODUL 4

> Simpan ini, kepake terus pas ngerjain tugas 🙏

---

## 🎯 INGAT 3 HAL INI DULU

1. **JS = otak web.** Bikin halaman responsif & interaktif.
2. **Script ditaruh SEBELUM `</body>`** — biar elemen HTML udah ada.
3. **Kalo error, buka F12 → Console.** Jawabannya di situ.

---

## 🔧 TEMPLATE DASAR

```html
<!DOCTYPE html>
<html>
<head>
  <title>Halaman JS</title>
</head>
<body>
  <h1 id="judul">Halo</h1>
  <button id="tombol">Klik</button>

  <!-- Script DI BAWAH, sebelum </body> -->
  <script>
    // kode JS di sini
  </script>
</body>
</html>
```

---

## 📦 VARIABEL

```javascript
let nama = "Budi";      // bisa diubah
const PI = 3.14;         // konstanta, nggak bisa diubah
```

---

## 🎣 AKSES ELEMEN HTML

```javascript
// By ID (paling sering dipake)
let x = document.getElementById("judul");

// By CSS selector (1 pertama)
let y = document.querySelector(".kelas");
let z = document.querySelector("#id");

// By CSS selector (SEMUA)
let all = document.querySelectorAll(".kelas");
```

---

## ✏️ UBAH KONTEN

```javascript
// Buat elemen biasa (h1, p, div, dll)
elemen.textContent = "Teks baru";
elemen.innerHTML = "<b>Teks</b> dengan HTML";

// Buat INPUT/TEXTAREA
inputBox.value = "Isi baru";     // set
let isi = inputBox.value;         // ambil
```

---

## 🎨 UBAH STYLE

```javascript
elemen.style.color = "red";
elemen.style.backgroundColor = "yellow";  // perhatiin: bukan background-color
elemen.style.fontSize = "20px";           // bukan font-size
elemen.style.padding = "10px";
elemen.style.display = "none";            // sembunyikan
```

> **Aturan**: semua property CSS yang ada `-`, ubah jadi camelCase.
> `background-color` → `backgroundColor`
> `border-radius` → `borderRadius`

---

## 🎭 UBAH CLASS (UNTUK DARK MODE, DLL)

```javascript
// Tambah class
elemen.classList.add("dark");

// Hapus class
elemen.classList.remove("dark");

// Toggle (add kalau nggak ada, remove kalau ada) — PALING BERGUNA
elemen.classList.toggle("dark");

// Cek punya class nggak
if (elemen.classList.contains("dark")) {
    // ...
}
```

---

## 🎧 EVENT LISTENER

```javascript
let tombol = document.getElementById("tombol");

tombol.addEventListener("click", function() {
    // kode yang jalan saat diklik
});
```

### Event umum
- `"click"` — diklik
- `"input"` — isi input berubah
- `"submit"` — form disubmit
- `"change"` — dropdown/checkbox berubah
- `"mouseover"` — cursor di atas elemen
- `"keydown"` — tombol keyboard ditekan

---

## 📝 VALIDASI FORM (TEMPLATE UNTUK TUGAS)

```html
<form id="myForm">
  <input type="text" id="nama" placeholder="Nama">
  <input type="email" id="email" placeholder="Email">
  <input type="password" id="password" placeholder="Password">
  <button type="submit">Kirim</button>
  <p id="pesan"></p>
</form>

<script>
let form = document.getElementById("myForm");

form.addEventListener("submit", function(event) {
    event.preventDefault();  // WAJIB! Cegah halaman reload

    let nama = document.getElementById("nama").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let pesan = document.getElementById("pesan");

    // Cek nama kosong
    if (nama === "") {
        pesan.textContent = "Nama wajib diisi!";
        pesan.style.color = "red";
        return;
    }

    // Cek email
    if (!email.includes("@")) {
        pesan.textContent = "Format email salah!";
        pesan.style.color = "red";
        return;
    }

    // Cek password panjang
    if (password.length < 8) {
        pesan.textContent = "Password minimal 8 karakter!";
        pesan.style.color = "red";
        return;
    }

    // Semua valid
    pesan.textContent = "Data valid!";
    pesan.style.color = "green";
});
</script>
```

### Validasi lain yang mungkin kepake
```javascript
// Cek cuma angka
if (isNaN(nomor)) { ... }

// Cek panjang minimal
if (teks.length < 5) { ... }

// Cek email lebih ketat (pakai regex)
if (!email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) { ... }

// Cek checkbox dicentang
if (!checkbox.checked) { ... }

// Cek 2 field sama (konfirmasi password)
if (password !== konfirmPassword) { ... }
```

---

## 🌓 DARK MODE (TEMPLATE UNTUK TUGAS)

### Cara 1: Vanilla CSS

```html
<style>
  body.dark {
    background-color: #222;
    color: white;
  }
  body.dark a { color: lightblue; }
  body.dark button { background: #444; color: white; }
</style>

<button id="toggleTheme">🌓 Toggle Dark Mode</button>

<script>
document.getElementById("toggleTheme").addEventListener("click", function() {
    document.body.classList.toggle("dark");
});
</script>
```

### Cara 2: Bootstrap

```javascript
document.getElementById("toggleTheme").addEventListener("click", function() {
    document.body.classList.toggle("bg-dark");
    document.body.classList.toggle("text-light");
});
```

### Cara 3: Tailwind

```javascript
document.getElementById("toggleTheme").addEventListener("click", function() {
    document.body.classList.toggle("bg-gray-900");
    document.body.classList.toggle("text-white");
});
```

---

## 🐛 DEBUG 101

### Langkah 1: Buka Console
Tekan **F12** → tab **Console**

### Langkah 2: Baca Error (warna merah)

| Error | Artinya | Biasanya karena... |
|-------|---------|-------------------|
| `Cannot read properties of null` | Elemen nggak ketemu | Salah ID/class, atau script di atas elemen |
| `X is not defined` | Variabel/function belum dibuat | Salah nulis nama |
| `Unexpected token` | Syntax error | Kurung/koma/titik koma |
| `Assignment to constant variable` | Nge-assign ulang const | Ganti jadi `let` |

### Langkah 3: Pake console.log buat cek

```javascript
let x = document.getElementById("judul");
console.log(x);           // lihat isi x
console.log("sampai sini"); // cek alur
```

### Langkah 4: Cek di tab Elements
Kalau DOM udah berubah atau belum — lihat langsung di sini.

---

## ⚠️ KESALAHAN UMUM PRAKTIKAN

| Salah ❌ | Bener ✅ |
|---------|----------|
| `getElementByID` | `getElementById` (Id bukan ID) |
| `querySelector("paragraf")` | `querySelector(".paragraf")` untuk class, `"#id"` untuk id |
| `.style.background-color` | `.style.backgroundColor` |
| Script di `<head>` tanpa `defer` | Script sebelum `</body>` |
| `input.textContent` | `input.value` |
| Lupa `event.preventDefault()` di form | Selalu tambahin baris pertama |
| Lupa `Ctrl+S` sebelum refresh | Save dulu baru refresh |
| Buka file dengan double-click doang | Pake Live Server (lebih enak, auto-refresh) |

---

## 🎯 CHECKLIST TUGAS PRAKTIKUM MODUL 4

- [ ] Install **Live Server** extension di VS Code (Ctrl+Shift+X, cari "Live Server")
- [ ] Buka folder UTS
- [ ] Tambahin validasi JS di semua form
  - [ ] Minimal: cek kosong
  - [ ] Minimal: cek format email pake `.includes("@")`
  - [ ] Panjang password minimal 8 (kalau ada)
  - [ ] Konfirmasi password match (kalau ada)
- [ ] Tambahin dark/light mode di homepage
  - [ ] Tombol toggle
  - [ ] Style untuk mode gelap
  - [ ] Pake `classList.toggle`
- [ ] Test semua tombol dan form berjalan
- [ ] Kumpulin sebelum deadline

---

## 🔗 RESOURCE TAMBAHAN

- **MDN Web Docs** — https://developer.mozilla.org/en-US/docs/Web/JavaScript (referensi terbaik)
- **JavaScript.info** — https://javascript.info (tutorial lengkap, pelan-pelan)
- **W3Schools** — https://www.w3schools.com/js (cepat & simpel buat lookup)

---

## 📞 KALAU STUCK

1. Stuck 10 menit → tanya teman samping
2. Stuck 20 menit → Google error-nya
3. Stuck 30 menit → tanya di grup WA
4. Stuck 45 menit → tag asprak

**SEMANGAT! 💪**
