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
        </div>
        <div class="text-3xl font-bold">
          <?= $user['first_name'] . ' ' . $user['last_name']; ?>
        </div>
      </div>
    </div>
    <div class="flex flex-col items-center">
      <div class="w-[80%] md:w-[70%]">
        <form action="<?= base_url('/profile/image'); ?>" method="POST" enctype="multipart/form-data"
          class="rounded px-0 md:px-8 pt-6 pb-8 mb-4">
          <div class="mb-6">
            <input type="file" name="profile_image" id="profile_image"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          </div>
          <div class="flex flex-col gap-6 text-center">
            <button
              class="w-full border border-red-600 bg-red-600 text-white hover:bg-red-800 hover:text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline duration-300"
              type="submit">
              Simpan
            </button>
            <button onclick="history.back()"
              class="w-full border border-red-600 text-red-600  hover:bg-red-600 hover:text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline duration-300"
              type="button">
              Batalkan
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>
</main>
<?= $this->endSection() ?>