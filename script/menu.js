var aside_menu = document.getElementById("aside_menu")

function menu_interact(element) {
    if (element.id == "open_menu") {
        if (!aside_menu.classList.contains("w-56")) {
            aside_menu.classList.remove("w-0")
            aside_menu.classList.add("w-56")
        }
    } else {
        if (aside_menu.classList.contains("w-56")) {
            aside_menu.classList.remove("w-56")
            aside_menu.classList.add("w-0")
        }
    }
}