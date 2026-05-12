<td align="left" valign="top" width="90%">
    <div class="page-content">
        <div class="newboxheading">
            <div class="newhead">Roles Master<div class="newoptionmenu">
                    <div>
                        <button type="button" class="btn btn-secondary btn-lg waves-effect waves-light"
                            onclick="openPopup('Add Role','{{ route('roles.create') }}')" data-backdrop="static">Add
                            Role</button>
                    </div>
                </div>
            </div>
            <!-- start page title -->
            <div class=" ">
                <div class="col-md-12 col-xl-12">
                    <div>
                        <div class="card-body" style="padding:20px;">
                            <img src="{{ asset('assets/images/profilepic/16942404066793789211693635606.jpg') }}"
                                style=" height:40px;">
                            <div class="roleouter">
                                <div class="hyrouter" style="margin-bottom:0px; border-left:0px; ">
                                    <div class="rolebox" style=" margin-left: -96px;">CEO</div>
                                </div>
                                @php
                                    $groupedRoles = $roles->groupBy(function ($role) {
                                        return $role->branch->name ?? 'No Branch';
                                    });
                                @endphp

                                @forelse($groupedRoles as $branchName => $branchRoles)

                                    <div class="headrole">
                                        <div class="linerole"></div>
                                        {{ $branchName }}
                                    </div>

                                    @foreach ($branchRoles as $role)
                                        @include('setting.role-node', ['role' => $role])
                                    @endforeach

                                @empty

                                    <div style="padding:15px;">No roles found</div>

                                @endforelse
                                {{-- </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</td>
