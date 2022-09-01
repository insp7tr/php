const resendbtn = form.querySelector(".submit .resendbtn");

resendbtn.onclick = () => {
  let xhr = new XMLHttpRequest();

  xhr.open("POST", "./Php/resendotp.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data == "Success") {
          location.href = "./verify.php";
        } else {
          errortxt.textContent = data;
          errortxt.style.display = "block";
        }
      }
    }
  };

  let formData = new FormData(form);
  xhr.send(formData);
};
