const postContainer = document.querySelector(".post-container");
const postComments = document.querySelector(".comment-container");
const prevNextContainer = document.querySelector(".prev-next-btn");
const postsContainer = document.querySelector(".posts-container");
const searchQuery = document.querySelector("#search-query");
const searchEl = document.querySelector(".search-el");

let pageLength = null;
let start = 0;
let end = postComments
  ? (perPage = 3)
  : postsContainer
  ? (perPage = 5)
  : searchEl
  ? (perPage = 5)
  : (perPage = 3);

async function fetchComments() {
  if (postComments) {
    const listContainer = postComments.querySelector("ul");
    const fileterID = postComments.dataset.postid;
    let markup = "";

    const res = await fetch(`script/getComments.php?postId=${fileterID}`);

    if (!res.ok) return;
    const data = await res.json();
    if (!data) return;
    pageLength = data.comment.length;

    data.comment
      .sort((a, b) => b.id - a.id)
      .slice(start, end)
      .forEach(
        (com) =>
          (markup += `
      <li>
      <div class="user-icon">
        <i class="fa-solid fa-user-plus"></i>
      </div>
      <div class="user-details">
        <h4>${com.name}</h4>
        <p>${com.date}</p>
      </div>

      <div class="user-comment">
        <p>${com.comment}</p>
      </div>
    </li>
      `)
      );

    preNextCondition();
    listContainer.innerHTML = markup;
  }
}
fetchComments();

// want to reuse this
async function getPosts() {
  const res = await fetch("script/getPosts.php");
  if (!res.ok) return;
  const data = await res.json();

  if (data) return data.post;
}

async function fetchPost() {
  if (postContainer) {
    let markup = "";
    const posts = await getPosts();

    pageLength = posts.length;
    posts
      .sort((a, b) => b.id - a.id)
      .slice(start, end)
      .forEach((post) => {
        markup += `
      <a href="post-detail.php?title=${post.title}">
      <div class="post-wrap">
        <div class="post-img">
          <img src="./admin/uploadFile/${post.upload_file}" alt="${post.title}">
        </div>

        <div class="post-stats">
          <h4>${post.title.slice(0, 50).toUpperCase()}</h4>
          <div class="post-date"><small>Post date: ${
            post.post_date
          }</small></div>
          <div class="post-desc">
            <p>${post.content.slice(0, 200)}...</p>
          </div>
        </div>
      </div>
      </a>
    `;
      });

    preNextCondition();
    postContainer.innerHTML = markup;
  }
}
fetchPost();

async function fetchPosts() {
  if (postsContainer) {
    let markup = "";
    const posts = await getPosts();

    pageLength = posts.length;
    posts
      .sort((a, b) => b.id - a.id)
      .slice(start, end)
      .forEach((post) => {
        markup += `
      <li class="post-wrap">
       <a href="post-detail.php?title=${post.title}">
         <div class="post-img">
          <img src="./admin/uploadFile/${post.upload_file}" alt="${post.title}">
        </div>

        <div class="post-stats">
          <h4>${post.title}</h4>
            <p>${post.content.slice(0, 120)}...</p>
        </div>
       </a>
      </li>
    `;
      });
    preNextCondition();
    postsContainer.innerHTML = markup;
  }
}
fetchPosts();

async function searchResults() {
  let markup = "";
  if (searchEl) {
    const res = await fetch(
      `script/search_script.php?query=${searchQuery.value}`
    );
    if (!res.ok) return;
    const data = await res.json();
    const { search } = data;

    const posts = [];
    for (let key in search) {
      posts.push(search[key]);
    }

    pageLength = posts.length;
    posts
      .sort((a, b) => b.id - a.id)
      .slice(start, end)
      .forEach(
        (post) =>
          (markup += `
      <li class="post-wrap">
       <a href="post-detail.php?title=${post.title}">
         <div class="post-img">
          <img src="./admin/uploadFile/${post.upload_file}" alt="${post.title}">
        </div>

        <div class="post-stats">
          <h4>${post.title}</h4>
            <p>${post.content.slice(0, 120)}...</p>
        </div>
       </a>
      </li>
      `)
      );

    preNextCondition();
    searchEl.innerHTML = markup;
  }
}

searchResults();

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
    postComments
      ? fetchComments()
      : postContainer
      ? fetchPost()
      : searchEl
      ? searchResults()
      : fetchPosts();
    return;
  }
  if (prev) {
    start -= perPage;
    end -= perPage;
    postComments
      ? fetchComments()
      : postContainer
      ? fetchPost()
      : searchEl
      ? searchResults()
      : fetchPosts();
    return;
  }
});

// pre next condition
function preNextCondition() {
  if (end > pageLength && pageLength !== 0) preBtn();
  if (end < pageLength && start === 0) nextBtn();
  if (end < pageLength && start !== 0) preNextBtn();
}
