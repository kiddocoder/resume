//utils.js;

const toastfyOptions = {
      text: '',
      className: "info",
      duration:5000,
      close:true,
      gravity: "top", // `top` or `bottom`
      position:"right",
      style: {
        background: "#DADE61",
        color:"#fff"
      }
}

let errors = {};
const checkEmail = (email) =>{
      const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(String(email).toLowerCase());
}

const checkPassword = (password) => {
      const res = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
      if(password.length < 8){
            errors ={"error" : false,"message" : "mot de passe doit contenir au moins 8 caractères"};
      }else if(!res.test(password)){
            errors ={"error" : false,"message" : "mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère special"};
      }else{
            errors ={"error" : true,"message" : ""};
      }

      return errors;
}

const setError = (el, msg) => {
      const element = document.getElementById(el);
      element.className = "form-text text-danger";
      element.textContent = msg;
      setTimeout(() => {
            element.textContent = "";
      }, 5000);

      // show toast message
      toastfyOptions.text = msg;
      Toastify(toastfyOptions).showToast();
      // console.log(toastfyOptions);
}