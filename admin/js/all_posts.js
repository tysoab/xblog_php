//elements
const allPostContainer = document.querySelector(".all-posts");
const subscribersContainer = document.querySelector(".subscribers");
const commentsContainer = document.querySelector(".comments");

const prevNextContainer = document.querySelector(".prev-next-btn");
const changeRows = document.querySelector(".change-rows select");

let start = 0;
let end = subscribersContainer
  ? (perPage = 4)
  : commentsContainer
  ? (perPage = 5)
  : (perPage = 2);
let pageLength = null;

// delete post from database
allPostContainer &&
  allPostContainer.addEventListener("click", (e) => {
    const btn = e.target.closest(".del-post");
    if (!btn) return;
    const confirmBtn = confirm("Are you Sure!, you want to delete");
    if (confirmBtn) {
      const id = btn.dataset.id;
      window.location.href = `./script/delete_post.php?id=${id}`;
    }
  });

//delete subscriber from db
subscribersContainer &&
  subscribersContainer.addEventListener("click", (e) => {
    const btn = e.target.closest(".del-subscriber");
    if (!btn) return;
    const confirmBtn = confirm("Are you Sure!, you want to delete");
    if (confirmBtn) {
      const id = btn.dataset.id;
      window.location.href = `./script/delete_subscriber.php?email=${id}`;
    }
  });

//delete comment from db
commentsContainer &&
  commentsContainer.addEventListener("click", (e) => {
    const btn = e.target.closest(".del-comment");
    if (!btn) return;
    const confirmBtn = confirm("Are you Sure!, you want to delete");
    if (confirmBtn) {
      const id = btn.dataset.id;
      window.location.href = `./script/delete_comment.php?id=${id}`;
    }
  });

async function fetchAllPosts() {
  let markup = "";

  const res = await fetch(
    "script/all_script.php?table=" + encodeURIComponent("post")
  );
  if (!res.ok) return;
  const data = await res.json();
  const { data: posts } = data;
  if (!posts.length) return;
  pageLength = posts.length;
  posts
    .sort((a, b) => b.id - a.id)
    .slice(start, end)
    .forEach(
      (post) =>
        (markup += `
        <div class="post-wrap">
            <div class="post-img">
              <img src="./uploadFile/${post.upload_file}" alt="${post.title}">
            </div>

            <div class="post-title">
              <h4>${post.title}</h4>
            </div>

            <div class="control-actions">
              <a href="./update_post.php?post_id=${post.post_id}" class="edit-post">Update</a>
              <button class="del-post" data-id="${post.post_id}">Delete</button>
            </div>
          </div>
    
    `)
    );

  preNextCondition();
  allPostContainer.innerHTML = markup;
}

allPostContainer && fetchAllPosts();

// subscribers function

async function fetchSubscribers() {
  let markup = "";
  const res = await fetch(
    "script/all_script.php?table=" + encodeURIComponent("subscribers")
  );
  if (!res.ok) return;
  const data = await res.json();
  const { data: subscriber } = data;
  pageLength = subscriber.length;
  subscriber
    .sort((a, b) => b.id - a.id)
    .slice(start, end)
    .forEach(
      (subscrib) =>
        (markup += `
      <div class="subscriber-wrap">

            <div class="subscriber-email">
              <h4>${subscrib.email}</h4>
            </div>
            

            <div class="control-actions">
              
              <button class="del-subscriber" data-id="${subscrib.email}">Delete</button>
            </div>
          </div>
  `)
    );

  preNextCondition();
  subscribersContainer.innerHTML = markup;
}

subscribersContainer && fetchSubscribers();

// comments function

async function fetchComments() {
  let markup = "";
  const res = await fetch(
    "script/all_script.php?table=" + encodeURIComponent("comments")
  );
  if (!res.ok) return;
  const data = await res.json();
  const { data: comments } = data;
  pageLength = comments.length;

  comments
    .sort((a, b) => b.id - a.id)
    .slice(start, end)
    .forEach(
      (comment) =>
        (markup += `
        <div class="comment-wrap">
            <div class="comment-title">
              <h4>${comment.name}</h4>
            <div class="control-actions">
              <button class="del-comment" data-id="${
                comment.id
              }">Delete</button>
            </div>
            </div>
            <div class="comment-detail">
              ${comment.comment.slice(0, 200)}...
            </div>
          </div>
  `)
    );

  // if (end >= pageLength && start !== -1) preBtn();
  // if (end < pageLength && start === 0) nextBtn();
  // if (end < pageLength && start !== 0) preNextBtn();
  preNextCondition();
  commentsContainer.innerHTML = markup;
}

commentsContainer && fetchComments();

function preBtn() {
  prevNextContainer.innerHTML = `<button class="prev-btn">Prev</button>`;
}

function nextBtn() {
  prevNextContainer.innerHTML = `<button class="next-btn">Next</button>`;
}

function preNextBtn() {
  prevNextContainer.innerHTML = `
  <button class="prev-btn">Prev</button>
  <button class="next-btn">Next</button>
  `;
}

prevNextContainer.addEventListener("click", (e) => {
  // console.log(e.target);
  const prev = e.target.closest(".prev-btn");
  const next = e.target.closest(".next-btn");
  if (next) {
    start += perPage;
    end += perPage;
    allPostContainer && fetchAllPosts();
    subscribersContainer && fetchSubscribers();
    commentsContainer && fetchComments();
    return;
  }
  if (prev) {
    start -= perPage;
    end -= perPage;
    allPostContainer && fetchAllPosts();
    subscribersContainer && fetchSubscribers();
    commentsContainer && fetchComments();
    return;
  }
});

function preNextCondition() {
  if (end > pageLength && pageLength !== 0) preBtn();
  if (end < pageLength && start === 0) nextBtn();
  if (end < pageLength && start !== 0) preNextBtn();
}

changeRows.addEventListener("change", () => {
  perPage = +changeRows.value;
  end = perPage;
  allPostContainer && fetchAllPosts();
  subscribersContainer && fetchSubscribers();
  commentsContainer && fetchComments();
});
