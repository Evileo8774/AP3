<h2>Formulaire de recherche client</h2>
<form action="#">
  <p><i>Complétez le formulaire. Les champs marqué par </i><em>*</em> sont <em>obligatoires</em></p>
  <fieldset>
    <legend>Contact Client</legend>
      <label for="nom">Nom <em>*</em></label>
      
      <input id="nom" placeholder="Gaston Berger" autofocus="" required=""><br>
      <label for="telephone">Portable</label>

      // type="tel": bascule le clavier sur un smartphone
      // pattern: expression régulière à vérifier pour pouvoir valider

      <input id="telephone" type="tel" placeholder="0xxxxxxxxx" pattern="[0-9]{8}"><br>
      <label for="email">Email <em>*</em></label>
      <input id="email" type="email" placeholder="prenom.nom@gastonBerger.fr" required=""><br>
  </fieldset>

  <fieldset>
    <legend>Informations Entreprise</legend>
    <label for="RS">Raison Social<em>*</em></label>
    <input id="RS" type="carac" required=""><br>
      
    <label for="Siren">Siren<em>*</em></label>
    // type="number": bascule le clavier sur un smartphone
    <input id="siren" type="number" placeholder="xxxxxxxxx" pattern="[0-9]{9}" required=""><br>
      
    <label for="APE">Code APE<em>*</em></label>
    <input id="APE" type="carac" placeholder="xxxxx" pattern="{5}" required=""><br>

    <label for="comments">Descriptif intervention</label>
    <textarea id="comments"></textarea>
  
  </fieldset>
  <p><input type="submit" value="Soummettre"></p>
</form>