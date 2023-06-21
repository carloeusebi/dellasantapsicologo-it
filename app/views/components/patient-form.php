<!-- FIRSTNAME -->
<div class="col-12 col-md-5">
    <label for="fname" class="form-label">Nome</label>
    <input type="text" class="form-control" id="fname" name="fname" value="<?= $isFilled ? $fname : '' ?>" required>
</div>
<!-- LASTNAME -->
<div class="col-12 col-md-5">
    <label for="lname" class="form-label">Cognome</label>
    <input type="text" class="form-control" id="lname" name="lname" value="<?= $isFilled ? $lname : '' ?>" required>
</div>
<!-- SEX -->
<div class="col-12 col-md-2">
    <label for="sex" class="form-label">Sesso</label>
    <select type="text" class="form-control" id="sex" name="sex">
        <option value="m" <?php if ($isFilled && $sex === 'M') echo ' selected' ?>>M</option>
        <option value="f" <?php if ($isFilled && $sex === 'F') echo ' selected' ?>>F</option>
        <option value="o" <?php if ($isFilled && $sex === 'O') echo ' selected' ?>>Altro</option>
    </select>
</div>
<!-- MAIL -->
<div class="col-12 col-md-5 col-lg-5 flex-grow-1">
    <label for="email" class="form-label">Email</label>
    <input type="mail" class="form-control" id="email" name="email" value="<?= $isFilled ? $email : '' ?>">
</div>
<!-- PHONE -->
<div class="col-12 col-md-4 col-lg-5">
    <label for="phone" class="form-label">Telefono</label>
    <input type="tel" class="form-control" id="phone" name="phone" value="<?= $isFilled ? $phone : '' ?>">
</div>
<?php if (!isset($test)) : ?>
    <!-- BEGIN -->
    <div class="col-12 col-md-3 col-lg-2">
        <label for="begin" class="form-label">Paziente dal</label>
        <input type="date" class="form-control" id="begin" name="begin" value="<?= $isFilled ? $begin : '' ?>">
    </div>
<?php endif ?>
<!-- BIRTHDAY -->
<div class="col-12 col-md-3">
    <label for="birthday" class="form-label">Nato il</label>
    <input type="date" class="form-control" id="birthday" name="birthday" value="<?= $isFilled ? $birthday : '' ?>" required>
</div>
<!-- BIRTHPLACE -->
<div class="col-12 col-md-6">
    <label for="birthplace" class="form-label">Luogo di nascita</label>
    <input type="text" class="form-control" id="birthplace" name="birthplace" value="<?= $isFilled ? $birthplace : '' ?>">
</div>
<!-- AGE -->
<div class="col-12 col-md-3">
    <label for="age" class="form-label">Età</label>
    <input type="number" class="form-control" id="age" name="age" value="<?= $isFilled ? $age : '' ?>">
</div>
<!-- ADDRESS -->
<div class="col-12">
    <label for="address" class="form-label">Indirizzo</label>
    <input type="text" class="form-control" id="address" name="address" value="<?= $isFilled ? $address : '' ?>">
</div>
<!-- FISCAL CODE -->
<div class="col-12">
    <label for="fiscalcode" class="form-label">Codce Fiscale</label>
    <input type="text" class="form-control" id="fiscalcode" name="fiscalcode" value="<?= $isFilled ? $fiscalcode : '' ?>">
</div>
<!-- CONSENT -->
<?php if (!isset($test)) : ?>
    <div class="col-12">
        <input type="hidden" name="MAX_FILE_SIZE" value="1048476">
        <label for="consent" class="form-label">Firma per il consenso</label>
        <input type="hidden" name="oldConsent" value="<?= $isFilled ? $consent : '' ?>">
        <input type="file" class="form-control" id="consent" name="consent" accept="application/pdf">
    </div>
<?php endif ?>
<!-- WEIGHT -->
<div class="col-6 col-md-3 col-lg-2">
    <label for="weight" class="form-label">Peso in kg</label>
    <input type="number" class="form-control" id="weight" name="weight" value="<?= $isFilled ? $weight : '' ?>">
</div>
<!-- HEIGHT -->
<div class="col-6 col-md-3 col-lg-2">
    <label for="height" class="form-label">Altezza in cm</label>
    <input type="number" class="form-control" id="height" name="height" value="<?= $isFilled ? $height : '' ?>">
</div>
<!-- JOB -->
<div class="col-12 col-md-6 col-lg-8">
    <label for="job" class="form-label">Lavoro</label>
    <input type="text" class="form-control" id="job" name="job" value="<?= $isFilled ? $job : '' ?>">
</div>
<!-- COHABITANTS -->
<div class="col-12">
    <label for="cohabitants" class="form-label">Altri conviventi (separati da una virgola)</label>
    <input type="text" class="form-control" id="cohabitants" name="cohabitants" value="<?= $isFilled ? $cohabitants : '' ?>">
</div>