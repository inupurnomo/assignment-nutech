<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<main>
  <section class="w-full min-h-screen mx-auto flex justify-between gap-2">
    <div class="w-full flex justify-center">
      <div class="w-[80%] md:w-1/2 px-20 px-20 flex flex-col items-center justify-center text-center my-4">
        <div class="w-full h-full flex flex-col justify-center">
          <div class="px-0 lg:px-8">
            <!-- alert -->
            <?php if ($session->getFlashdata('success')) { ?>
            <div id="alert-3"
              class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
              role="alert">
              <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
              </svg>
              <span class="sr-only">Info</span>
              <div class="ms-3 text-sm font-medium">
                <?= $session->getFlashdata('success') ?>
              </div>
              <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                  viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
              </button>
            </div>
            <?php } ?>
            <?php if ($session->getFlashdata('error')) { ?>
            <div id="alert-2"
              class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
              role="alert">
              <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
              </svg>
              <span class="sr-only">Info</span>
              <div class="ms-3 text-sm font-medium">
                <?= $session->getFlashdata('error'); ?>
              </div>
              <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-2" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                  viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
              </button>
            </div>
            <?php } ?>
          </div>
          <div class="flex justify-center gap-2">
            <img src="/img/Logo.png" alt="logo" width="40" height="40" />
            <div class="text-3xl font-semibold">SIMS PPOB</div>
          </div>
          <div class="text-4xl font-semibold mt-10 px-0 xl:px-40">
            Lengkapi data untuk membuat akun
          </div>
          <div class="flex flex-col items-center justify-center py-2 px-0 lg:px-8">
            <form action="<?= base_url('registerAction') ?>" method="POST" class="w-full flex flex-col gap-y-6 mt-10">
              <input id="email" name="email" type="email" autocomplete="email" placeholder="masukan email anda"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-3 py-2"
                value="<?= old('email') ?>" />
              <input id="first_name" name="first_name" type="first name" autocomplete="first name"
                value="<?= old('first_name') ?>" placeholder="nama depan"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-3 py-2" />
              <input id="last_name" name="last_name" type="last name" autocomplete="last name"
                value="<?= old('last_name') ?>" placeholder="nama belakang"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-3 py-2" />
              <input id="password" name="password" type="password" placeholder="buat password"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-3 py-2" />
              <input id="password2" name="password2" type="password" placeholder="konfirmasi password"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-3 py-2" />
              <div class="mt-4 items-center justify-center">
                <button type="submit"
                  class="rounded-md w-full bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                  Registrasi
                </button>
              </div>
            </form>
            <div class="mt-6">
              belum punya akun? registrasi <a href="<?= base_url('login') ?>" title="Registrasi"
                class="text-red-600 font-semibold">di sini</a>
            </div>
          </div>
        </div>
      </div>
      <div class="hidden md:block md:w-1/2">
        <div class="bg-cover bg-center w-full h-full" style="background-image: url('/img/Illustrasi\ Login.png');">
        </div>
      </div>
    </div>
  </section>
</main>
<?= $this->endSection() ?>