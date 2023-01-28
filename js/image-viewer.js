let imageModal = document.getElementById("myModal");
let modalImg = document.getElementById("modalImg");

for (let i = 0; i < imageModal.length; i++) {
    let img = document.getElementsByClassName("img-clickable")[i];

    img.onclick = function () {
        imageModal.style.display = "block";
        modalImg.src = this.src;
    }
}

let closeButton = document.getElementsByClassName("close")[0];
closeButton.onclick = function () {
    imageModal.style.display = "none";
}