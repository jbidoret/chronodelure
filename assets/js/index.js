// Menu
var menutoggle = document.querySelector('#hamburger');
var header = document.querySelector('#header');
menutoggle.onclick = (e) => {
  header.classList.toggle('open')
};


// Contexte
let contextes = document.querySelectorAll(".context");
let body = document.querySelector("body");

contextes.forEach(function (link, index) {
  link.onclick = (e) => {
      // console.log("cliqué !")
      // fetch context url, then inject a glightbox slide
      if(!e.target.matches(".external")){
        e.preventDefault();
        link.classList.add('loading');
        var url = link.getAttribute("data-href");
        fetch(url).then(function (response) {
          return response.text();
        }).then(function (html) {
          var parser = new DOMParser();
          var doc = parser.parseFromString(html, 'text/html');
          var content = doc.querySelector('#context-content');
          link.classList.remove('loading');
          const ajaxExample = GLightbox({ 
            selector: null,   
            draggable: false,
            // touchNavigation: true,
            // loop: true,
            autoplayVideos: true,
            width: 'auto',
            height: "90vh",
            openEffect: "none",
            closeEffect: "none"
          });
          ajaxExample.insertSlide({
            content: content.innerHTML
          });
          ajaxExample.open();
        }).catch(function (err) {
          // There was an error
          console.warn('Something went wrong.', err);
        });  
      }
      
  };
});


// Lightbox
// https://github.com/biati-digital/glightbox

const lightbox = GLightbox({
  touchNavigation: true,
  loop: true,
  autoplayVideos: true,
  openEffect: "none",
  closeEffect: "none"
});


// Search 
var searchbutton = document.querySelector('#search-navbutton');
var search = document.querySelector('#search-button');
var searchoverlay = document.querySelector('#search-overlay');
if(searchbutton){  
  searchbutton.addEventListener('click', function(){
    var bar = document.querySelector("#search-bar");
    var input = document.querySelector("#search-input");
    bar.classList.add('opened');
    header.classList.add('searching');
    input.focus();
    input.select();
    searchoverlay.addEventListener('click', function(){
      bar.classList.remove('opened');
      header.classList.remove('searching');
    });
    search.addEventListener('click', function(){
      if(input.value == "") {
        bar.classList.remove('opened');
        header.classList.remove('searching');
      }
    });
  });
}

// Read more (page session)
var readmorelinks = document.querySelectorAll('.readmore-link');
readmorelinks.forEach( (link) => {
  link.onclick = () => {
    const target = document.querySelector(link.getAttribute('href'));
    target.classList.add('visible');
  }
})
var readmoreclose = document.querySelectorAll('.readmore-close');
readmoreclose.forEach( (link) => {
  link.onclick = () => {
    const target = link.closest('.session-readmore')
    target.classList.remove('visible');
  }
})

// Font changer
var fontChangers = document.querySelectorAll(".changefont");
if(fontChangers){
  fontChangers.forEach((changer) => {
    changer.onclick = () => {
      createCookie("font", changer.dataset.font, 15);
      document.location.reload();
    }
  })
}

function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/; SameSite=Lax";
}
