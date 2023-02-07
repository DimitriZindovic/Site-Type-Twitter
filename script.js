const btnAdd = document.getElementById("showModal");
const modalAdd = document.getElementById("modalAdd");
const confirmBtn = modalAdd.querySelector("#confirm-btn");

btnAdd.addEventListener("click", () => {
  modalAdd.showModal();
});

const btnSup = document.getElementById("icon-bin");
const modalSup = document.getElementById("modalSup");

btnSup.addEventListener("click", () => {
  modalSup.showModal();
});

const modalLogin = document.getElementById("modalLogin");

window.addEventListener("scroll", () => {
  modalLogin.showModal();
});

const hamburger = document.querySelector(".hamburger");

hamburger.onclick = function () {
  navbar = document.querySelector(".navbar");
  navbar.classList.toogle("active");
};

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
