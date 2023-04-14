const tagList = document.querySelectorAll(".tag-list");

tagList.forEach((list) => {
  list.addEventListener("click", (e) => {
    if (e.target.classList.contains("tag-list")) {
      const tags = document.querySelectorAll(".tag");
      tags.forEach((t) => {
        t.style.color = "red";
      });
      const tag = e.target;
      const tagName = tag.textContent;
      const postTags = document.querySelectorAll(".tag");
    }
  });
});

function openModal(postId) {
  const modal = document.querySelector("#modalSup" + postId);
  modal.showModal();
}

function closeModal(postId) {
  const modal = document.querySelector("#modalSup" + postId);
  modal.close();
}

const modalLogin = document.getElementById("modalLogin");

window.addEventListener("scroll", () => {
  modalLogin.showModal();
});

const btnAdd = document.getElementById("showModal");
const modalAdd = document.getElementById("modalAdd");
const confirmBtn = modalAdd.querySelector("confirm-btn");

btnAdd.addEventListener("click", () => {
  modalAdd.showModal();
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

const messageInput = document.getElementById("message");

messageInput.addEventListener("input", function () {
  localStorage.setItem("message", messageInput.value);
});

const savedMessage = localStorage.getItem("message");
if (savedMessage) {
  messageInput.value = savedMessage;
}
