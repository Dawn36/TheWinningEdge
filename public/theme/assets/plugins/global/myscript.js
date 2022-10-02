function fileValidation(id) {
    var fileInput = document.getElementById(id);

    var filePath = fileInput.value;

    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

    if (!allowedExtensions.exec(filePath)) {
        alert("Invalid file type");
        fileInput.value = "";
        return false;
    } else {
        return true;
    }
}

function CheckValidEmail(id) {
    email = document.getElementById(id).value;
    var emailregex =
        /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (emailregex.test(email) == false) {
        var value = "Wrong Email! (Hint:abc@gmail.com)";
        alert(value);
        document.getElementById(id).value = "";
        return false;
    }
}
