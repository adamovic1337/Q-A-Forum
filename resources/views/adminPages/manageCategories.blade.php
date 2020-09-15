@extends('layouts.admin.appAdmin')

@section('main')
<main class="row">
    <aside class="col s3" id="adminAsside">

    </aside>

    <section class="col s9">

        <h5><span class="deep-orange-text text-darken-3">#</span>Categories</h5>
        <div class="row">
            <table class="centered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>insert</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <form action="{{ route('admin.category.insert') }}" method="post">
                        @csrf
                        <td>*</td>
                        <td><input type="text" name="name" ></td>
                        <td><button class="btn-floating btn-small waves-effect waves-light blue darken-4" type="submit"><i class="fas fa-share"></i></button></td>
                    </form>
                </tr>
                </tbody>
            </table>
            <br>
            <br>
            <table class="centered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th colspan="2">Name</th>
                    <th>Slug</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        @include('partials.admin.categoriesAdmin')
                    @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </section>
</main>
@endsection

