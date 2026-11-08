# Desain Situs Algobyte

Pedoman visual untuk landing page dan halaman publik Algobyte Teknologi Nusantara. Warna diambil dari logo (`docs/references/`), tata letak dan kerapian mengacu ke [qvery.ai](https://qvery.ai/). Dokumen ini ditinjau sebelum kode ditulis; semua halaman dan komponen mengikutinya.

## Keputusan

### Arah

Situs perusahaan perangkat lunak yang tenang dan rapi, dengan **satu hal yang diingat**: balok isometrik dari logo, dipakai sebagai ilustrasi hero yang tersusun saat halaman dibuka. Selain itu halaman dibuat diam: latar terang, tipografi besar, kartu sederhana.

Dari qvery.ai diambil: hero dua kolom (teks kiri, ilustrasi kanan), lebar isi 1172px, bar navigasi mengambang dengan bayangan lembut, kartu radius 12, tombol radius 6, bagian "Before We Start" (FAQ), bagian industri/layanan berbentuk kartu, dan nada tulisan yang pendek dan lugas. **Tidak diambil**: palet teal dan biru, font Lato/Inter, teks huruf kapital untuk callout, dan latar biru-dingin `#F6F8FF` (bentrok dengan oranye logo).

### Warna

Semua nilai oranye, ungu, magenta, dan kuning diukur dari berkas logo.

| Token | Hex | Dipakai untuk |
| --- | --- | --- |
| `brand` | `#EB5B00` | Tombol utama, blok ilustrasi, penanda aktif. **Hanya sebagai isian**, bukan warna teks kecil di latar terang (kontras sekitar 3,3:1) |
| `brand-soft` | `#FFF0E5` | Latar lembut di balik ikon atau sorotan |
| `highlight` | `#FFB200` | Sorotan di latar gelap, balok kuning logo |
| `accent` | `#D91656` | Aksen kedua, status, garis fokus. Aman untuk teks (kontras sekitar 4,7:1) |
| `plum` | `#640D5F` | Tautan, judul kecil, ikon di latar terang (kontras sekitar 11:1) |
| `ink` | `#1F0A1E` | Teks utama dan seksi gelap. Ungu-hitam turunan `plum`, bukan hitam polos |
| `ink-muted` | `#5E4B5D` | Teks sekunder (kontras sekitar 7,5:1 di `paper`) |
| `paper` | `#FBF8FB` | Latar halaman |
| `surface` | `#FFFFFF` | Kartu, kolom isian |
| `line` | `#EADFE9` | Garis pemisah dan batas kartu |

Aturan pakai:
- **Teks di atas `brand` memakai `ink`** (kontras 5,5:1), bukan putih.
- Seksi gelap (`ink`) memakai teks `paper` dan sorotan `highlight`. `brand` di sana hanya untuk isian dan tombol.
- Satu seksi memakai paling banyak dua warna merek selain netral. Warna merek tidak dipakai sebagai gradien dekoratif.
- Bayangan berwarna `plum` transparan, bukan abu-abu: kartu `0 1px 14px rgb(100 13 95 / .10)`, navigasi `0 1px 20px rgb(100 13 95 / .14)`.
- Semua pasangan teks dan latar diperiksa dengan pemeriksa kontras sebelum dikirim. Target WCAG AA.

### Tipografi

| Peran | Font | Catatan |
| --- | --- | --- |
| Judul dan tombol | Outfit | Geometris, bentuk `g` satu lantai seperti wordmark logo. Bobot 600 untuk judul, 500 untuk tombol |
| Isi dan antarmuka | Plus Jakarta Sans | Terbaca baik di ukuran kecil dan untuk teks Indonesia. Bobot 400 dan 500 |

Dimuat lokal lewat `@fontsource` dan Vite, tanpa permintaan ke Google Fonts (kecepatan dan privasi).

| Gaya | Ukuran (mobile → desktop) | Tinggi baris | Spasi huruf |
| --- | --- | --- | --- |
| Hero | 40 → 64px | 1,05 | -0,02em |
| Judul seksi | 30 → 44px | 1,1 | -0,015em |
| Judul kartu | 20 → 24px | 1,25 | -0,01em |
| Pengantar | 18 → 20px | 1,6 | 0 |
| Isi | 16 → 17px | 1,65 | 0 |
| Keterangan | 14px | 1,5 | 0 |

- Panjang baris isi maksimal 68 karakter (`max-w-prose`). Judul rata kiri.
- Semua huruf kecil di label, tombol, dan callout (sentence case). Tidak ada huruf kapital semua, tidak ada panah `→` di tombol, tidak ada label kecil di atas setiap judul.
- Angka memakai angka tabular di tabel dan statistik.

### Bentuk dan jarak

| Elemen | Nilai |
| --- | --- |
| Lebar isi | 1172px, bingkai luar 1300px |
| Gutter | 20px (mobile), 40px (tablet), 64px (desktop) |
| Jarak antar seksi | 64px (mobile), 96px (desktop) |
| Radius | tombol 6px, navigasi 8px, kartu dan panel 12px, ikon bulat tidak dipakai |
| Skala jarak | kelipatan 4px |

Radius dibedakan menurut hierarki (kecil untuk kontrol, besar untuk wadah), tidak satu radius untuk semuanya.

### Gerak

- **Satu momen**: balok hero tersusun dalam sekitar 900ms saat halaman pertama dibuka, memakai kurva `cubic-bezier(.44, 0, .56, 1)` seperti qvery.ai. Hanya sekali per kunjungan.
- Respons terhadap aksi pengguna: hover dan fokus tombol, buka-tutup FAQ, menu mobile. Durasi 150 sampai 250ms.
- Tidak ada animasi masuk per seksi, tidak ada parallax, tidak ada hover bergerak di setiap kartu.
- `prefers-reduced-motion`: balok langsung tampil dalam posisi akhir, tanpa transisi.

## Struktur halaman

Teks tampil dalam dua bahasa (Indonesia bawaan, Inggris). Bahasa Indonesia di `/`, bahasa Inggris di `/en/...`, dengan pengalih bahasa di navigasi dan footer. Isi teks di `lang/id` dan `lang/en`, bukan di Blade.

```
Beranda                /
Layanan                /layanan            (en: /en/services)
  Detail layanan       /layanan/{slug}
Proyek                 /proyek             (en: /en/projects)
  Detail proyek        /proyek/{slug}
Tentang                /tentang            (en: /en/about)
Kontak                 /kontak             (en: /en/contact)
Kebijakan privasi      /kebijakan-privasi  (en: /en/privacy-policy)
Syarat dan ketentuan   /syarat-ketentuan   (en: /en/terms)
```

Blog dan studi kasus panjang **ditunda** sampai ada konten.

### Beranda

```
┌───────────────────────────────────────────────┐
│ [logo]   Layanan Proyek Tentang    ID|EN [Hubungi kami] │  navigasi mengambang
├───────────────────────────────────────────────┤
│  Judul hero, rata kiri          ┌──────────┐  │
│  maksimal 3 baris               │  balok   │  │  hero
│  pengantar 1-2 kalimat          │ isometrik│  │
│  [Mulai proyek] [Lihat proyek]  └──────────┘  │
├───────────────────────────────────────────────┤
│  Layanan: 3 sampai 4 kartu, ikon + 2 kalimat  │
├───────────────────────────────────────────────┤
│  Cara kerja: 4 langkah berurutan (bernomor)   │
├───────────────────────────────────────────────┤
│  Proyek pilihan: 2 sampai 3 kartu besar       │
├───────────────────────────────────────────────┤
│  Seksi gelap (ink): alasan memilih Algobyte   │
├───────────────────────────────────────────────┤
│  Sebelum mulai: FAQ 6 sampai 8 pertanyaan     │
├───────────────────────────────────────────────┤
│  Ajakan penutup + tombol                      │
├───────────────────────────────────────────────┤
│  Footer: logo, tautan, bahasa, legal          │
└───────────────────────────────────────────────┘
```

- Penomoran **hanya** di "Cara kerja", karena isinya memang urutan. Seksi lain tidak bernomor.
- Hero rata kiri di desktop, ilustrasi di bawah teks di mobile.
- Bagian bukti sosial (logo klien, angka) hanya dipasang bila datanya nyata. Tidak ada angka karangan.

## Komponen

| Komponen | Aturan |
| --- | --- |
| Navigasi | Mengambang, `surface`, radius 8, bayangan navigasi. Mobile: tombol menu membuka panel penuh. Tautan aktif ditandai garis `brand` di bawahnya |
| Tombol utama | Isian `brand`, teks `ink`, radius 6, padding 14×30. Hover: isian `plum`, teks `paper`. Satu tombol utama per layar |
| Tombol sekunder | Garis `ink` 1,5px, tanpa isian. Hover: isian `ink`, teks `paper` |
| Tautan | `plum`, garis bawah selalu terlihat |
| Kartu | `surface`, radius 12, bayangan kartu, tanpa batas. Seluruh kartu bisa diklik bila mengarah ke halaman lain |
| FAQ | Elemen `<details>`; panah memutar saat terbuka. Judul pertanyaan memakai gaya judul kartu |
| Formulir | Label di atas kolom, kolom `surface` dengan batas `line`, fokus: garis `accent` 2px. Pesan galat menyebut apa yang salah dan cara memperbaikinya |
| Footer | Latar `ink`, teks `paper`, tautan dikelompokkan, pengalih bahasa terlihat |

Keadaan wajib ada untuk setiap komponen interaktif: normal, hover, fokus (cincin 2px `accent` berjarak 2px), aktif, nonaktif.

## Ilustrasi hero

Tiga balok isometrik dari logo (dua tegak, satu kecil di atas), masing-masing dengan tiga sisi: `brand`, `accent`, `plum`, dan `highlight` untuk balok kecil. Dibuat sebagai SVG inline, bukan gambar raster. Balok naik ke posisinya berurutan (kiri, tengah, atas). Di mobile ukurannya mengecil, bentuk tetap.

Logo dipakai apa adanya dan tidak diubah warnanya. `logo-2.png` (susun vertikal) untuk footer dan halaman legal, `logo(1).png` (mendatar) untuk navigasi, `favicon.png` untuk ikon tab. Berkas aslinya raster; kerjakan versi SVG bila tersedia dari pemilik logo.

## Gaya tulisan

- Bahasa lugas dari sudut pandang klien: sebut hasil dan langkah, bukan istilah internal.
- Kalimat aktif, sentence case, tanpa kata isian. Tombol menyebut yang terjadi ("Jadwalkan konsultasi", bukan "Kirim").
- Aksi yang sama memakai nama yang sama di seluruh alur (tombol "Kirim pesan" menghasilkan pesan "Pesan terkirim").
- Galat dan keadaan kosong memberi arah, tidak meminta maaf dan tidak samar.
- Versi Inggris ditulis ulang untuk pembaca Inggris, bukan terjemahan kata demi kata.

## Aksesibilitas dan responsif

- Responsif dari 360px. Tidak ada gulir horizontal. Breakpoint: 640, 1024, 1280px.
- Semua fungsi bisa dipakai dengan keyboard; ada tautan "Lewati ke konten" di awal halaman.
- Area sentuh minimal 44×44px.
- Gambar bermakna punya `alt`, ilustrasi dekoratif memakai `aria-hidden`.
- Atribut `lang` pada `<html>` mengikuti bahasa halaman, dan setiap halaman punya `hreflang` untuk versi lainnya.

## Struktur kode

- Blade dengan layout `resources/views/layouts/app.blade.php` dan komponen anonim di `resources/views/components` (navigasi, tombol, kartu, FAQ, footer). Halaman di `resources/views/pages`.
- Token warna dan font didefinisikan di `@theme` pada `resources/css/app.css`, tidak ada nilai warna mentah di Blade.
- Satu controller per halaman statis atau `Route::view` bila tanpa data; formulir kontak lewat Action dan Form Request, sesuai `AGENTS.md`.
- Tidak ada framework JavaScript. Skrip kecil hanya untuk menu mobile dan pengalih bahasa.

## Langkah dan test

1. Tinjau dokumen ini, lalu putuskan hal di bagian **Ditunda**.
2. Pasang font, token tema, dan layout dasar.
3. Bangun komponen, lalu Beranda, lalu halaman lain satu per satu.
4. Feature test: setiap halaman mengembalikan 200 di kedua bahasa, `hreflang` benar, formulir kontak menolak data tidak valid dan menyimpan atau mengirim data valid.
5. Periksa kontras tiap pasangan warna, tampilan 360px, dan navigasi keyboard.

## Ditunda

- Blog, studi kasus panjang, dan halaman tim, sampai kontennya ada.
- Mode gelap penuh. Situs hanya memakai seksi gelap di tengah halaman.
- Isi nyata: daftar layanan, proyek, kontak, dan alamat. Sampai tersedia, halaman memakai teks sementara yang ditandai jelas dan tidak berisi angka atau klien karangan.
- Versi SVG logo.
