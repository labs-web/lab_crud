<div class="card-body table-responsive p-0">
    <table class="table table-striped text-nowrap">
        <thead>
            <tr>
                <th>{{ __('app.name') }}</th>
                <th>{{ __('app.description') }}</th>
                <th class="text-center">{{ __('app.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tagsData as $tag)
                <tr>
                    <td>{{ $tag->nom }}</td>
                    <td>{!! $tag->description !!}</td>

                    <td class="text-center">
                        @can('show-TagController')
                            <a href="{{ route('tags.show', $tag) }}" class="btn btn-default btn-sm">
                                <i class="far fa-eye"></i>
                            </a>
                        @endcan
                        @can('edit-TagController')
                            <a href="{{ route('tags.edit', $tag) }}" class="btn btn-sm btn-default">
                                <i class="fas fa-pen-square"></i>
                            </a>
                        @endcan
                        @can('destroy-TagController')
                            <form action="{{ route('tags.destroy', $tag) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce tag ?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        @endcan

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="d-md-flex justify-content-between align-items-center p-2">
    <ul class="pagination  m-0 float-right">
        {{ $tagsData->onEachSide(1)->links() }}
    </ul>
</div>
