<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<!-- nabvar -->
<?= $this->include('layouts/components/navbar') ?>

<!-- header -->
<?= $this->include('layouts/components/header') ?>
<main>
  <section class="max-w-contentContainer mx-auto px-8">
    <div class="">Silahkan masukan</div>
    <div class="text-2xl font-semibold">Nominal Top Up</div>
    <div class="mt-6">
      <!-- alert -->
      <?php if ($session->getFlashdata('success')) { ?>
      <div id="alert-3"
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

      <div class="mt-6 flex py-2 gap-4">
        <div class="w-3/5">
          <div class="w-full">
            <form action="<?= base_url('topupAction') ?>" method="POST" class="flex flex-col">
              <input id="top_up_amount" onchange="checkValue()" name="top_up_amount" type="number"
                class="block w-full rounded-sm border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-slate-600 sm:text-sm sm:leading-6 px-3 py-2" />
              <div class="mt-4 items-center justify-center">
                <button id="btn-topup" type="submit"
                  class="rounded-sm w-full py-2 text-md font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 duration-900 bg-red-600 px-3 opacity-50"
                  disabled>
                  Top Up
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="w-2/5 flex flex-col gap-y-3">
          <div class="w-full flex gap-1.5">
            <button id="btn1" type="button" onclick="addBalance(10000)"
              class=" border rounded-sm w-24 py-2 hover:bg-gray-200"">Rp10.000</button>
            <button id=" btn2" type="button" onclick="addBalance(20000)"
              class="border rounded-sm w-24 py-2 hover:bg-gray-200">Rp20.000</button>
            <button id="btn3" type="button" onclick="addBalance(50000)"
              class="border rounded-sm w-24 py-2 hover:bg-gray-200 duration-300">Rp50.000</button>
          </div>
          <div class="w-full flex gap-1.5">
            <button id="btn4" type="button" onclick="addBalance(100000)"
              class="border rounded-sm w-24 py-2 hover:bg-gray-100 duration-300">Rp100.000</button>
            <button id="btn5" type="button" onclick="addBalance(250000)"
              class="border rounded-sm w-24 py-2 hover:bg-gray-100 duration-300">Rp250.000</button>
            <button id="btn6" type="button" onclick="addBalance(500000)"
              class="border rounded-sm w-24 py-2 hover:bg-gray-100 duration-300">Rp500.000</button>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<script>
function checkValue() {
  var input = document.getElementById('top_up_amount');
  var btnTopup = document.getElementById('btn-topup');

  if (input.value) {
    btnTopup.disabled = false;
    btnTopup.classList.remove('opacity-50');
  } else {
    btnTopup.disabled = true;
    btnTopup.classList.add('opacity-50');
  }
}

function addBalance(amount) {
  var input = document.getElementById('top_up_amount');
  var btnTopup = document.getElementById('btn-topup');
  input.value = amount;
  btnTopup.disabled = false;
  btnTopup.classList.remove('opacity-50');
}
</script>

<?= $this->endSection() ?>