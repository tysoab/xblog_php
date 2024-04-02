const postContainer = document.querySelector(".post-container");
const postComments = document.querySelector(".comment-container");

if (postComments) {
  async function fetchComments() {
    const listContainer = postComments.querySelector("ul");
    const fileterID = postComments.dataset.postid;
    console.log(fileterID);
    let markup = "";
    const res = await fetch(
      "script/getComments.php?post_id=" + encodeURIComponent(fileterID)
    );
    if (!res.ok) return;
    console.log(res);
    const data = await res.json();
    if (!data) return;
    console.log(data);

    data.comment
      .sort((a, b) => b.id - a.id)
      .forEach(
        (comment) =>
          (markup += `
        <li>
      <div class="user-icon">
        <i class="fa-solid fa-user-plus"></i>
      </div>
      <div class="user-details">
        <h4>${comment.name}</h4>
        <p>${comment.date}</p>
      </div>

      <div class="user-comment">
        <p>${comment.comment}</p>
      </div>
    </li>
      `)
      );

    listContainer.innerHTML = markup;
  }
  fetchComments();
}

if (postContainer) {
  async function fetchPost() {
    let markup = "";
    const res = await fetch("script/getPosts.php");
    if (!res.ok) return;
    const data = await res.json();
    if (!data) return;

    data.post
      .sort((a, b) => b.id - a.id)
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

    postContainer.innerHTML = markup;
  }

  fetchPost();
}
