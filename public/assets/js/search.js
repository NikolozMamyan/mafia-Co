const searchBar = document.querySelector("#search-bar");
const searchBarSubmit = document.querySelector("#search-bar-submit");

const searchFilters = () => {
  const filtersList = document.querySelector("#filtersList");
  filtersList.classList.toggle("d-none");
};

const send = () => {
  ajax({
    method: "POST",
    url: "SearchController.php",
    headers: {},
    data: {},
  })
    .then((response) => {
      console.log("Success:", response);
    })
    .catch((error) => {
      console.error("Error:", error);
    });
};
