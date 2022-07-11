@extends('layouts.main')
@section('contents')
<div class="content-wrapper">
    <table class="table table-bordered">
        <thead>
            <tr class="table-dark">
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hasil as $k => $v)
            <tr>
                <th scope="row">{{ ++$k }}</th>
                <td>{{ auth()->user()->name }}</td>
                <td>{{$v->nilai}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection