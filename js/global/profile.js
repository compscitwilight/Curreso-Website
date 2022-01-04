const aboutMeEdit = document.getElementById("about-me-edit");
const editProfileButton = document.getElementById("edit-btn");

let editingProfile = false;

editProfileButton.addEventListener('click', () => {
    if (!editingProfile) {
        editingProfile = true;

        aboutMeEdit.style.visibility = "visbile";
    } else {
        editingProfile = false;

        aboutMeEdit.style.visibility = "hidden";
    }
})
