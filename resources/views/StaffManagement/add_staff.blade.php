@extends('Layouts/layout')

@section('title-page', "Add Staff")

@section('link-lib')

@endsection

@section('link-style')
    <link rel="stylesheet" href="/css/StaffManagement/add_staff.css">
@endsection

@section('right-side-content')
    <form action="{{ route('staff-management.create') }}" method="post">
        @csrf
        <table>
            <tr>
                <td class="col1">Id</td>
                <td class="col2">
                    <input type="text" name="id" value="auto-matically" disabled>
                </td>
            </tr>
            <tr>
                <td class="col1">Staff Name</td>
                <td class="col2">
                    <input type="text" name="tennhanvien" value="">
                </td>
            </tr>
            <tr>
                <td class="col1"></td>
                <td class="col2">
                    <input type="hidden" name="act" value="add">
                    <button class="btn btn-primary" type="submit">ADD</button>
                </td>
            </tr>
        </table>
    </form>
@endsection