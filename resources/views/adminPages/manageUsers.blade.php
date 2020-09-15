@extends('layouts.admin.appAdmin')

@section('main')
    <main class="row">
        <aside class="col s3" id="adminAsside">

        </aside>
        <section class="col s9">
            <h5><span class="deep-orange-text text-darken-3">#</span>Users</h5>
            <div class="row">
                <table class="centered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        @include('partials.admin.usersAdmin')
                    @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </section>
    </main>
@endsection

