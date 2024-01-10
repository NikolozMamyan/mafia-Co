(() => {
  let activeEL = document.querySelector("#view-home");

  document.querySelectorAll("button").forEach((e) => {
    e.addEventListener("click", onButtonClick);
  });

  function onButtonClick(e) {
    if (activeEL) {
      if (activeEL != e.currentTarget) {
        activeEL.classList.remove("active");
      }
    }

    activeEL = e.currentTarget;
    activeEL.classList.add("active");
  }
})();
