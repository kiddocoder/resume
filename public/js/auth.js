//auth.js;

const form = document.getElementById("login-form");

form.addEventListener("submit", (e) => {
      e.preventDefault(); // Eviter la soumittion du formulaire

      const email = document.getElementById("email").value;
      if(!checkEmail(email)){
            setError('emailError', "Veuillez renseigner une adresse email valide");
      }
      const formData = new FormData(form);
     fetch(form.action, {
            method: "POST",
            body: formData,
      })
      .then((response) => response.json())
      .then((data) => {
            if(data.error){
                  (data.error.email)&&setError('emailError', data.error.email);
                  (data.error.mdp)&&setError('mdpError', data.error.mdp);

            }else{
                  alert(data.message);
                  form.reset();
            }
      })
})
