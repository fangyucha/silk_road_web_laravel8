const slider = document.querySelector("#slider")
const selector = document.querySelector("#selector")
const selectValue = document.querySelector("#selectValue")
const progressBar = document.querySelector("#progressBar")

slider.max = 40
slider.value = 10
display_slider()
slider.oninput = function () {
    selectValue.innerHTML = this.value
    selector.style.left = (this.value / slider.max * 100) + "%"
    progressBar.style.width = (this.value / slider.max * 100) + "%"
}

function display_slider() {
    selectValue.innerHTML = slider.value
    selector.style.left = (slider.value / slider.max * 100) + "%"
    progressBar.style.width = (slider.value / slider.max * 100) + "%"
}
