<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Inscription_v1.css">
        <title>Inscription</title>
    </head>
    
    <body>
        <h1>Inscription</h1> <br/>
        <form action="verif_sign_up.php" method="POST" name="formulation">
            <fieldset>
                <legend>Coordonnees</legend>
                <label for="idnom"> Nom : </label>
                <input type="text" name="Nom" id="idnom" required
                minlength="2"/>

                <br/> 

                <label for="idprenom"> Prenom : </label> 
                <input type="text" name="Prenom" id="idprenom" required
                minlength="2"/> 
            
            </fieldset> <br/> 

            <fieldset>
                <legend>Contact</legend>
                <label for="idemail"> Adresse mail : </label> 
                <input type="email" name="Adresse_mail" id="idemail" 
                pattern = "[A-Za-z]{1,}+.+[A-Za-z]{1,}+@gmail.com" required/>              

                <br/> 

                <label for="idtel"> Numero de telephone : </label> 
                <input type="tel" name="Numero" id="idtel" required
                pattern = "0{1}[0-9]{9}"/>

                <br/> 
                
                <legend><b>Adresse Postale</b></legend>
                    <label for="idPostal"> Code Postal : </label>  
                    <input type="text" name="CodePostal" id="idPostal" required
                    minlength="5" minlength="5"/> 
                    
                    <br/> 
                    
                    <label for="idVille"> Ville : </label>  
                    <input type="text" name="Ville" id="idVille" required/>
                    
                    <br/>
                    
                    <label for="idRue"> Rue : </label>  
                    <input type="text" name="Rue" id="idRue" required/>
                
            </fieldset> <br/>  

            <fieldset>
                <legend>Informations Generales</legend>            
                Sexe :
                <select name="Sexe" id="idsex">
                    <option value=""></option>
                    <option value="Femme">Femme</option>
                    <option value="Homme">Homme</option>
                    <option value="Autre">Autre</option>
                </select>

                <br/>  
                Situation Familiale :
                <select name="Sit_Fam" id="idsitfam">
                    <option value=""></option>
                    <option value="Marie">Marie(e)</option>
                    <option value="Pacse">Pacse(e)</option>
                    <option value="Divorce">Divorce(e)</option>
                    <option value="Separe">Sépare(e)</option>
                    <option value="Celibataire">Celibataire</option>
                    <option value="Veuf">Veuf(ve)</option>
                </select>

                <br/>

                <label for="idNaissance"> Date de Naissance : </label>  
                <input type="date" name="Date_Naissance" id="idNaissance" /> 
                
            </fieldset> <br/>  

            <fieldset>
                <legend>Securite</legend> 
                <label for="idpassword"> Mot de passe : </label>  
                <input type="password" name="Mot_de_passe" id="idpassword" required 
                minlength="8"
                pattern = "[A-Z]{1}[A-Za-z0-9]{1,}[a-z]{1}"/>

                <br/>  

                <label for="idconfpassword"> Confirmation du mot de passe : </label>  
                <input type="password" name="Conf_mot_de_passe" id="idconfpassword" required/>

            </fieldset> <br/>                   

            <input type="submit" id="idenvoyer" name="envoyer" value="envoyer" /> 
            <input type="reset" id="idreset"  name="reset" value="reset"/> 
    </body>
    <footer> <p class="ContactSociete"> Adresse : 54 rue de la mort      Tel : 06.06.06.06.06</p></footer>
</html>

