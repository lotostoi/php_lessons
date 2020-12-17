window.onload = () => {
  if (document.querySelector('.result_loader')) {
    setTimeout(() => {
      document.querySelector('.result_loader').style.opacity = '0'
    }, 3000)
  }
}
