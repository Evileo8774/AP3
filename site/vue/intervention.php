<h2>Formulaire de participation au point γ</h2>
<form action="#">
  <p><i>Complétez le formulaire. Les champs marqué par </i><em>*</em> sont <em>obligatoires</em></p>
  <fieldset>
    <legend>Contact</legend>
      <label for="nom">Nom <em>*</em></label>
      //placeholder: indication grisée 
      //required: il faut renseigner le champs sinon la validation est bloquée
      //autofocus: le curseur est positionné dans cette case au chargement de la page
      <input id="nom" placeholder="Olivier Serre" autofocus="" required=""><br>
      <label for="telephone">Portable</label>
      // type="tel": bascule le clavier sur un smartphone
      // pattern: expression régulière à vérifier pour pouvoir valider
      <input id="telephone" type="tel" placeholder="06xxxxxxxx" pattern="06[0-9]{8}"><br>
      <label for="email">Email <em>*</em></label>
      <input id="email" type="email" placeholder="prenom.nom@polytechnique.edu" required="" pattern="[a-zA-Z]*.[a-zA-Z]*@polytechnique.edu"><br>
  </fieldset>
  <fieldset>
    <legend>Information personnelles</legend>
      <label for="age">Age<em>*</em></label>
      // type="number": bascule le clavier sur un smartphone
      <input id="age" type="number" placeholder="xx" pattern="[0-9]{2}" required=""><br>
      <label for="sexe">Sexe</label>
      <select id="sexe">
        <option value="F" name="sexe">Femme</option>
        <option value="H" name="sexe">Homme</option>
      </select><br>
      <label for="comments">Pourquoi voulez-vous vous impliquer dans l'organisation du point γ?</label>
      <textarea id="comments"></textarea>
  </fieldset>
 
  <fieldset>
    <legend>Choisissez vos binets favoris</legend>
    <label for="chatnoir"><input id="chatnoir" type="checkbox" name="binet" value="chat"> Chat Noir</label>
    <label for="oenologie"><input id="oenologie" type="checkbox" name="binet" value="vin"> Œnologie</label>
    <label for="bobar"><input id="bobar" type="checkbox" name="binet" value="bob"> Bôbar</label>
    <label for="Xpara"><input id="Xpara" type="checkbox" name="binet" value="para"> X-Para</label>
    <label for="khomiss"><input id="khomiss" type="checkbox" name="binet" value="???"> Khômiss</label>
    <label for="politix"><input id="politix" type="checkbox" name="binet" value="politix"> PolitiX</label>
    <label for="raid"><input id="raid" type="checkbox" name="binet" value="raid"> Binet Raid</label>
    <label for="Xsoirees"><input id="Xsoirees" type="checkbox" name="binet" value="fiesta"> X-soirées</label>
  </fieldset>
  <p><input type="submit" value="Soummettre"></p>
</form>