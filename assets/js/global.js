const burgerBtn = document.getElementById("burger");
const closeBtn = document.getElementById("close");
const btnBurgerClose = document.getElementById("btn-burger-close");
const dropdownMenu = document.getElementById("dropdown-menu");

let isOpen = true;

btnBurgerClose.addEventListener('click', () => {
    if (isOpen) {
        burgerBtn.classList.remove("hidden")
        closeBtn.classList.add("hidden")
        dropdownMenu.classList.add("hidden")
    }else {
        burgerBtn.classList.add("hidden")
        closeBtn.classList.remove("hidden")
        dropdownMenu.classList.remove("hidden")
    }
    return isOpen = !isOpen;
})


