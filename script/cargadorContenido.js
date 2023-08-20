
function savePageState(state) {
    localStorage.setItem("pageState", JSON.stringify(state));
  }


  function loadContent(url) {
    const pageContentWrapper = document.getElementById("page-content-wrapper");
    fetch(url)
      .then(response => response.text())
      .then(content => {
        pageContentWrapper.innerHTML = content;


        const currentState = {
          url: url,
          content: content
        };
        savePageState(currentState);
      })
      .catch(error => {
        console.error("Error loading content:", error);
      });
  }