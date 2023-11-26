<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="/css/app.css"> -->
  <link rel="stylesheet" href="bs/css/bootstrap.min.css">
  <title>SIMS PPOB-Ilham</title>
</head>

<body>
  <h1 class="text-red-900 text-2xl">Test</h1>
</body>
<script>
const url = 'https://take-home-test-api.nutech-integrasi.app';

// fetch(url + '/banner', {
//     method: "get",
//     headers: {
//       "Content-Type": "application/json",
//       "X-Requested-With": "XMLHttpRequest",
//       "Authorization": "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJlbWFpbCI6InVzZXJAbnV0ZWNoLWludGVncmFzaS5jb20iLCJtZW1iZXJDb2RlIjoiTExLUjZKTDEiLCJpYXQiOjE3MDA4MTA4NDksImV4cCI6MTcwMDg1NDA0OX0.sv_LVEoGSNV2fdceSDJNxJaoe5EaiboPLuFJFiOyhSA"
//     }
//   })
//   .then((result) => result.json())
//   .then(({
//     data
//   }) => console.log(data));

async function getBanner() {
  const res = await fetch(url + '/banner', {
    method: "get",
    headers: {
      "Content-Type": "application/json",
      "X-Requested-With": "XMLHttpRequest",
      "Authorization": "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJlbWFpbCI6InVzZXJAbnV0ZWNoLWludGVncmFzaS5jb20iLCJtZW1iZXJDb2RlIjoiTExLUjZKTDEiLCJpYXQiOjE3MDA4MTA4NDksImV4cCI6MTcwMDg1NDA0OX0.sv_LVEoGSNV2fdceSDJNxJaoe5EaiboPLuFJFiOyhSA"
    }
  });
  const {
    data
  } = await res.json();
  console.log(data);
}
// getBanner();
</script>

</html>