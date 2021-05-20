function verif_champ(champ1, champ2, champ3, champ4, champ5, champ6, champ7, champ8, champ9, champ10) {
  /* Création  chaque fois d'un field_nom qui servira à récupérer
  les informations rentrées par l'utilisateur.
  Et création d'un champ field_missnom qui correspond à un span servant à 
  afficher des informations par rapport au champ (pas assez de caractères, mail non valide etc...)*/
  let field_nom = document.getElementsByName(champ1)[0].value;
  let field_missnom = document.getElementById(champ2);
  let field_prenom = document.getElementsByName(champ3)[0].value;
  let field_missprenom = document.getElementById(champ4);
  let field_mail = document.getElementsByName(champ5)[0].value;
  let field_missmail = document.getElementById(champ6);
  let field_passwd = document.getElementsByName(champ7)[0].value;
  let field_misspasswd = document.getElementById(champ8);
  let field_passwd_verif = document.getElementsByName(champ9)[0].value;
  let field_misspasswd_verif = document.getElementById(champ10);
  let passwd_size = field_passwd.length;
  let cpt = 0;

  if (field_prenom == "") {
      window.event.preventDefault();
      field_missprenom.textContent = "Prénom manquant";
      field_missprenom.style.color = "red";
      field_missprenom.hidden = false;
  } else {
      field_missprenom.hidden = true;
      cpt++;
  }

  if (field_nom == "") {
      window.event.preventDefault();
      field_missnom.textContent = "Nom manquant";
      field_missnom.style.color = "red";
      field_missnom.hidden = false;
  } else {
      field_missnom.hidden = true;
      cpt++;
  }

  if (!field_mail.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
      window.event.preventDefault();
      field_missmail.textContent = "Email invalide";
      field_missmail.style.color = "red";
      field_missmail.hidden = false;
  } else {
      field_missmail.hidden = true;
      cpt++;
  }

  if (field_passwd != field_passwd_verif) {
    window.event.preventDefault();
    console.log("AAAAAAAAAAAA");
    field_misspasswd_verif.textContent = "Veuillez entrez deux fois le même mot de passe";
    field_misspasswd_verif.style.color = "red";
    field_misspasswd_verif.hidden = false;
} else {
    field_misspasswd_verif.hidden = true;
    cpt++;
}

  if (passwd_size < 8) {
      window.event.preventDefault();
      field_misspasswd.textContent = "Mot de passe inférieur à 8 caractères";
      field_misspasswd.style.color = "red";
      field_misspasswd.hidden = false;
  } else {
      field_misspasswd.hidden = true;
      cpt++;
  }


  console.log(field_passwd);
  console.log(field_passwd_verif);
  if (cpt == 5) {
      alert("Inscription effectuée.");
  }
}

var button = document.getElementsByTagName("button")[0];
button.addEventListener("click", function () {
  verif_champ("nom", "missNom", "prenom", "missPrenom", "email", "missEmail", "password", "missPassword", "password_verify", "missPasswordVerif");
});
