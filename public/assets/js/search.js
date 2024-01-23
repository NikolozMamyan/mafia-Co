const searchBar = document.querySelector("#search-bar");
const form = document.forms.search;


const searchFilters = () => {
  const filtersList = document.querySelector("#filtersList");
  filtersList.classList.toggle("d-none");
};

// const fetchAllUsers = async () => {
//   try {
//     const response = await fetch('');
//     const data = await response.json();
//     console.log(data);
//   } catch (error) {
//     console.error(error);
//   }
// };

// const createSearchQuery = () => {
//   const searchResult = searchBar.value || '';
//   const filter = Array.from(document.querySelectorAll('.checkbox-Primary:checked')).map(checkbox => checkbox.value);

//   return JSON.stringify({ searchResult, filter });
// };

// const handleSubmit = async (e) => {
//   e.preventDefault();

//   const queryJSON = createSearchQuery();

//   const options = {
//     method: 'POST',
//     body: queryJSON,
//     headers: {
//       'Content-Type': 'application/json'
//     }
//   };

//   try {
//     const response = await fetch('', options);
//     console.log(response);
//     const data = await response.json();
//     fetchAllUsers();
//   } catch (error) {
//     console.error(error);
//   }
// };

// form.addEventListener("submit", handleSubmit);
