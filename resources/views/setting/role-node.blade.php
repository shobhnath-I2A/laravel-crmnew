<div class="hyrouter">

    <div class="linerole"></div>

    <div class="ingry">
        {{ $role->name }}

        <a class="dropdown-item neweditpan" onclick="openPopup('Edit Role','{{ route('roles.edit', $role->id) }}')">

            <i class="fa fa-pencil" aria-hidden="true"></i>
        </a>
    </div>

    @if ($role->children->count())

        @foreach ($role->children as $child)
            @include('setting.role-node', ['role' => $child])
        @endforeach

    @endif

</div>
