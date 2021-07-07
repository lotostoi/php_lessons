import { $, _await } from './functions'
class ImagePreloader {
    constructor(linkLoader, dataAtribut = 'data-src') {
        this.linkLoader = linkLoader
        this.dataAtibut = dataAtribut
        this.setLodares() 
    }

    setLodares() {
        const images = [...$.all(`[${this.dataAtibut}]`)]
        images.forEach(img => {
            const widthImg = img.offsetWidth
            img.style.height = `${widthImg*.7}px`
            $.el('img', img).style.display = "none"
            const image = document.createElement('img')
            image.src = img.dataset.src
            image.onload = () =>  $.el('img', img).style.display = "flex"
        });

    }
}

export default ImagePreloader