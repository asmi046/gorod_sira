document.addEventListener("DOMContentLoaded", () => {
    burger_element.addEventListener("click", function (e) {
        burger_element.classList.toggle("active")
        mobile_menu.classList.toggle("open")
    })
})
