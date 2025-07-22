import.meta.glob([
  '../images/**',
  '../fonts/**',
]);

(function () {
  const theme = localStorage.getItem("theme");
  if (theme !== null) {
    document.body.setAttribute("data-theme", theme);
  }
})();
