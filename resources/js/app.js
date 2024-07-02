import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


img.onchange = evt => {
    const [file] = img.files
    if (file) {
        prev_box.classList.remove('d-none')
        thumb.src = URL.createObjectURL(file)
    }
}
erase_prev.onclick = evt => {
    img.value = ''
    prev_box.classList.add('d-none')
}