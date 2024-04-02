const toggleMenu = document.querySelector(".toggle-menu");
const newsletterForm = document.querySelector("#newsletter-form");

toggleMenu.addEventListener("click", () =>
  document.querySelector("header nav").classList.toggle("show-nav")
);

window.addEventListener("load", () => {
  const loader = document.querySelector(".loader");
  loader.classList.add("loader-hidden");

  // loader.addEventListener("transitionend", () =>
  //   document.body.removeChild("loader")
  // );
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
