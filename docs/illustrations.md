# Ilustrasi Situs

Daftar slot ilustrasi di situs dan arahan untuk membuatnya di Recraft. Selama file belum ada, slot menampilkan kotak placeholder bertuliskan nama dan ukuran. Slot `hero` memakai balok SVG bawaan sebagai cadangan.

## Cara memasang

1. Buat ilustrasi sesuai arahan di bawah.
2. Simpan di `public/images/illustrations/` dengan **nama file persis seperti kolom Nama**. Format yang dikenali: `.svg` (diutamakan), `.webp`, `.png`, `.jpg`, dicari dalam urutan itu.
3. Muat ulang halaman. Placeholder otomatis diganti, tanpa mengubah kode.

Ilustrasi bersifat dekoratif (`alt` kosong), jadi **jangan memasukkan teks penting ke dalam gambar**.

## Arahan gaya

Samakan dengan logo: balok isometrik bersisi tiga dengan warna datar.

- **Gaya**: ilustrasi vektor datar isometrik, bentuk geometris bersih, bayangan lembut berupa tiga sisi (atas, kiri, kanan) seperti balok pada logo. Tanpa tekstur, tanpa outline tebal, tanpa gradien rumit.
- **Palet**: `#EB5B00` oranye, `#D91656` magenta, `#640D5F` ungu, `#FFB200` kuning. Netral: `#1F0A1E` (gelap) dan `#FFFFFF`. Jangan menambah warna lain.
- **Latar**: transparan. Slot menaruh ilustrasi di atas panel `#FFF0E5`, tint warna merek, atau `#1F0A1E` (bagian gelap), jadi hindari latar putih penuh atau warna solid yang bentrok.
- **Isi**: objek dan benda (laptop, ponsel, layar, balok, roda gigi, grafik), tanpa wajah dan tanpa teks. Orang boleh bila bergaya sederhana tanpa detail wajah.
- **Komposisi**: objek utama di tengah dengan ruang kosong sekitar 8% di tepi, supaya tidak terpotong.
- **Format dan ukuran**: SVG, atau PNG/WebP dengan lebar sesuai kolom Ukuran (2x untuk layar retina).

Contoh prompt dasar (ganti bagian subjek):

> Flat isometric vector illustration of **[subjek]**, geometric shapes with three-tone shading like isometric blocks, palette only #EB5B00 orange, #D91656 magenta, #640D5F plum, #FFB200 amber and white, transparent background, no text, no faces, clean minimal style, centered composition.

## Daftar slot

| Nama | Ukuran | Dipakai di | Subjek yang disarankan |
| --- | --- | --- | --- |
| `hero` | 1200×1000 | Beranda, bagian atas | Susunan balok isometrik bertingkat dengan layar, ponsel, dan grafik kecil yang melayang di atasnya (inti dari logo) |
| `service-web-development` | 1200×900 | Kartu layanan dan halaman detail | Jendela peramban isometrik dengan blok tata letak halaman |
| `service-mobile-apps` | 1200×900 | Kartu layanan dan halaman detail | Ponsel isometrik dengan kartu antarmuka melayang |
| `service-custom-systems` | 1200×900 | Kartu layanan dan halaman detail | Tumpukan balok saling tersambung (modul sistem), dengan panel data |
| `service-maintenance-support` | 1200×900 | Kartu layanan dan halaman detail | Roda gigi, kunci pas, dan perisai di atas blok |
| `feature-team` | 1200×800 | Beranda, "Kenapa bekerja dengan kami", baris 1 | Meja kerja isometrik dengan beberapa layar, kesan satu tim |
| `feature-design` | 1200×800 | Beranda, baris 2 | Lembar rancangan, papan alur, dan blok yang sedang disusun |
| `feature-maintain` | 1200×800 | Beranda, baris 3 | Blok yang dirawat: ceklis, perisai, dan roda gigi. Tampil di latar gelap |
| `cta` | 800×800 | Panel ajakan di bawah beranda dan halaman lain | Amplop atau gelembung pesan di atas balok. Tampil di latar oranye `#EB5B00`, jadi hindari oranye dominan |
| `page-services` | 1200×1000 | Header halaman Layanan | Beberapa balok kecil berwarna, tiap balok membawa satu ikon layanan |
| `page-about` | 1200×1000 | Header halaman Tentang | Gedung atau balok yang tumbuh bertingkat, kesan perusahaan |
| `page-contact` | 1200×1000 | Header halaman Kontak | Amplop, surel, dan gelembung percakapan isometrik |
| `page-projects` | 1200×1000 | Header halaman Proyek | Bingkai atau papan pajangan kosong dengan balok |
| `not-found` | 1200×1000 | Halaman 404 dan 429 | Balok yang terpisah atau jatuh, kesan "ada yang hilang" |

Ilustrasi `service-*` dipakai di dua tempat dengan rasio 4:3, jadi satu file cukup. Di kartu beranda dan halaman Layanan, ilustrasi tampil di atas tint `#FFF0E5`, `#D91656` 10%, `#640D5F` 10%, atau `#FFB200` 25% secara bergantian.

## Menambah slot baru

Pakai komponen `<x-illustration name="..." ratio="4/3" size="1200×900" />` dan tambahkan baris di tabel di atas dalam perubahan yang sama.
