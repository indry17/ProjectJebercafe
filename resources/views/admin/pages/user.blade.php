<x-admin.index :user="$user" :isAdmin="$isAdmin">
    <div class="content-wrapper">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User Data-Table</h4>
                    <p class="card-description">
                        User information table
                    </p>
                    <table class="table table-hover">
                        <thead>
                            <tr class="bg-slate-800">
                                @foreach (['Name', 'Email', 'Created at', 'Action'] as $heading)
                                    <th class="font-bold text-white">{{ $heading }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @if ($isAdmin === false)
                                <tr>
                                    <td>Only Admin can</td>
                                    <td>view or edit</td>
                                    <td>users</td>
                                    <td>data</td>
                                </tr>
                            @else
                                @foreach ($data as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->created_at }}</td>
                                        @if ($data->usertype == '0')
                                            <td>
                                                <form method="POST" action="{{ route('user.destroy', $data->id) }}">
                                                    @method('DELETE')
                                                    @csrf

                                                    <div class="form-group">
                                                        <button type="submit" class="badge badge-danger cursor-pointer"
                                                            onclick="return confirmDeleteUser({{ $data->id }} , '{{ $data->name }}');">Delete</button>
                                                    </div>
                                                </form>
                                            </td>
                                        @else
                                            <td>
                                                <p class="badge badge-dark">Not allowed</p>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                            <!-- New Row for Adding Admin Button -->
                            <tr>
                                <td colspan="4">
                                    {{-- <button onclick="confirmAddAdmin()" class="btn btn-primary">Tambah Admin?</button> --}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDeleteUser(id, name) {
            if (!confirm("Are You Sure to delete this user, Named: " + name + ", Id: " + id + "."))
                event.preventDefault();
        }

        function confirmAddAdmin() {
            if (confirm("Are You sure you want to add an admin?")) {
                window.location.href = "{{ route('register') }}";
            }
        }
        // You can also redirect to a specific route for adding admin or perform other actions here.
    </script>
</x-admin.index>
