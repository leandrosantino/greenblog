function update_theme_icon() {
  const current_theme = window.localStorage.getItem('theme')
  if (current_theme === 'dark') {
    $('#theme_button').html(`<span class="bi bi-sun"></span>`)
  } else {
    $('#theme_button').html(`<span class="bi bi-moon-stars"></span>`)
  }
}

function change_theme() {
  const current_theme = window.localStorage.getItem('theme')
  window.localStorage.setItem('theme', current_theme === 'dark' ? 'ligth' : 'dark')
  console.log(window.localStorage.getItem('theme'))
  update_theme_icon()
  set_teme_colors()
}

function set_teme_colors() {
  const current_theme = window.localStorage.getItem('theme')

  if (current_theme === 'dark') {
    const r = document.querySelector(':root')
    r.style.setProperty("--font-1", "#8a8a8a");
    r.style.setProperty("--font-2", "rgb(160, 160, 160)");
    r.style.setProperty("--font-3", "#FFFFFF");
    r.style.setProperty("--back-color", "#2D2D2D");
    r.style.setProperty("--back-color-input", "#5a5a5a");
    r.style.setProperty("--user-menu-hover-color", "rgba(255, 255, 255, .1)");
    r.style.setProperty("--logo-url", "url(/assets/logo-white.png)");
  }

  if (current_theme === 'ligth') {
    const r = document.querySelector(':root')
    r.style.setProperty("--font-1", "#969696");
    r.style.setProperty("--font-2", "#343434");
    r.style.setProperty("--font-3", "#2D2D2D");
    r.style.setProperty("--back-color", "#FFFFFF");
    r.style.setProperty("--back-color-input", "#FFFFFF");
    r.style.setProperty("--logo-url", "url(/assets/logo-green.png)");

  }

}

set_teme_colors()
update_theme_icon()
$('#theme_button').on('click', change_theme)