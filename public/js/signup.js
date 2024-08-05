//signup.js;

const form = document.getElementById("signup-form");
const username = document.getElementById("nom");
const firstname = document.getElementById("prenom")
const email = document.getElementById("email");
const pwd1 = document.getElementById("mdp");
const pwd2 = document.getElementById("mdp2");
const error = document.getElementById("emailError");

username.oninput = (e) => {
      //uppercase name
     if(username.value) username.value = username.value.toUpperCase();
}

firstname.oninput = (e) => {
      // uppercase fisrt latter
      if(firstname.value) firstname.value = firstname.value[0].toUpperCase() + firstname.value.slice(1).toLowerCase();
}

form.addEventListener("submit", (e) => {
      e.preventDefault(); // Eviter la soumittion du formulaire

      if(!checkEmail(email.value)){
            setError('emailError', "Veuillez renseigner une adresse email valide");
            return ;
      }else if(pwd1.value && checkPassword(pwd1.value).error &&!pwd2.value){
            setError('pass1Error', checkPassword(pwd1.value).message);
            return ;
      }
      if( pwd1.value.trim() !== pwd2.value.trim()){
          setError('passError', "Les mots de passe ne sont pas identiques");
          return ;
      }

      const formData  = new FormData();

      fetch(form.action, {
            method: "POST",
            body: formData,
      })
      .then((response) => response.json())
      .then((data) => {
            (data.error,data.error.email)&&(setError('emailError', data.error.email),toastfyOptions.text = data.email);
            if(data.message){
                toastfyOptions.text = data.message;
                form.reset();
            }
            Toastify(toastfyOptions).showToast();
      })
})