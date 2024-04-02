// element
const commentForm = document.querySelector(".comment-form");
const errorMsg = document.querySelector(".error-msg");
const commentStat = document.querySelector(".comment-stat");

// remove the comment
function handleComment() {
  const timeoutId = setTimeout(() => {
    commentStat.style.display = "none";
  }, 2000);

  return () => clearTimeout(timeoutId);
}

handleComment();

function removeErrorMsg() {
  const timeoutId = setTimeout(() => {
    errorMsg.style.right = "-100%";
  }, 2000);

  return () => clearTimeout(timeoutId);
}

commentForm.addEventListener("submit", (e) => {
  e.preventDefault();
  const name = e.target.querySelector("#name");
  const comment = e.target.querySelector("#comment");

  if (!name.value || !comment.value) {
    errorMsg.textContent = "All fields is requred!";
    errorMsg.style.right = 0;
    removeErrorMsg();
    return;
  }

  commentForm.submit();
});
