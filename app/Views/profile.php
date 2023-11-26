<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<!-- nabvar -->
<?= $this->include('layouts/components/navbar') ?>
<main>
  <section class="max-w-contentContainer mx-auto px-8">
    <div class="py-8">
      <div class="flex flex-col items-center gap-5">
        <div class="relative">
          <?php
            $supported_image = array(
              'jpg',
              'png'
            );
            $src = $user['profile_image'];
            $ext = strtolower(pathinfo($src, PATHINFO_EXTENSION));
            if (in_array($ext, $supported_image)) {
              $img = $user['profile_image'];
            } else {
              $img = '/img/Profile Photo.png';
            }
          ?>
          <img src="<?= $img ?>" alt="profile" width="150" height="150">
          <a href="<?= base_url('profile/image') ?>" title="Change Profile Picture"
            class="absolute bottom-0 right-0 border rounded-full bg-white w-10 h-10 flex flex-col items-center justify-center">
            <img src="/img/pencil.png" alt="edit" width="25" height="25">
          </a>
        </div>
        <div class="text-3xl font-bold">
          <?= $user['first_name'] . ' ' . $user['last_name']; ?>
        </div>
      </div>
    </div>
    <div class="flex flex-col items-center">
      <div class="w-[70%]">
        <div class="px-8">
          <!-- alert -->
          <?php if ($session->getFlashdata('success')) { ?>
          <div id=" alert-3"
            class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
              viewBox="0 0 20 20">
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
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
              viewBox="0 0 20 20">
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
        <form class="rounded px-8 pt-6 pb-8 mb-4">

          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
              Email
            </label>
            <input
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="email" type="email" placeholder="email@email.com" value="<?= $user['email']; ?>" disabled>
          </div>
          <div class=" mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">
              Nama Depan
            </label>
            <input
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="first_name" type="text" placeholder="First" value="<?= $user['first_name']; ?>" disabled>
          </div>
          <div class=" mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">
              Nama Belakang
            </label>
            <input
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="last_name" type="text" placeholder="Last" value="<?= $user['last_name']; ?>" disabled>
          </div>
          <div class="flex flex-col gap-6 text-center">
            <a href="<?= base_url('profile/edit') ?>" title="Edit Profile"
              class="w-full border border-red-600 text-red-600  hover:bg-red-600 hover:text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline duration-300">
              Edit Profile
            </a>

            <a href="<?= base_url('logout') ?>" title="Logout"
              class="w-full border border-red-600 bg-red-600 text-white hover:bg-red-800 hover:text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline duration-300">
              Logout
            </a>

          </div>
        </form>
      </div>
    </div>
  </section>
</main>
<?= $this->endSection() ?>