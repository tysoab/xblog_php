//elements

const deleteBtn = document.querySelectorAll(".del-post");
console.log(deleteBtn);

deleteBtn.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    const confirmBtn = confirm("Are you Sure!, you want to delete");
    if (confirmBtn) {
      const id = e.target.dataset.id;
      window.location.href = `./script/delete_post.php?id=${id}`;
    }
  });
});
