function getParams(){
                var idx = document.URL.indexOf('?');
                var params = new Array();
                if (idx != -1) {
                    var pairs = document.URL.substring(idx+1, document.URL.length).split('&');
                    for (var i=0; i<pairs.length; i++){
                        nameVal = pairs[i].split('=');
                        params[nameVal[0]] = nameVal[1];
                    }
                }
                return params;
            }
            params = getParams();
            stream = unescape(params["stream"]);
            ccode = unescape(params["ccode"]);
            sem = unescape(params["sem"]);
	    cnt = 0;
            //document.write("Stream = " + stream + "<br>");
            //document.write("Course Code = " + ccode + "<br>");
            //document.write("Semester = " + sem + "<br>");

$(document).ready(function(){

var rootRef = firebase.database().ref();

rootRef.on("child_added", snap => {
var rv = snap.child("Name").val();
var name = rv.substring(1,rv.length-1);

var rv = snap.child("Roll").val();
var roll = rv.substring(1,rv.length-1);

var rv = snap.child("Stream").val();
var strm = rv.substring(1,rv.length-1);

var rv = snap.child("Semester").val();
var seme  = rv.substring(1,rv.length-1);

var rv = snap.child("1st_sub").val();
var sub1 = rv.substring(1,rv.length-1);

var rv = snap.child("TFTC").val();
sub1tc = rv.substring(1,rv.length-1);

var rv = snap.child("TFPC").val();
var sub1pc = rv.substring(1,rv.length-1);

var rv = snap.child("2nd_sub").val();
var sub2 = rv.substring(1,rv.length-1);

var rv = snap.child("TSTC").val();
var sub2tc = rv.substring(1,rv.length-1);

var rv = snap.child("TSPC").val();
var sub2pc = rv.substring(1,rv.length-1);

var rv = snap.child("3rd_sub").val();
var sub3 = rv.substring(1,rv.length-1);

var rv = snap.child("TTTC").val();
var sub3tc = rv.substring(1,rv.length-1);

var rv = snap.child("TTPC").val();
var sub3pc = rv.substring(1,rv.length-1);

var rv = snap.child("LCA").val();
var lca = rv.substring(1,rv.length-1);

var rv = snap.child("TTC").val();
var ttc = rv.substring(1,rv.length-1);

var rv = snap.child("TPC").val();
var tpc = rv.substring(1,rv.length-1);

var sub1p = parseInt(sub1tc) + parseInt(sub1pc);

var ttc1 = ttc - 0;
var tpc1 = tpc - 0;
var tc = ttc1 + tpc1;

var sub2p = parseInt(sub2tc) + parseInt(sub2pc);
var sub3p = parseInt(sub3tc) + parseInt(sub3pc);
var totala = parseInt(sub1p) + parseInt(sub2p) + parseInt(sub3p);
var totalp = 0;

if(strm==stream && sub1 == ccode && seme == sem)
{

$("#table_body").append("<tr onclick=abc(this)><td>" + name + "</td><td>" + roll + "</td><td>" + strm + "</td><td>" + seme + "</td><td>" + sub1 + "</td><td>" + sub1tc + "</td><td>" + sub1pc + "</td><td>" + sub2 + "</td><td>" + sub2tc + "</td><td>" + sub2pc + "</td><td>" + sub3 + "</td><td>" + sub3tc + "</td><td>" + sub3pc + "</td><td>" + ttc + "</td><td>" + tpc + "</td><td>" + tc + "</td><td>" + lca + "</td></tr>");
}

});

});