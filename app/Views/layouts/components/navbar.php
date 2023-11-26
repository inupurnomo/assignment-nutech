<nav class="hidden mdl:inline-flex w-full h-16 border border-b top-0 z-10">
  <div class="w-full max-w-contentContainer mx-auto flex justify-between px-8 items-center">
    <div class="text-lg font-semibold flex gap-2 flex-row justify-center items-center">
      <img src="/img/Logo.png" alt="SIMS PPOB" width="25" height="25" />
      <a href="<?= base_url() ?>" title="Dashboard">SIMS PPOB</a>
    </div>

    <div>
      <div class="flex gap-8">
        <a href="<?= base_url('topup') ?>"
          class="hover:text-red-600 duration-300 <?=(url_is('topup*')) ? 'text-red-600' : ''; ?>">Top Up</a>
        <a href="<?= base_url('history') ?>" class="hover:text-red-600 duration-300
          <?=(url_is('history*')) ? 'text-red-600' : ''; ?>">Transaction</a>
        <a href="<?= base_url('profile') ?>"
          class="hover:text-red-600 duration-300 <?=(url_is('profile*')) ? 'text-red-600' : ''; ?>">Akun</a>
      </div>
    </div>
  </div>
</nav>