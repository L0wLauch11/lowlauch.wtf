// Make the DIV element draggable:
[].forEach.call(document.getElementsByClassName("window"), element => {
    dragElement(element);
});

function hide(closeButton) {
    // Find closebutton window
    let window = closeButton.closest(".window");
    window.style.display = "none";
}

function bringToFront(element) {
    // Find highest zIndex
    let highestZIndex = 0;
    
    [].forEach.call(document.getElementsByClassName("window"), element => {
        const zIndex = element.style.zIndex || getComputedStyle(element).zIndex;
        highestZIndex = Math.max(highestZIndex, parseInt(zIndex) || 0);
    });
    
    element.style.zIndex = highestZIndex + 1;
}

function dragElement(elmnt) {
    var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
    let titlebar = elmnt.getElementsByClassName("window-titlebar")[0];

    // Titlebar is preffered for dragging; if not exists use window itself
    if (document.getElementById(titlebar)) {
        document.getElementById(titlebar).onmousedown = dragMouseDown;
    } else {
        elmnt.onmousedown = dragMouseDown;
    }

    function dragMouseDown(e) {
        bringToFront(elmnt);

        // iframe not clickable
        [].forEach.call(document.getElementsByTagName("iframe"), element => {
            element.style.pointerEvents = "none";
        });

        e = e || window.event;
        e.preventDefault();

        // get the mouse cursor position at startup:
        pos3 = e.clientX;
        pos4 = e.clientY;

        document.onmouseup = closeDragElement;
        document.onmousemove = elementDrag;
    }

    function elementDrag(e) {
        e = e || window.event;
        e.preventDefault();

        // calculate the new cursor position:
        pos1 = pos3 - e.clientX;
        pos2 = pos4 - e.clientY;
        pos3 = e.clientX;
        pos4 = e.clientY;

        // set the element's new position:
        let newPosX = Math.max((elmnt.offsetTop - pos2), 0);
        let newPosY = Math.max((elmnt.offsetLeft - pos1), 0);

        elmnt.style.top = newPosX + "px";
        elmnt.style.left = newPosY + "px";
    }

    function closeDragElement() {
        // stop moving when mouse button is released:
        document.onmouseup = null;
        document.onmousemove = null;

        // iframe clickable again
        [].forEach.call(document.getElementsByTagName("iframe"), element => {
            element.style.pointerEvents = "auto";
        });
    }
}

function showWindow(windowElement) {
    element = document.getElementById(windowElement);
    element.style.display = "inline-block";
    bringToFront(element);
}