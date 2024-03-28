//elements
const loginForm = document.querySelector("#login");
const LoginErrorMsg = document.querySelector(".error-msg");

function handleLogin(e) {
  e.preventDefault();
  const input = e.target.querySelectorAll("input");
  if (!input[0].value || !input[1].value) {
    LoginErrorMsg.innerHTML = "<p>All fields is required!</p>";
    LoginErrorMsg.style.display = "block";
    const timeoutId = setTimeout(() => {
      LoginErrorMsg.innerHTML = "";
      LoginErrorMsg.style.display = "none";
    }, 3000);
    return () => clearTimeout(timeoutId);
  }

  loginForm.submit();
}

loginForm.addEventListener("submit", handleLogin);
