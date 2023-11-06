
const east=["Bugesera","Gatsibo","Kayonza","Kirehe","Ngoma","Nyagatare","Rwamagana"];
const kigali=["Gasabo","Kicukiro","Nyarugenge"];
const west=["Karongi","Ngororero","Nyabihu","Nyamasheke","Rubavu","Rutsiro","Rusizi"];
const south=["Gisagara","Huye","Kamonyi","Muhanga","Nyamagabe","Nyanza","Nyaruguru","Ruhango"];
const north=["Burera","Gakenke","Gicumbi","Musanze","Rulindo"];

function setDistricts(province) {
    document.getElementById("dis1").innerHTML=province[0];
    document.getElementById("dis2").innerHTML=province[1];
    document.getElementById("dis3").innerHTML=province[2];
    document.getElementById("dis4").innerHTML=province[3];
    document.getElementById("dis5").innerHTML=province[4];
    document.getElementById("dis6").innerHTML=province[5];
    document.getElementById("dis7").innerHTML=province[6];
    document.getElementById("dis8").innerHTML=province[7];
}

document.getElementById("east").onclick = function(){
    setDistricts(east);
    document.getElementById("dis8").innerHTML="";
}
document.getElementById("west").onclick = function(){
    setDistricts(west);
    document.getElementById("dis8").innerHTML="";
}
document.getElementById("north").onclick = function(){
    setDistricts(north);
    document.getElementById("dis6").innerHTML="";
    document.getElementById("dis7").innerHTML="";
    document.getElementById("dis8").innerHTML="";
}
document.getElementById("south").onclick = function(){
    setDistricts(south);
}
document.getElementById("kigali").onclick = function(){
    setDistricts(kigali);
    document.getElementById("dis4").innerHTML="";
    document.getElementById("dis5").innerHTML="";
    document.getElementById("dis6").innerHTML="";
    document.getElementById("dis7").innerHTML="";
    document.getElementById("dis8").innerHTML="";
}

//let province=document.getElementById("province").;
/*
if(province==east){
    setDistricts(east);
}
//else if(province==west){
  //  setDistricts(west);
//}
//else if(province==north){
 //   setDistricts(north);
//}
//else if(province==south){
  //  setDistricts(south);
//}
else if(province==kigali){
    setDistricts(kigali);
}
else{
    window.alert("Please select a province!");
} */
//document.getElementById("heading1").innerHTML="Hello World!";
//console.log("Hello",document.getElementById("haeding1").value);
//document.getElementById("dis1").innerHTML="Hello Einstein";

/*if(document.getElementById("east").checked){
    setDistricts(east);
    document.getElementById("dis8").innerHTML="";
}
else if(document.getElementById("west").checked){
    setDistricts(west);
    document.getElementById("dis8").innerHTML="";
}
else if(document.getElementById("north").checked){
    setDistricts(north);
    document.getElementById("dis6").innerHTML="";
    document.getElementById("dis7").innerHTML="";
    document.getElementById("dis8").innerHTML="";
}
else if(document.getElementById("south").checked){
    setDistricts(north);
}
else if(document.getElementById("kigali").checked){
    setDistricts(kigali);
    document.getElementById("dis4").innerHTML="";
    document.getElementById("dis5").innerHTML="";
    document.getElementById("dis6").innerHTML="";
    document.getElementById("dis7").innerHTML="";
    document.getElementById("dis8").innerHTML="";
}
else{
    window.alert("Please select a province!");
}
console.log(document.getElementById("north").checked); */
document.getElementById("submitButton").onclick = function(){
    if(document.getElementById("fname").value==null){
        document.getElementById("fname-rewuired").innerHTML="First name required!";
        if(document.getElementById("fname").value.length<3){
            document.getElementById("fname-rewuired").innerHTML="First name can't be less than 3 characters!";
        }
    }
    if(document.getElementById("lname").value==null){
        document.getElementById("lname-required").innerHTML="Last name required!";
        if(document.getElementById("lname").innerHTML.length<3){
            document.getElementById("lname-required").innerHTML="Last name can't be less than 3 characters!";
        }
    }
    if(document.getElementById("email").innerHTML==null){
        document.getElementById("email-required").innerHTML="Email required!";
    }
    if(document.getElementById("address").innerHTML==null){
        document.getElementById("address-required").innerHTML="Address required!";
    }
}
console.log(document.getElementById("fname").value)