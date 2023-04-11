const btnAdd = document.getElementById("showModal");
const modalAdd = document.getElementById("modalAdd");
const confirmBtn = modalAdd.querySelector("confirm-btn");

btnAdd.addEventListener("click", () => {
  modalAdd.showModal();
});

const btnSup = document.getElementById("icon-cross");
const modalSup = document.getElementById("modalSup");

btnSup.addEventListener("click", () => {
  modalSup.showModal();
});

const modalLogin = document.getElementById("modalLogin");

window.addEventListener("scroll", () => {
  modalLogin.showModal();
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

const tagList = document.querySelector(".tag-list");
const tagList1 = document.querySelector(".tag-list-1");
const tagList2 = document.querySelector(".tag-list-2");
const tag = document.querySelector(".tag");
const tag1 = document.querySelector(".tag-1");
const tag2 = document.querySelector(".tag-2");

tagList.onclick = function () {
  if (tag.classList.contains("tag")) {
    tag.classList.remove("tag");
    tag.classList.add("tag-select");
  } else {
    tag.classList.remove("tag-select");
    tag.classList.add("tag");
  }
};

tagList1.onclick = function () {
  if (tag1.classList.contains("tag")) {
    tag1.classList.remove("tag");
    tag1.classList.add("tag-select");
  } else {
    tag1.classList.remove("tag-select");
    tag1.classList.add("tag");
  }
};

tagList2.onclick = function () {
  if (tag2.classList.contains("tag")) {
    tag2.classList.remove("tag");
    tag2.classList.add("tag-select");
  } else {
    tag2.classList.remove("tag-select");
    tag2.classList.add("tag");
  }
};

const messageInput = document.getElementById("message");

messageInput.addEventListener("input", function () {
  localStorage.setItem("message", messageInput.value);
});

const savedMessage = localStorage.getItem("message");
if (savedMessage) {
  messageInput.value = savedMessage;
}
