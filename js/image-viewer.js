function changeViewerImage(imagePath) {
    const imageViewerImg = document.getElementById("image-viewer-img");
    imageViewerImg.setAttribute("src", imagePath);
}