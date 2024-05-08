<form>
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Nom</label>
            <input name="nom" type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrez le Nom" value="Hamid">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Prénom</label>
            <input name="prenom" type="text" class="form-control" id="exampleInputPassword1" placeholder="Entrez le Prénom" value="Achaou">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input name="email" type="email" class="form-control" id="exampleInputPassword1" placeholder="Entrez l'Email" value="hamid@solicode.com">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Mot de passe</label>
            <input name="motDePasse" type="password" class="form-control" id="exampleInputPassword1" value="1234567890" placeholder="Entrez le Mot de passe">
        </div>

        <div class="form-group">
            <label for="exampleInputProject">Role</label>
            <select name="project" class="form-control" id="exampleInputProject">
                <option value="projet1">chef de projet </option>
                <option value="projet2">admin</option>
                <option value="projet3">member</option>
            </select>
        </div>

    </div>

    <div class="card-footer">
        <a href="./index.php" class="btn btn-default">Annuler</a>
        <a href="./index.php" type="submit" class="btn btn-info">Ajouter</a>
    </div>
</form>