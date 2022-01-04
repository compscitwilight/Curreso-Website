const aboutMeEdit = document.getElementById("about-me-edit");
const aboutMeText = document.getElementById("about-me-text");
const editProfileButton = document.getElementById("edit-btn");

let editingProfile = false;

editProfileButton.addEventListener('click', () => {
    if (!editingProfile) {
        editingProfile = true;

        aboutMeText.style.visibility = "hidden";
        aboutMeEdit.style.visibility = "visible";
    }
})
