<form method="GET" action="patientController.php">
    <input type="hidden" name="action" value="afficherListePatientsParClinique">

    <label for="nomClinique">Choisir une clinique :</label>
    <select name="nomClinique" id="nomClinique" onchange="this.form.submit()">
        <option value="">-- Sélectionne une Clinique --</option>

        <?php
        foreach($listeClinique as $clinique){
            $selected = (isset($nomClinique) && $clinique->getNom() == $nomClinique) ? "selected"  : "";
            echo "<option value = '" . $clinique->getNom() . "' $selected>" . $clinique->getNom() . "</option>";
        }
        ?>
    </select>
</form>
<br />
<br />
<h3>Liste des patient(s) :
    <?php 
        if ($nomClinique != "") {
            echo "(" . count($listePatient) . " patient(s) pour la clinique : <strong>" . $nomClinique . "</strong>)";
        }
    ?>
</h3>
<br />
<br />
<table>
        <tr>
            <th>N° de Dossier </th>
            <th>N° d'Assurance Maladie </th>
            <th>Nom </th>
            <th>Prenom </th>
            <th>Adresse </th>
            <th>Ville </th>
            <th>Province </th>
            <th>Code Postal </th>
            <th>Téléphone </th>
            <th>Courriel </th>
        </tr>
        <!-- formulaire pour afficher la liste des patients... -->
        <form method="">
            <?php
                foreach ($listePatient as $patient)
                {
                    echo "<tr>";
                    echo "<td>" . $patient->getNoDossier() . "</td>";
                    echo "<td>" . $patient->getNoAssuranceMaladie() . "</td>";
                    echo "<td>" . $patient->getNom() . "</td>";
                    echo "<td>" . $patient->getPrenom() . "</td>";
                    echo "<td>" . $patient->getAdresse() . "</td>";
                    echo "<td>" . $patient->getVille() . "</td>";
                    echo "<td>" . $patient->getProvince() . "</td>";
                    echo "<td>" . $patient->getCodePostal() . "</td>";
                    echo "<td>" . $patient->getTelephone() . "</td>";
                    echo "<td>" . $patient->getCourriel() . "</td>";
                    echo "</tr>";
                }
            ?>
        </form>
</table>
<?php
if (isset($_SESSION['success'])) {
    echo"<p style='color: green;'>" . $_SESSION['success'] . "</p>";
    unset($_SESSION['success']);
}

if (isset($_SESSION['error'])) {
    echo"<p style='color: red;'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
}
?>
<br>
<b>Ajouter un Patient :</b>
<br>
<br>
<!-- formulaire pour ajouter un nouveau patient... -->
<form method="POST" action="patientController.php?action=ajouterPatient&nomClinique=<?= urlencode($nomClinique) ?>">
    <table>
        <tr>
            <td>
                <label>N° de Dossier</label>
            </td>
            <td>
                <input name="noDossier" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label>N° d'Assurance Maladie</label>
            </td>
            <td>
                <input name="noAssuranceMaladie" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Nom</label>
            </td>
            <td>
                <input name="nom" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Prenom</label>
            </td>
            <td>
                <input name="prenom" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Adresse</label>
            </td>
            <td>
                <input name="adresse" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Ville</label>
            </td>
            <td>
                <input name="ville" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Province</label>
            </td>
            <td>
                <input name="province" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Code Postal</label>
            </td>
            <td>
                <input name="codePostal" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Telephone</label>
            </td>
            <td>
                <input name="telephone" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Courriel</label>
            </td>
            <td>
                <input name="courriel" required/>
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                <input type="submit" value="Ajouter" style="width:100px"/>
            </td>
        </tr>
    </table>
</form>
