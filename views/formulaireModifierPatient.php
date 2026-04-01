<br />
<b>Modifier le dossier d'un Patient : </b>
<br />
<br />
<!--Formulaire pour la modification d'une clinique -->
<form method="POST" action="patientController.php?action=modifierPatient">
    <table>
        <tr>
            <td>
                <label>N° de Dossier :</label>
            </td>
            <td>
                <input name="noDossier" value="<?php echo $patient->getNoDossier(); ?>" readonly class="inputreadonly"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>N° d'assurance Maladie :</label>
            </td>
            <td>
                <input name="noAssuranceMaladie" value="<?php echo $patient->getNoAssuranceMaladie(); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Nom du patient :</label>
            </td>
            <td>
                <input name="nom" value="<?php echo $patient->getNom(); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Prenom du patient :</label>
            </td>
            <td>
                <input name="prenom" value="<?php echo $patient->getPrenom(); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Adresse :</label>
            </td>
            <td>
                <input name="adresse" value="<?php echo $patient->getAdresse(); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Ville :</label>
            </td>
            <td>
                <input name="ville" value="<?php echo $patient->getVille(); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Province :</label>
            </td>
            <td>
                <input name="province" value="<?php echo $patient->getProvince(); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>CodePostal :</label>
            </td>
            <td>
                <input name="codePostal" value="<?php echo $patient->getCodePostal(); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Telephone :</label>
            </td>
            <td>
                <input name="telephone" value="<?php echo $patient->getTelephone(); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Courriel :</label>
            </td>
            <td>
                <input name="courriel" value="<?php echo $patient->getCourriel(); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Le nom de la Clinique :</label>
            </td>
            <td>
                <input  name="nomClinique" value="<?= $nomClinique ?>" readonly class="inputreadonly">
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                <input type="submit" value="Modifier"/>
                <input type="button" value="Annuler" onclick="history.back();"/>
            </td>
        </tr>
    </table>
    <input type="hidden" name="idClinique" value="<?= $patient->getIdClinique() ?>">
    <input type="hidden" name="nomClinique" value="<?= $nomClinique ?>">
</form>