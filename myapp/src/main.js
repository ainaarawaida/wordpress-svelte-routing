
import App from './App.svelte'

let app;

if (document.getElementById('appsvelte') !== null) {
  app = new App({
    target: document.getElementById('appsvelte')
  })
}

export {app}
