const subMenus = document.querySelectorAll(".sub-menu");
subMenus.forEach(subMenu => {
  const menuItem = subMenu.previousElementSibling;
  menuItem.addEventListener("click", () => {
    subMenu.classList.toggle("active");
  });
});