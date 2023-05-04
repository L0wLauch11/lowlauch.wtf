function resizeBodyPadding() {
    const headerHeight = document.querySelector("nav").offsetHeight;
    document.querySelector("body").style.paddingTop = `${headerHeight}px`;
};

window.addEventListener('load', resizeBodyPadding);
window.addEventListener('resize', resizeBodyPadding);