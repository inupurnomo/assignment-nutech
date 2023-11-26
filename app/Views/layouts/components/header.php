<header class="overflow-hidden max-w-contentContainer mx-auto flex flex-col md:flex-row px-8 py-8">
  <div class="w-full h-full flex flex-col md:flex-row items-center justify-center">
    <div class="w-full h-full md:w-1/3">
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
      <img src="<?= $img ?>" alt="profile" width="50" height="50" />
      <div class="mt-2">Selamat datang,</div>
      <div class="text-2xl font-semibold"><?= $user['first_name'] . ' ' . $user['last_name']; ?></div>
    </div>
    <div class="w-full h-full md:w-2/3">
      <div class="w-full relative flex justify-end">
        <img src="/img/Background Saldo.png" alt="logo" width="800" height="100">
        <div class="absolute top-0 left-0 w-full h-full flex flex-col justify-center text-white px-4">
          <div class="">Saldo anda</div>
          <div class="py-0 lg:py-3 text-xl lg:text-2xl font-bold">Rp
            <span id="myBalance" data-value="<?= number_format($balance['balance'],2,',','.') ?>">•••••••</span>
          </div>
          <a id="btnBalance" onclick="showBalance()"
            class="text-xs md:text-sm md:mt-2 lg:mt-3 hover:cursor-pointer show">Lihat
            Saldo</a>
        </div>
      </div>
    </div>
  </div>
</header>

<script>
function showBalance() {
  var myBalance = document.getElementById('myBalance');
  var btn = document.getElementById('btnBalance');
  btn.classList.toggle('show');
  btn.classList.toggle('hide');

  myBalance.textContent = btn.classList.contains('show') ? "•••••••" : myBalance.dataset.value;
  btn.textContent = btn.classList.contains('show') ? "Lihat Saldo" : "Tutup Saldo"
  // var data = document.getElementById('myBalance').dataset.value;
  // alert(data);
}
</script>