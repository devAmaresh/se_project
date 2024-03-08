/// for login and signup pages

document.getElementById('changeBackgroundColorButton').addEventListener('click', function() {
  const rootStyle = document.documentElement.style;
  const currentColor = rootStyle.getPropertyValue('--bgc');
  const el = document.getElementById('changeBackgroundColorButton')
  // Toggle between different colors
  if (currentColor != '#f4ffb8') {
    rootStyle.setProperty('--bgc', '#f4ffb8');
    el.classList.remove('fa-moon');
    el.classList.add('fa-sun');
    
  } else {
    rootStyle.setProperty('--bgc', '#181818');
    el.classList.remove('fa-sun');
    el.classList.add('fa-moon');
  }
});