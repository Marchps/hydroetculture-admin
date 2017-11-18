
    function surligne(champ, erreur){
        if(erreur)
            champ.style.borderColor = "#e3126e";
        else
            champ.style.borderColor = "#70b95d";
    }

    function verifNom(champ)
    {

        if(champ.value.length < 2 || champ.value.length > 50)
        {
            surligne(champ,true);
            return false;
        } else 
        {
            surligne(champ,false);
            return true;
        }
    }
