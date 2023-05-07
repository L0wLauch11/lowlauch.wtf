function changeViewerImage(imagePath) {
    showImageViewer();

    const imageViewerImg = document.getElementById("image-viewer-img");
    imageViewerImg.setAttribute("src", imagePath);
}

function hideImageViewer() {
    const imageViewer = document.getElementById("image-viewer");
    imageViewer.style.display = "none";
}

function showImageViewer() {
    const imageViewer = document.getElementById("image-viewer");
    imageViewer.style.display = "block";
}