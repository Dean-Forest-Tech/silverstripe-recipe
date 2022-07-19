(function () {
  document.body.addEventListener(
    'click',
    (event) => {
      const { target } = event

      // Refresh page on cookie button accept. As tracking scripts
      // should load after page is rendered.
      if (target.id === 'setCookie') {
        window.location.reload()
      }
    },
  )
}())
