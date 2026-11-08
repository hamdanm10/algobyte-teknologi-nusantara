# Peta Dokumentasi

Dokumen proyek dikelompokkan per **fitur**, supaya mudah dibaca dan dirawat. Isi dokumen berbahasa Indonesia, nama folder dan berkas berbahasa Inggris.

## Susunan

```
docs/
├── README.md                  peta ini
├── implementation-plan.md     indeks: status, urutan fase, tautan ke dokumen fitur
└── <feature>/                 satu folder per fitur, dibuat saat fitur pertama ditulis
    └── overview.md
```

Kelompokkan folder fitur ke dalam grup bila jumlahnya sudah banyak (contoh `docs/shared/` untuk fitur yang dipakai lebih dari satu bagian aplikasi, atau `docs/roles/<peran>/` bila peran pengguna sudah ada). Jangan membuat folder kosong lebih dulu.

Dokumen lintas-topik yang bukan fitur (contoh `setup.md`, `deploy.md`, `ci-cd/`) ditaruh langsung di `docs/` dan ditambahkan ke tabel di bawah.

## Daftar indeks

| Area | Indeks | Isi |
| --- | --- | --- |
| Fitur | [`implementation-plan.md`](implementation-plan.md) | Status dan tautan dokumen fitur |

## Aturan menulis dokumen

- Fitur baru: buat folder fitur di `docs/`, dan tambahkan baris di `implementation-plan.md`.
- Satu dokumen satu topik. Dokumen yang melewati sekitar 250 baris dipecah.
- Status fase dicatat di indeks. Dokumen fitur memuat rancangan, aturan, dan langkah pengerjaannya.
- Tautan antar dokumen memakai jalur relatif.

## Kapan menulis dokumen dan seberapa panjang

### Kapan

- **Tulis** untuk fitur yang punya keputusan atau alur lintas berkas (beberapa route, tabel, atau Action). Rancangan ditulis **sebelum** kode, supaya keputusan bisa ditinjau lebih dulu.
- **Jangan tulis** untuk perbaikan bug, penyesuaian tampilan, refactor kecil, atau penambahan field. Cukup pesan commit dan test.
- Jika topiknya sudah punya dokumen, **ubah dokumen itu**, jangan membuat yang baru.

### Isi

Masukkan hal yang tidak bisa dibaca dari kode:

- **Keputusan** dan alasannya, termasuk pilihan yang ditolak.
- **Alur** langkah demi langkah (diagram atau daftar bernomor).
- **Aturan keamanan dan kasus tepi** (throttle, akun belum terverifikasi, dan sebagainya).
- **Struktur kode** secara ringkas: Action, Service, controller, dan route yang terlibat.
- **Langkah pengerjaan** dan daftar test yang harus ada.
- **Ditunda**: hal yang sengaja belum dikerjakan.

Jangan masukkan:

- Salinan kode atau daftar berkas yang bisa dilihat di repo.
- Status pengerjaan di dokumen fitur. Status hanya di indeks.

### Panjang

- Target **60 sampai 150 baris**, maksimal sekitar 250. Lebih dari itu, pecah per topik.
- Setelah fitur selesai, **pangkas** dokumennya menjadi keputusan, alur, dan aturan keamanan. Bagian "langkah pengerjaan" boleh dibuang.

### Kerangka

```
# Judul Fitur

Satu paragraf: apa dan untuk siapa.

## Keputusan
## Alur
## Aturan keamanan dan kasus tepi
## Struktur kode
## Langkah dan test
## Ditunda
```
