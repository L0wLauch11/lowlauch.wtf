const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');

if (getCookie("darkMode") == "true") {
    switchTheme("dark", "/img/moon.svg", "filter: invert(1);");
    toggleSwitch.checked = true;
}

function switchThemeButton(e) {
    if (e.target.checked) {
        // Dark mode
        switchTheme("dark", "/img/moon.svg", "filter: invert(1);");
    }
    else {
        // Light mode
        switchTheme("light", "/img/sun.svg", "filter: invert(0);");
    }    

    document.cookie = "darkMode=" + e.target.checked + "; SameSite=None; Secure";
}

toggleSwitch.addEventListener('change', switchThemeButton, false);

function switchTheme(themeName, themeIconSrc, themeImageFilter) {
    document.documentElement.setAttribute('data-theme', themeName);
    document.getElementById('theme-switch-image').setAttribute("src", themeIconSrc);
    document.getElementById('theme-switch-image').setAttribute("style", themeImageFilter);
    
    let documentsToInvert = document.getElementsByClassName('invert');
    for (let i = 0; i < documentsToInvert.length; i++)
    {
        documentsToInvert[i].setAttribute("style", themeImageFilter);
    }
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}