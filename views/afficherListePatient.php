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
            <th>N° de Dossier</th>
            <th>N° d'Assurance maladie</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Province</th>
            <th>Code Postal</th>
            <th>Téléphone</th>
            <th>Courriel</th>
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
