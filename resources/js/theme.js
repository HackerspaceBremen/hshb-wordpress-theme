(function () {
  const elements = document.getElementsByClassName("theme-switch");
  const set_theme = localStorage.getItem("theme");
  for (let i = 0; i < elements.length; i++) {
    if (elements[i].value === set_theme || (set_theme === null && elements[i].value === "")) {
      elements[i].checked = true;
    }
    elements[i].addEventListener("change", function(event) {
      const theme = event.target.value;
      if (theme === "") {
        localStorage.removeItem("theme");
        document.body.removeAttribute("data-theme");
      } else {
        document.body.setAttribute("data-theme", theme);
        localStorage.setItem("theme", theme);
      }
    });
  }
})();
