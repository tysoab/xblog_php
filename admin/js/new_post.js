const newPostForm = document.querySelector(".newpost-form");
const popup = document.querySelectorAll(".popup");

function handleNewpostForm(e) {
  e.preventDefault();
  const input = e.target.querySelectorAll("input");
  const textarea = e.target.querySelector("textarea");

  if (!input[0].value || !input[1].value || !textarea.value) return;

  newPostForm.submit();
}

newPostForm.addEventListener("submit", handleNewpostForm);

function handleErrorMsg() {
  let timeoutId = setTimeout(() => {
    popup.forEach((msg) => (msg.style.display = "none"));
  }, 3000);

  return () => clearTimeout(timeoutId);
}

handleErrorMsg();
