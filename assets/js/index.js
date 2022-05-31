// menu
var menutoggle = document.querySelector('#hamburger');
var header = document.querySelector('#header');
menutoggle.onclick = (e) => {
  header.classList.toggle('open')
};

// Lightbox
// https://github.com/biati-digital/glightbox

const lightbox = GLightbox({
  touchNavigation: true,
  loop: true,
  autoplayVideos: true,
  openEffect: "none",
  closeEffect: "none"
});


//search 
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


// Faire, défaire et refaire, c’est toujours travailler pour rien :D
// var ajaxRequest = new (function () {

//   function closeReq () {
//     bIsLoading = false;
//   }

//   function abortReq () {
//     if (!bIsLoading) { return; }
//     xhr.abort();
//     closeReq();
//   }

//   function ajaxError () {
//     alert("Unknown error.");
//   }

//   function ajaxLoad(){
//     if (xhr.readyState === 4) {
//       if (xhr.status === 200) {
        
//         // parse answwer
//         var res = xhr.responseText;
//         var parser = new DOMParser;
//         var doc = parser.parseFromString(res, "text/html")
//         var fragment = doc.querySelector('#decade-sessions');
//         oPageInfo.title = doc.querySelector('title').textContent;
//         var decade = fragment.dataset.decade;

//         // title
//         document.title = oPageInfo.title;
        
//         // update
//         if (bUpdateURL) {
//           history.pushState(oPageInfo, oPageInfo.title, oPageInfo.url);
//           bUpdateURL = false;
//         }

//         // close previous
//         // var previous = document.querySelector('.decade-content.visible');
//         // if(previous){
//         //   previous.classList.remove('visible');
//         //   var child = previous.querySelector(':first-child');
//         //   previous.removeChild(child);
//         // }
        
//         // append
//         var target = document.getElementById("decade-" + decade + "-content");
//         var decade = document.getElementById("decade-" + decade);
//         target.appendChild(fragment);
//         decade.classList.add('visible');
        
//         // scroll
//         decade.scrollIntoView({ behavior: 'smooth' });

//         // close button
//         var close = document.createElement('button');
//         close.className="decade-button";
//         decade.querySelector('header').appendChild(close);
//         close.textContent = "fermer";
//         close.addEventListener('click', function(e){
//           e.stopPropagation();
//           target.removeChild(fragment);
//           document.querySelector('.opened').classList.remove('opened');
//           close.parentElement.removeChild(close);
//           document.querySelector('.decade.visible').classList.remove('visible');
//         });
//       } else {
//         console.error(xhr.statusText);
//       }
//     }
//     closeReq();
//   }

//   function getPage (sPage) {
//     if (bIsLoading) { return; }
//     xhr = new XMLHttpRequest();
//     bIsLoading = true;
//     xhr.onload = ajaxLoad;
//     xhr.onerror = ajaxError;
//     if (sPage) { oPageInfo.url = sPage; }
//     xhr.open("get", oPageInfo.url, true);
//     xhr.setRequestHeader("X-Requested-With", 'fetch');
//     xhr.send();
//   }

//   function requestPage (sURL) {
//     if (history.pushState) {
//       bUpdateURL = true;
//       getPage(sURL);
//     } else {
//       /* Ajax navigation is not supported */
//       location.assign(sURL);
//     }
//   }

//   function processLink () {
//     if (this.classList.contains(sAjaxClass)) {
//       if(!this.matches('.opened')){
//         this.classList.add("opened");
//         requestPage(this.href);
//       } 
//       return false;
//     }
//     return true;
//   }

//   function init () {
//     oPageInfo.title = document.title;
//     for (var oLink, nIdx = 0, nLen = document.links.length; nIdx < nLen; document.links[nIdx++].onclick = processLink);
//   }

//   var sAjaxClass = "decade-link",
//     oPageInfo = {
//       title: null,
//       url: location.href
//     },
//     xhr, 
//     bIsLoading = false, 
//     bUpdateURL = false;

//   onpopstate = function (oEvent) {
//     bUpdateURL = false;
//     oPageInfo.title = oEvent.state.title;
//     oPageInfo.url = oEvent.state.url;
//     getPage();
//   };

//   window.addEventListener ? addEventListener("load", init, false) : window.attachEvent ? attachEvent("onload", init) : (onload = init);
//   this.open = requestPage;
//   this.stop = abortReq;
//   this.rebuildLinks = init;
  
// })();