<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<!-- nabvar -->
<?= $this->include('layouts/components/navbar') ?>

<!-- header -->
<?= $this->include('layouts/components/header') ?>
<main>
  <section class="max-w-contentContainer mx-auto">
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
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
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
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
        </button>
      </div>
      <?php } ?>
    </div>
    <div class="w-full mx-auto px-8 flex justify-between gap-2 grid grid-cols-6 xl:grid-cols-12">
      <?php foreach ($services as $s) { ?>
      <div class="flex flex-col items-center">
        <a href="<?= base_url('service/' .$s['service_code']);?>">
          <img src="<?= $s['service_icon'] ?>" alt="<?= $s['service_name'] ?>" />
        </a>
        <div class="text-center text-sm mt-1"><?= $s['service_name'] ?></div>
      </div>
      <?php } ?>
    </div>
  </section>
  <section class="max-w-contentContainer mx-auto px-8 flex flex-col justify-between gap-2 mt-5 pt-5">
    <div class="font-semibold">Temukan promo menarik</div>
    <div class="mt-2 mb-4">
      <div class="splide" aria-label="Banner">
        <div class="splide__track">
          <ul class="splide__list">
            <?php foreach($banner as $b) { ?>
            <div class="splide__slide">
              <div class="mx-1">
                <img src="<?= $b['banner_image'] ?>" alt="<?= $b['banner_name'] ?>" title="<?= $b['description'] ?>" />
              </div>
            </div>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </section>
</main>
<script>
var splide = new Splide(".splide", {
  type: "loop",
  perPage: 4,
  perMove: 1,
});

splide.mount();
</script>
<?= $this->endSection() ?>