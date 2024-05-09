<form action="{{ $dataToEdit ? route('projets.update', $dataToEdit->id) : route('projets.store') }}" method="POST">
    @csrf
    @if ($dataToEdit)
        @method('PUT')
    @endif
    <div class="card-body">
        <div class="form-group">
            <label for="nom">{{ __('GestionProjets/projet/message.name') }} <span
                    class="text-danger">*</span></label>
            <input name="nom" type="text" class="form-control" id="nom" placeholder="Entrez le titre"
                value="{{ $dataToEdit ? $dataToEdit->nom : old('nom') }}">
            @error('nom')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        

       
        <div class="form-group">
            <label for="inputDescription">{{ __('GestionProjets/projet/message.description') }}</label>
            <textarea name="description" id="editor" class="form-control" rows="7" placeholder="Entrez la description">
                {{ $dataToEdit ? $dataToEdit->description : old('description') }}
            </textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="card-footer">
        <a href="{{ route('projets.index') }}"
            class="btn btn-default">{{ __('GestionProjets/projet/message.cancel') }}</a>
        <button type="submit"
            class="btn btn-info">{{ $dataToEdit ? __('GestionProjets/projet/message.edit') : __('GestionProjets/projet/message.add') }}</button>
    </div>
</form>
