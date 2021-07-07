import {$, _await} from './functions'
class DropWindow {
  constructor(options) {
    this.$el = typeof options.contSel === 'string' ? $.el(options.contSel) : options.contSel
    this.$button = $.el(options.switchSel, this.$el)
    this.$indicator = $.el(options.indicator, this.$el)
    this.$content = $.el(options.contentSel, this.$el)
    this.height = 0
    this.#handler()
    this.#getHeight()
  }

  async #getHeight() {
    let {$content, $indicator} = this
    if (!$content.classList.contains('active')) {
      $content.classList.add('measuring')
      await _await(100)
      this.height = $content.offsetHeight
      await _await(100)
      $content.classList.remove('measuring')
      await _await(100)
    } else {
      await _await(300)
      this.height = $content.offsetHeight
      $content.style.height = `${this.height}px`
      $indicator && $indicator.classList.add('active')
    }
    $content.style.transition = 'margin 300ms,padding 300ms, height 300ms, opacity 300ms'
  }

  async #switchWindow(e) {
    let {$content, $indicator} = this
    if (!$content.classList.contains('active')) {
      $content.classList.add('active')
      $indicator && $indicator.classList.add('active')
      $content.style.height = `${this.height}px`
    } else {
      $indicator && $indicator.classList.remove('active')
      $content.classList.remove('active')
      $content.style.height = `${0}px`
    }
  }
  #handler() {
    this.$button.addEventListener('click', this.#switchWindow.bind(this))
  }
}

export default DropWindow
