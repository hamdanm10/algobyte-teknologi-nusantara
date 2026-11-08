# Panduan Agent: algobyte-teknologi-nusantara

Aplikasi Laravel untuk Algobyte Teknologi Nusantara. Saat ini belum ada API: antarmuka berupa Blade (sesi). Sebelum mengerjakan fitur, baca indeks dokumen lewat bagian **Referensi Dokumen** di bawah.

> `CLAUDE.md` adalah symlink ke `AGENTS.md`. Ubah hanya `AGENTS.md`.

## Konvensi Bahasa

- **Dokumentasi** (file `.md` seperti README, docs, changelog, dan catatan): gunakan **bahasa Indonesia**.
- **Kode**: gunakan **bahasa Inggris** untuk nama variabel, fungsi, class, method, route, dan komentar kode.
- **Database**: gunakan **bahasa Inggris** untuk nama tabel, kolom, index, dan migration.
- **Pesan untuk pengguna** (validasi, error, email, notifikasi): jangan ditulis langsung di kode, simpan di `lang/` dan panggil lewat `__()`/`trans()`. Locale bawaan `id` (`APP_LOCALE=id`) dan fallback `en`. Landing page dan aplikasi menyediakan dua bahasa, Indonesia (`lang/id`) dan Inggris (`lang/en`): setiap teks baru wajib ditambahkan di kedua berkas. Nama kolom di pesan validasi diatur di `attributes` pada `validation.php` tiap bahasa. Kunci terjemahan tetap bahasa Inggris.
- **Lainnya**: pesan commit, nama branch, dan identifier teknis lain menggunakan bahasa Inggris.

## Aturan Commit

