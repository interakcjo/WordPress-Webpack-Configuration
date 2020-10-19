document.addEventListener("DOMContentLoaded", function () {
  const themeChangeToggle = document.querySelector(".theme-change-toggle");
  const themeChangeForm = document.querySelector(".theme-change-form");

  themeChangeToggle.addEventListener("click", function () {
    themeChangeForm.classList.toggle("active");
  });
});
