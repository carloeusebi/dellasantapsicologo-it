<!-- FIRSTNAME -->
<div class="col-12 col-md-5">
    <label for="fname" class="form-label">Nome</label>
    <input type="text" class="form-control" id="fname" name="fname" value="<?= isset($fillForm['fname']) ? $fillForm['fname'] : '' ?>">
</div>
<!-- LASTNAME -->
<div class="col-12 col-md-5">
    <label for="lname" class="form-label">Cognome</label>
    <input type="text" class="form-control" id="lname" name="lname" value="<?= isset($fillForm['lname']) ? $fillForm['lname'] : '' ?>">
</div>
<!-- SEX -->
<div class="col-12 col-md-2">
    <label for="sex" class="form-label">Sesso</label>
    <select type="text" class="form-control" id="sex" name="sex">
        <option value="m" <?php if (isset($fillForm['sex']) && $fillForm['sex'] === 'm') ' selected' ?>>M</option>
        <option value="f" <?php if (isset($fillForm['sex']) && $fillForm['sex'] === 'f') ' selected' ?>>F</option>
        <option value="o" <?php if (isset($fillForm['sex']) && $fillForm['sex'] === 'o') ' selected' ?>>Altro</option>
    </select>
</div>
<!-- MAIL -->
<div class="col-12 col-md-5 col-lg-5">
    <label for="email" class="form-label">Email</label>
    <input type="mail" class="form-control" id="email" name="email" value="<?= isset($fillForm['email']) ? $fillForm['email'] : '' ?>">
</div>
<!-- PHONE -->
<div class="col-12 col-md-4 col-lg-5">
    <label for="phone" class="form-label">Telefono</label>
    <input type="tel" class="form-control" id="phone" name="phone" value="<?= isset($fillForm['phone']) ? $fillForm['phone'] : '' ?>">
</div>
<!-- BEGIN -->
<div class="col-12 col-md-3 col-lg-2">
    <label for="begin" class="form-label">Paziente dal</label>
    <input type="date" class="form-control" id="begin" name="begin" value="<?= isset($fillForm['begin']) ? $fillForm['begin'] : '' ?>">
</div>
<!-- BIRTHDAY -->
<div class="col-12 col-md-3">
    <label for="birthday" class="form-label">Nato il</label>
    <input type="date" class="form-control" id="birthday" name="birthday" value="<?= isset($fillForm['birthday']) ? $fillForm['birthday'] : '' ?>">
</div>
<!-- BIRTHPLACE -->
<div class="col-12 col-md-6">
    <label for="birthplace" class="form-label">Luogo</label>
    <input type="text" class="form-control" id="birthplace" name="birthplace" value="<?= isset($fillForm['birthplace']) ? $fillForm['birthplace'] : '' ?>">
</div>
<!-- AGE -->
<div class="col-12 col-md-3">
    <label for="age" class="form-label">Età</label>
    <input type="number" class="form-control" id="age" name="age" value="<?= isset($fillForm['age']) ? $fillForm['age'] : '' ?>">
</div>
<!-- ADDRESS -->
<div class="col-12">
    <label for="address" class="form-label">Indirizzo</label>
    <input type="text" class="form-control" id="address" name="address" value="<?= isset($fillForm['address']) ? $fillForm['address'] : '' ?>">
</div>
<!-- FISCAL CODE -->
<div class="col-12">
    <label for="fiscalcode" class="form-label">Codce Fiscale</label>
    <input type="text" class="form-control" id="fiscalcode" name="fiscalcode" value="<?= isset($fillForm['fiscalcode']) ? $fillForm['fiscalcode'] : '' ?>">
</div>
<!-- CONSENT -->
<div class="col-12">
    <label for="consent" class="form-label">Firma per il consenso</label>
    <input type="file" class="form-control" id="consent" name="consent" value="<?= isset($fillForm['consent']) ? $fillForm['consent'] : '' ?>">
</div>
<!-- WEIGHT -->
<div class="col-6 col-md-3 col-lg-2">
    <label for="weight" class="form-label">Peso in kg</label>
    <input type="number" class="form-control" id="weight" name="weight" value="<?= isset($fillForm['weight']) ? $fillForm['weight'] : '' ?>">
</div>
<!-- HEIGHT -->
<div class="col-6 col-md-3 col-lg-2">
    <label for="height" class="form-label">Altezza in cm</label>
    <input type="number" class="form-control" id="height" name="height" value="<?= isset($fillForm['height']) ? $fillForm['height'] : '' ?>">
</div>
<!-- JOB -->
<div class="col-12 col-md-6 col-lg-8">
    <label for="job" class="form-label">Lavoro</label>
    <input type="text" class="form-control" id="job" name="job" value="<?= isset($fillForm['job']) ? $fillForm['job'] : '' ?>">
</div>
<!-- COHABITANTS -->
<div class="col-12">
    <label for="cohabitants" class="form-label">Altri conviventi (separati da una virgola)</label>
    <input type="text" class="form-control" id="cohabitants" name="cohabitants" value="<?= isset($fillForm['cohabitants']) ? $fillForm['cohabitants'] : '' ?>">
</div>