Mengikuti [Angular Commit Message Convention](https://gist.github.com/nyancodeid/63f19941c81252bb0cca9c14497cf9f7), ditulis dalam bahasa Inggris. Format: `<type>(<scope>): <subject>`, tiap baris maksimal 100 karakter, `scope` opsional (bagian yang terdampak; kosongkan bila mencakup banyak bagian).

- **Type:** `build`, `ci`, `docs`, `feat`, `fix`, `perf`, `refactor`, `style`, `test`.
- **Subject:** kalimat perintah present tense, huruf kecil di awal, tanpa titik di akhir ("add ...", bukan "added ...").
- **Body** (opsional): jelaskan motivasi dan bandingkan dengan perilaku sebelumnya, dalam imperative present tense.
- **Footer:** `BREAKING CHANGE: <penjelasan>` untuk perubahan yang memutus, `Closes #123` untuk menutup issue.
- **Revert:** `revert: <header yang di-revert>` dengan body `This reverts commit <hash>.`
- Tambahkan berkas dengan nama (`git add <jalur>`), bukan `git add -A` atau `git add .`, supaya berkas yang belum diputuskan pemiliknya tidak ikut ter-commit.
- **Jangan menambahkan baris `Co-Authored-By` (termasuk Claude)** di pesan commit. Hal yang sama berlaku untuk atribusi "Generated with Claude Code" di deskripsi pull request.
- Contoh: `feat(auth): add admin login`, `fix(user): prevent duplicate email on registration`, `docs: update readme setup instructions`.

## Aturan Branch

Repo ada di `github.com/hamdanm10/algobyte-teknologi-nusantara`. Setiap fitur dikerjakan di **branch tersendiri**, dibuat dari branch `development`.

| Branch | Fungsi |
| --- | --- |
| `main` | Kode yang sudah dirilis. Tidak dikerjakan langsung. Hanya menerima merge dari `development` untuk menandai rilis. |
| `development` | Integrasi seluruh fitur dan basis untuk semua branch kerja. Tidak dikerjakan langsung. |
| `<type>/<name>` | Pengerjaan satu fitur atau perubahan. |

- Branch kerja digabung ke `development` melalui pull request, setelah fitur selesai dan test lulus.
- Satu branch hanya untuk satu fitur.
- Nama branch: bahasa Inggris, huruf kecil, `kebab-case`, berbentuk `<type>/<name>` dengan `<type>` mengikuti type commit (`feat/`, `fix/`, `docs/`, `build/`, `refactor/`, `test/`). Contoh: `feat/user-authentication`, `fix/duplicate-email-registration`.
- Saat memulai fitur, cek branch aktif dengan `git branch --show-current`. Jika belum sesuai, pindah ke `development`, ambil perubahan terbaru, lalu buat branch kerja: `git checkout development && git pull && git checkout -b feat/<name>`.
- Jika ada perubahan yang belum di-commit saat berpindah branch, jangan dibuang. Commit atau stash terlebih dahulu, dan beri tahu pengguna.
- Fitur tanpa test dianggap belum selesai dan tidak di-merge.
- Jangan force push ke `development` maupun `main`.
- Hapus branch kerja setelah berhasil di-merge.
- **Sebelum merge, agent wajib bertanya kepada pengguna dan menunggu izin.** Jika proyek sudah punya deploy otomatis, tanyakan juga: dideploy sekarang atau ditunda?

## Arsitektur Kode

- **Controller tetap bersih.** Controller hanya menerima request, memanggil Action atau Service, lalu mengembalikan response. Tidak ada logika bisnis dan validasi di dalamnya.
- **Action untuk satu use case.** Satu class Action menangani satu use case (misalnya membuat order, mengganti password). Letakkan di `app/Actions`.
- **Service untuk logic yang dipakai berulang.** Logic yang dipakai lebih dari satu tempat dipusatkan di Service class (`app/Services`). Action boleh memanggil Service.
- **Action dan Service tidak boleh bergantung pada request maupun response.** Jangan memanggil `request()`, `view()`, atau `redirect()` di dalamnya, supaya bisa dipakai ulang oleh antarmuka lain (misalnya API kelak).
- **Validasi lewat Form Request**, jangan validasi langsung di controller.
- **View tanpa logika bisnis dan query.** Data disiapkan oleh controller melalui Action atau Service.
- **Typesafe.** Pakai `declare(strict_types=1);`, type hint pada parameter, return type, dan typed property. Hindari `mixed` bila tipe yang lebih spesifik memungkinkan.
- **Konfigurasi.** Jangan memanggil `env()` di luar `config/*` karena `config:cache` membuatnya `null`. Pengaturan baru lewat berkas config.
- **Hindari N+1.** Relasi yang dipakai view wajib di-`with()` di Action. Kolom yang dicari, disaring, atau diurutkan harus punya index di migration (PostgreSQL tidak membuat index otomatis untuk foreign key).
- **Data sensitif.** Token, password, dan nomor telepon tidak boleh masuk log maupun response yang tidak semestinya.

## Route

- Utamakan `Route::resource()` (atau `Route::singleton()`) dibanding mendefinisikan `GET`, `POST`, dan sebagainya satu per satu. Definisi satu per satu hanya jika aksi tidak cocok dengan pola resource.
- Jangan memakai route closure karena menghalangi `route:cache`. Selalu arahkan ke controller.
- Bila route bertambah banyak, pecah satu file per **fitur** di subfolder `routes/`, bukan satu file besar.

## Testing

- **Setiap fitur wajib memiliki test**, ditulis di branch yang sama dengan fiturnya.
- Framework: PHPUnit (`php artisan test` atau `composer test`).
- **Feature test** (`tests/Feature`) untuk alur HTTP: route, middleware, Form Request, dan response. **Unit test** (`tests/Unit`) untuk logic murni di Action dan Service.
- Cakup jalur berhasil, jalur gagal (validasi, akses ditolak, tidak terautentikasi), dan kasus batas.
- Perbaikan bug disertai test yang gagal sebelum perbaikan dan lulus sesudahnya.
- Semua test harus lulus sebelum commit dan sebelum merge.
- Test tidak boleh menyentuh data asli. Gunakan database terpisah untuk test, dan jangan menulis migration atau query yang hanya jalan di satu jenis database bila aplikasi memakai jenis lain.
- Setiap daftar data yang punya relasi wajib punya test yang memastikan jumlah query tidak bertambah saat baris bertambah.

## Tooling

| Tool | Perintah | Fungsi |
| --- | --- | --- |
| Pint | `vendor/bin/pint --test` | Memeriksa gaya kode (tanpa mengubah file) |
| PHPUnit | `composer test` | Menjalankan test |

- Sebelum commit jalankan Pint dan test. Untuk merapikan gaya kode, jalankan `vendor/bin/pint`.
- Analisis statis (Larastan) belum terpasang. Bila ditambahkan, catat perintahnya di tabel ini dan jangan menyembunyikan galat dengan `@phpstan-ignore` atau baseline.

## Panduan Perilaku Coding

Mengikuti [Karpathy Guidelines](https://x.com/karpathy/status/2015883857489522876) (plugin `andrej-karpathy-skills`): condong ke kehati-hatian daripada kecepatan; untuk tugas sepele, gunakan pertimbangan.

1. **Pikirkan sebelum menulis kode.** Nyatakan asumsi, tanyakan jika ragu, sampaikan semua interpretasi dan pendekatan yang lebih sederhana, jangan memilih secara diam-diam.
2. **Sederhana dulu.** Kode seminimal mungkin. Jangan menambah fitur, abstraksi, atau konfigurasi yang tidak diminta, dan jangan menangani skenario error yang mustahil.
3. **Perubahan bedah.** Ubah hanya yang diperlukan dan ikuti gaya yang ada. Jangan merapikan kode di sekitarnya yang tidak terkait. Hapus hanya yang menjadi tidak terpakai akibat perubahan sendiri. Setiap baris yang berubah harus bisa ditelusuri ke permintaan pengguna.
4. **Eksekusi berbasis tujuan.** Ubah tugas menjadi tujuan yang bisa diverifikasi ("perbaiki bug" menjadi "tulis test yang mereproduksi bug, lalu buat lulus"). Untuk tugas multi-langkah, tulis rencana singkat beserta cara verifikasi tiap langkah.

## Referensi Dokumen

**Mengubah fitur berarti mengubah dokumennya, di branch yang sama.** Setiap perubahan perilaku (route, aturan, alur, status) harus diikuti pembaruan semua dokumen yang membahasnya. Sebelum membuka PR, cari dengan `grep -rn` nama route atau istilah fitur di `docs/`, lalu perbarui yang menyebutnya. Sebut di ringkasan PR dokumen mana yang diubah.

Dokumen rancangan ada di `docs/`, per fitur, dengan satu `implementation-plan.md` sebagai indeks. **Baca indeks, lalu hanya dokumen fitur yang relevan**, bukan seluruh folder. Kapan menulis dokumen baru dan seberapa panjang: bagian "Kapan menulis dokumen" di [`docs/README.md`](docs/README.md).

| Dokumen | Isi |
| --- | --- |
| [`docs/README.md`](docs/README.md) | Peta dokumentasi dan panduan menulis dokumen |
| [`docs/implementation-plan.md`](docs/implementation-plan.md) | Indeks fitur: status, urutan fase, tautan ke dokumen fitur |
