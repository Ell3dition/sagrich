//detectar url actual
const url = window.location.href;
const url_actual = url.split("/");
const abrir_sidebar = "menu-is-opening menu-open";
const ul = document.querySelector(".sidebar nav ul");
const listLi = document.querySelectorAll(".sidebar nav ul li");


listLi.forEach((li) => {
  const url_li = li.querySelector("a").getAttribute("href");

  if (url_li == url_actual[url_actual.length - 1]) {
    li.children[0].classList.add("active");
    li.parentElement.parentElement.children[0].classList.add("active");
    li.parentElement.parentElement.classList.add("menu-open");
  }
});
