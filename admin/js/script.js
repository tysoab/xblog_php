// element

const userIcon = document.querySelector(".user-icon");
const toggleMenu = document.querySelector(".toggle-container");

userIcon.addEventListener("click", function () {
  document.querySelector(".user-profile-card").classList.toggle("show-profile");
});

toggleMenu.addEventListener("click", () => {
  document
    .querySelectorAll(".colapse")
    .forEach((col) => col.classList.toggle("hidden"));

  document.querySelector("aside").classList.toggle("toggle-aside");
  document.querySelector("main").classList.toggle("toggle-main");
  document.querySelector(".logo").classList.toggle("toggle-logo");
  document
    .querySelectorAll(".link-icon")
    .forEach((linkIcon) => linkIcon.classList.toggle("hidden"));
});
