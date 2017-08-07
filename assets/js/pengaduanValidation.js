
function checkFilled() {
    var inputVal = document.getElementById("judul");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "red";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
}

function validate(){

    var first=document.forms["pengaduan"]["judul_pengaduan"];
    if(first.value == null || first.value == ""){
        alert("Judul harus diisi");
        first.style.borderColor = "red";
        return false
    }

    var second=document.forms["pengaduan"]["isi_pengaduan"];
    if(second.value == null || second.value == ""){
        alert("Isi pengaduan harus diisi");
        second.style.borderColor = "red";
        return false
    }

    return true;

}
