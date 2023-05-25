const modalLogin = document.getElementById("modalLogin");

window.addEventListener("scroll", () => {
  modalLogin.showModal();
});

const tagListItems = document.querySelectorAll(".tag-list");
const resetButton = document.getElementById("reset-btn");
const posts = document.querySelectorAll(".card-post");
const tags = document.querySelectorAll(".tag");

tagListItems.forEach((tagListItem, index) => {
  tagListItem.addEventListener("click", (event) => {
    const selectedTag = tagListItem.textContent.toLowerCase();

    posts.forEach((post) => {
      const postTag = post
        .querySelector(".tag")
        .textContent.toLowerCase()
        .trim();
      if (selectedTag === "" || postTag === selectedTag) {
        post.style.display = "block";
        tags.forEach((t) => {
          t.style.color = `var(--color-tag-${selectedTag})`;
        });
      } else {
        post.style.display = "none";
      }
    });
  });
});

resetButton.addEventListener("click", (event) => {
  event.preventDefault();

  posts.forEach((post) => {
    post.style.display = "block";
  });

  tags.forEach((t) => {
    t.style.color = `var(--color-app)`;
  });
});

const hamburger = document.querySelector(".hamburger");
const navBar = document.querySelector(".nav-bar");
const lines = document.querySelectorAll(".line");

hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("active");
  navBar.classList.toggle("active");
});

window.addEventListener("click", (event) => {
  if (
    navBar.classList.contains("active") &&
    !event.target.closest(".nav-bar") &&
    !event.target.closest(".hamburger")
  ) {
    hamburger.classList.remove("active");
    navBar.classList.remove("active");
  }
});

function openModal(postId) {
  const modal = document.querySelector(".modalSup" + postId);
  modal.showModal();
}

function closeModal(id) {
  const modal = document.querySelector(".modalSup" + id);
  modal.close();
}

const btnAdd = document.getElementById("showModal");
const modalAdd = document.getElementById("modalAdd");
const cancelBtn = modalAdd.querySelector(".cancel-btn");

btnAdd.addEventListener("click", () => {
  modalAdd.showModal();
});

cancelBtn.addEventListener("click", () => {
  modalAdd.close();
});

const messageInput = document.getElementById("message");

messageInput.addEventListener("input", function () {
  localStorage.setItem("message", messageInput.value);
});

const savedMessage = localStorage.getItem("message");
if (savedMessage) {
  messageInput.value = savedMessage;
}
