var id = document.getElementById('varId').value;
var getHttpRequest = function () {
  var httpRequest = false;

  if (window.XMLHttpRequest) { // Mozilla, Safari,...
    httpRequest = new XMLHttpRequest();
    if (httpRequest.overrideMimeType) {
      httpRequest.overrideMimeType('text/xml');
    }
  }
  else if (window.ActiveXObject) { // IE
    try {
      httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch (e) {
      try {
        httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch (e) {}
    }
  }

  if (!httpRequest) {
    alert('Abandon :( Impossible de créer une instance XMLHTTP');
    return false;
  }

  return httpRequest
}

var test = document.getElementById('test');

var form = document.querySelector('#formUser');

form.addEventListener('submit',function(e){
  var hasErrors = form.querySelectorAll('.has-error')
  for(var i = 0; i<hasErrors.length; i++){
    hasErrors[i].classList.remove('has-errors')
    var span = hasErrors[i].querySelector('.help-block')
    if(span){
      span.parentNode.removeChild(span)
    }
  }
  var reussi = document.getElementById('resultat')
  reussi.innerHTML = ''
  e.preventDefault();
  var xhr = getHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status != 200) {
        var errors = JSON.parse(xhr.responseText)
        var errorskey = Object.keys(errors)
        for(var i = 0; i<errorskey.length; i++){
          var key = errorskey[i]
          var error = errors[key]
          var champ = document.querySelector('[name='+ key+']')
          var span = document.createElement('span')
          span.className= 'help-block'
          span.innerHTML = error
          champ.parentNode.classList.add('has-error')
          champ.parentNode.appendChild(span)
        }
      }
      if(xhr.status === 200){
        var reussi = document.getElementById('resultat')
        reussi.innerHTML = 'Le profil a été modifié !'
      }
    }
  }
  xhr.open('POST', '/index.php?route=modifProfil&profilId='+id, true)
  var data = new FormData(form)
  xhr.setRequestHeader('X-REQUESTED-WITH','xmlhttprequest');
  xhr.send(data)

})
