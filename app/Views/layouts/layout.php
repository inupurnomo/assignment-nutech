<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

  <title>SIMS PPOB - Ilham Ibnu Purnomo</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
  <script src="/js/splide.min.js"></script>
  <link href="/css/splide.min.css" rel="stylesheet" />
  <script>
  tailwind.config = {
    darkMode: "class",
    theme: {
      maxWidth: {
        container: "1440px",
        contentContainer: "1140px",
        containerSmall: "1024px",
        containerxs: "768px",
      },
      extend: {
        animation: {
          "spin-slow": "spin 20s linear infinite",
        },
        screens: {
          xs: "320px",
          sm: "375px",
          sml: "500px",
          md: "667px",
          mdl: "768px",
          lg: "960px",
          lgl: "1024px",
          xl: "1280px",
        },
        fontFamily: {
          bodyFont: ["Montserrat", "sans-serif"],
          titleFont: ["SF Mono", "Inter", "sans-serif"],
          descFont: ["Inter", "san-serif"],
          navFont: ["Calibre", "sans-serif"],
        },
        colors: {

        },
      },
    },
  };
  </script>
</head>

<body class="overflow-x-hidden overflow-y-auto">
  <?= $this->renderSection('content'); ?>
</body>

</html>