var config = {
    reset:  true,
    mobile: true
  }
window.sr = ScrollReveal(config);

ScrollReveal().reveal('body', {
	interval: 16,
	reset: true,
    reset: true
});

sr.reveal('.small-carousel', {
    duration: 2000
    ,reset: true
});
sr.reveal('.titulo', {
    duration: 2500,
    origin: 'left',
    distance:'1400px',
    reset: true
});
sr.reveal('.text', {
    duration: 2500,
    origin: 'right',
    distance:'1400px',
    reset: true
});

sr.reveal('.inf', {
    duration: 3500
    ,reset: true
});



