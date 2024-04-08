const toggleMenu = document.querySelector(".toggle-menu");
const newsletterForm = document.querySelector("#newsletter-form");
const newsletterSuc = document.querySelector(".newsletter-suc");
const searchModal = document.querySelector(".search-modal");
const searchModalBtn = document.querySelector(".search-modal form");
const toggleSearch = document.querySelector(".search-container button");

let trackModal = false;

toggleSearch.addEventListener("click", () => {
  searchModal.style.top = !trackModal ? "40px" : "-240%";
  trackModal = !trackModal;
});

searchModalBtn.addEventListener("submit", (e) => {
  e.preventDefault();
  const query = e.target.querySelector("input");
  if (!query.value) return;
  searchModalBtn.submit();
});

toggleMenu.addEventListener("click", () =>
  document.querySelector("header nav").classList.toggle("show-nav")
);

window.addEventListener("load", () => {
  const loader = document.querySelector(".loader");
  loader.classList.add("loader-hidden");

  // loader.addEventListener("transitionend", () => loader.remove());
});

newsletterForm.addEventListener("submit", async (e) => {
  e.preventDefault();
  const email = e.target.querySelector("input");
  if (!email.value) return;

  const res = await fetch(
    "script/validate-newsletter.php?newsletter-email=" +
      encodeURIComponent(email.value)
  );
  // if (!res.ok) return;
  const data = await res.json();
  const { available } = data;
  console.log(available);

  if (available) {
    newsletterForm.insertAdjacentHTML(
      "afterend",
      `<p class="validate-n-email">Email already exist</p>`
    );

    setTimeout(() => {
      const toDelete = document.querySelector(".validate-n-email");
      toDelete.remove();
    }, 1500);
    return;
  }

  newsletterForm.submit();
});

// remove newsletter success element
setTimeout(() => {
  newsletterSuc.remove();
}, 2000);
