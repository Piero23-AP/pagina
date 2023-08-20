
function toggleMenu() {
    const wrapper = document.getElementById("wrapper");
    const menuCheckbox = document.getElementById("menu-checkbox");
    const menuSpans = document.querySelectorAll("#sidebar-wrapper span");
    const menuPElements = document.querySelectorAll(".menu-p");
    const subMenuElements = document.querySelectorAll(".sub-menu");
    const hrElements = document.querySelectorAll("hr");
    const iconElements = document.querySelectorAll(".list-group-item i");
    const showHideButton = document.getElementById("show-hide-menu");

    wrapper.classList.toggle("menu-open", menuCheckbox.checked);

    menuSpans.forEach(span => {
      span.style.display = menuCheckbox.checked ? "none" : "inline-block";
    });

    menuPElements.forEach(menuP => {
      menuP.style.width = menuCheckbox.checked ? "auto" : "257px";
    });

    subMenuElements.forEach(subMenu => {
      subMenu.style.width = menuCheckbox.checked ? "auto" : "257px";
    });

    hrElements.forEach(hr => {
      hr.style.display = menuCheckbox.checked ? "none" : "block";
    });

    iconElements.forEach(icon => {
      icon.style.display = menuCheckbox.checked ? "none" : "inline-block";
    });

    if (menuCheckbox.checked) {
      showHideButton.style.display = "none";
    } else {
      const windowWidth = window.innerWidth;
      if (windowWidth <= 1000) {
        showHideButton.style.display = "block";
      } else {
        showHideButton.style.display = "none";
      }
    }
  }

  function toggleMenuVisibility() {
    const menuCheckbox = document.getElementById("menu-checkbox");
    menuCheckbox.checked = !menuCheckbox.checked;
    toggleMenu();
  }

  window.addEventListener("resize", function() {
    const windowWidth = window.innerWidth;
    const menuCheckbox = document.getElementById("menu-checkbox");
    const showHideButton = document.getElementById("show-hide-menu");

    if (windowWidth <= 1600) {
      menuCheckbox.checked = true;
      if (!menuCheckbox.checked) {
        showHideButton.style.display = "block";
      }
    } else {
      menuCheckbox.checked = false;
      showHideButton.style.display = "none";
    }

    toggleMenu();
  });


  window.addEventListener("load", function() {
    window.dispatchEvent(new Event("resize"));
  });