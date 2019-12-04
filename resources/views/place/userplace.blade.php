<ul class="media-list">
    @foreach ($places as $place)
        <li class="media mb-3">
            <div class="media-body">
                <div>
                 <span class="text-muted">posted at {{ $place->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">
                        <a href="{{ route('places.show', ['id' => $place->id]) }}">{!! nl2br(e($place->title)) !!}</a>
                   </p>
                </div>
            </div>
        </li>
    @endforeach
</ul>