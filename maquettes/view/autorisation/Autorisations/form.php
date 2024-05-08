<form>
    <div class="form-group">
        <label for="roleSelect">Role</label>
        <select class="form-control" id="roleSelect">
            <option>admin</option>
            <option>chef projet</option>
            <!-- Add more roles as needed -->
        </select>
    </div>


    <div class="form-group">
        <label for="controllerSelect">Controller</label>
        <select class="form-control" name="controllerSelect[]" id="controllerSelect" data-placeholder="Select Controller" style="width: 100%;">
            <option value="add">Projets</option>
            <option value="edit">Tâches</option>
            <option value="delete">Utilisateur</option>
        </select>
    </div>

    <div class="custom-control custom-checkbox">
        <input class="custom-control-input" type="checkbox" id="customCheckbox2">
        <label for="customCheckbox2" class="custom-control-label">Sélectionnez tous les droits</label>
    </div>

    <div class="form-group">
        <label for="actionSelect1">Actions</label>
        <select multiple class="form-control select2" name="actionSelect[]" id="actionSelect1" data-placeholder="Select actions" style="width: 100%;">
            <option value="add">Add</option>
            <option value="edit">Edit</option>
            <option value="delete">Delete</option>
            <option value="create">Create</option>
            <!-- Add more actions as needed -->
        </select>
    </div>

    <button type="submit" class="btn btn-info">Submit</button>
</form>