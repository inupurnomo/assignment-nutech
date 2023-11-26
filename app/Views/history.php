<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<!-- nabvar -->
<?= $this->include('layouts/components/navbar') ?>

<!-- header -->
<?= $this->include('layouts/components/header') ?>
<main>
  <section class="max-w-contentContainer mx-auto px-8">
    <div class="">Semua Transaksi</div>
    <div class="mt-3 flex py-2 gap-4">
      <div id="data" class="w-full flex flex-col gap-6">
        <?php foreach($history as $h) { ?>
        <div class="border rounded w-full h-16">
          <div class="flex justify-between px-4 py-2">
            <div class="flex flex-col">
              <span
                class="text-xl font-semibold <?= ($h['transaction_type'] == 'TOPUP') ? 'text-green-600' : 'text-orange-500' ?>">
                <?= ($h['transaction_type'] == 'TOPUP') ? '+' : '-'?>
                Rp <?= number_format($h['total_amount'],2,',','.') ?></span>
              <span class=" text-xs">
                <!-- convert date to local -->
                <?php 
                  $dt = new DateTime($h['created_on']);

                  // change the timezone of the object without changing its time
                  $dt->setTimezone(new DateTimeZone('Asia/Jakarta'));

                  // format the datetime
                  echo $dt->format('d-m-Y H:i:s T');
                  ?>
              </span>
            </div>
            <div>
              <span class="text-sm"><?= $h['description'] ?></span>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
    <div id="loadMore" onclick="cobaTest()"
      class="w-full flex justify-center font-semibold text-red-600 mt-2 hover:text-red-900 hover:cursor-pointer mb-16">
      Show
      more</div>
  </section>
</main>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
let offset = 6;

async function loadMore() {
  var url =
    "https://take-home-test-api.nutech-integrasi.app/transaction/history?offset=" +
    offset +
    "&limit=5";
  // Default options are marked with *
  const response = await fetch(url, {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
      Authorization: "Bearer " +
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJlbWFpbCI6ImRpZ2dlckBkaWdnZXIuY29tIiwibWVtYmVyQ29kZSI6IkxQRFpHOEs0IiwiaWF0IjoxNzAwOTk2MTA5LCJleHAiOjE3MDEwMzkzMDl9.HwQhjWsgpPZ34i37Xp_V-woRpNm3L4rJ2ixPtEoy_SY",
    },
  });
  offset = offset + 5;

  return response.json();
}

function convertRp(number) {
  return new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR"
  }).format(number);
}

function cobaTest() {
  loadMore().then((data) => {
    let style;
    let type;
    Object.values(data.data.records).forEach(function(key, index) {
      if (key.transaction_type == "TOPUP") {
        style = "text-green-600";
        type = "+";
      } else {
        style = "text-orange-600";
        type = "-";
      }

      let d = new Date(key.created_on);
      var date = d.getDate() + "-" + (d.getMonth() + 1) + "-" + d.getFullYear() + " " +
        d.getHours() + ":" + d.getMinutes();

      $('#data').append(`
            <div class="border rounded w-full h-16">
              <div class="flex justify-between px-4 py-2">
                <div class="flex flex-col">
                  <span class="text-xl font-semibold ` + style + `"
                    >` + type + ` ` + convertRp(key.total_amount) + `</span
                  >
                  <span class="text-xs">` + date + ` WIB</span>
                </div>
                <div>
                  <span class="text-sm">` + key.description + `</span>
                </div>
              </div>
            </div>
            `)
    });
  });
}
</script>
<?= $this->endSection(); ?>