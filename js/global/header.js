/*
Header script for interacting with the header.
*/

const searchBar = document.getElementById("search-bar");
const searchBarContent = document.getElementById("search-bar-content");

searchBar.addEventListener("focusin", () => {
    searchBarContent.style.visibility = "visible";
});

searchBar.addEventListener('focusout', () => {
    searchBarContent.style.visibility = "hidden";
});
