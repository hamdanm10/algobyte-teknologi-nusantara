# Ilustrasi Situs

Daftar slot ilustrasi di situs dan arahan untuk membuatnya di Recraft. Selama file belum ada, slot menampilkan kotak placeholder bertuliskan nama dan ukuran.

## Cara memasang

1. Buat ilustrasi sesuai arahan di bawah.
2. Simpan di `public/images/illustrations/` dengan **nama file persis seperti kolom Nama**. Format yang dikenali: `.svg` (diutamakan), `.webp`, `.png`, `.jpg`, dicari dalam urutan itu.
3. Muat ulang halaman. Placeholder otomatis diganti, tanpa mengubah kode.

Ilustrasi bersifat dekoratif (`alt` kosong), jadi **jangan memasukkan teks penting ke dalam gambar**.

## Arahan gaya

Acuannya ilustrasi di qvery.ai: **lebar, datar, 2D**, dengan garis bersih dan beberapa isian warna. Bukan 3D dan bukan isometrik.

- **Gaya**: ilustrasi vektor datar 2D, garis tipis seragam berwarna `#1F0A1E`, isian warna datar, bentuk sederhana. Tanpa tekstur, tanpa gradien, tanpa bayangan lembut.
- **Palet**: `#EB5B00` oranye, `#D91656` magenta, `#640D5F` ungu, `#FFB200` kuning, garis `#1F0A1E`, dan putih. Jangan menambah warna lain. Gunakan satu atau dua warna merek sebagai aksen, sisanya garis dan putih.
- **Latar**: transparan. Slot menaruh ilustrasi di atas `#FBF8FB` (halaman), tint warna merek (kartu layanan), atau `#1F0A1E` (bagian gelap), jadi hindari latar putih penuh.
- **Isi**: adegan kerja sederhana (orang di depan layar, meja, papan alur, perangkat, grafik). Orang boleh tampil bergaya sederhana. Tanpa teks.
- **Bentuk lebar**: komposisi memanjang ke samping seperti panorama, dengan elemen yang bisa terpotong tipis di sisi tepi layar. Sisi yang menembus tepi layar sebaiknya berisi elemen yang berlanjut, bukan objek yang tampak terpotong.
- **Format dan ukuran**: SVG, atau PNG/WebP dengan lebar sesuai kolom Ukuran (2x untuk layar retina).

Contoh prompt dasar (ganti bagian subjek dan rasio):

> Wide landscape flat 2D vector illustration of **[subjek]**, thin consistent dark line work (#1F0A1E), flat color fills using only #EB5B00 orange, #D91656 magenta, #640D5F plum and #FFB200 amber plus white, transparent background, no gradients, no shadows, no text, simple geometric shapes, clean minimal editorial style, aspect ratio **[rasio]**.

## Daftar slot

Kolom Tepi menunjukkan sisi yang menembus tepi layar di desktop ("-" berarti tetap di dalam container).

| Nama | Ukuran | Tepi | Dipakai di | Subjek yang disarankan |
| --- | --- | --- | --- | --- |
| `hero` | 1600×900 | kanan | Beranda, bagian atas | Tim kecil di meja kerja dengan layar, papan alur, dan grafik, memanjang ke kanan |
| `process` | 2400×600 | kiri dan kanan | Beranda, di bawah "Cara kerja" | Panorama sangat panjang: empat adegan berurutan (diskusi, rancangan, pembangunan, peluncuran) tersambung satu garis |
| `feature-team` | 1600×900 | kanan | Beranda, "Kenapa bekerja dengan kami", baris 1 | Orang-orang bekerja bersama di satu meja panjang |
| `feature-design` | 1600×900 | kiri | Beranda, baris 2 | Lembar rancangan, papan alur, dan kerangka halaman yang sedang ditinjau |
| `feature-maintain` | 1600×900 | kanan | Beranda, baris 3 | Perangkat dengan ceklis, perisai, dan kunci pas. Tampil di latar gelap, jadi garis dan isian harus tetap terbaca |
| `faq` | 1200×900 | kiri | Beranda, di bawah judul FAQ (hanya desktop) | Tanda tanya, gelembung percakapan, dan orang yang bertanya |
| `service-web-development` | 1200×800 | - | Kartu layanan; kanan di halaman detail | Jendela peramban dengan tata letak halaman |
| `service-mobile-apps` | 1200×800 | - | Kartu layanan; kanan di halaman detail | Ponsel dengan kartu antarmuka |
| `service-custom-systems` | 1200×800 | - | Kartu layanan; kanan di halaman detail | Modul saling tersambung dan panel data |
| `service-maintenance-support` | 1200×800 | - | Kartu layanan; kanan di halaman detail | Roda gigi, kunci pas, dan perisai |
| `cta` | 1200×900 | - | Panel ajakan (latar oranye `#EB5B00`) | Amplop atau gelembung pesan. Hindari oranye dominan karena latarnya oranye |
| `page-services` | 1600×900 | kanan | Header halaman Layanan | Beberapa perangkat dan modul berjajar |
| `page-about` | 1600×900 | kanan | Header halaman Tentang | Tim dan gedung kantor sederhana |
| `page-contact` | 1600×900 | kanan | Header halaman Kontak | Amplop, surel, dan gelembung percakapan |
| `page-projects` | 1600×900 | kanan | Header halaman Proyek | Papan pajangan kosong dengan bingkai |
| `not-found` | 1600×900 | kanan | Halaman 404 dan 429 | Orang mencari sesuatu, kesan "ada yang hilang" |

Ilustrasi `service-*` dipakai di dua tempat dengan rasio 3:2, jadi satu file cukup. Di kartu, ilustrasi tampil di atas tint `#FFF0E5`, `#D91656` 10%, `#640D5F` 10%, atau `#FFB200` 25% secara bergantian.

## Menambah slot baru

Pakai komponen `<x-illustration name="..." ratio="3/2" size="1200×800" />`, dan bungkus dengan `<x-bleed side="right|left">` bila harus menembus tepi layar dan tambahkan baris di tabel di atas dalam perubahan yang sama.
