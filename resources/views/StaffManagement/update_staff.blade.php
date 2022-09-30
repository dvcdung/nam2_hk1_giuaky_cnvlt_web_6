@extends('Layouts/layout')

@section('title-page', "Update Staff")

@section('link-lib')

@endsection

@section('link-style')
    <link rel="stylesheet" href="/css/StaffManagement/update_staff.css">
@endsection

@section('right-side-content')
    <form action="{{ route('staff-management.update') }}" method="post">
        @csrf
        <table>
            <tr>
                <td class="col1">Id</td>
                <td class="col2">
                    <input type="text" name="id" value="{{ $object->id }}" disabled>
                    <input type="hidden" name="object[id]" value="{{ $object->id }}">
                </td>
            </tr>
            <tr>
                <td class="col1">Staff Name</td>
                <td class="col2">
                    <input type="text" name="object[tennhanvien]" value="{{ $object->tennhanvien }}">
                </td>
            </tr>
            <tr>
                <td class="col1"></td>
                <td class="col2">
                    <input type="hidden" name="act" value="save">
                    <button class="btn btn-primary" type="submit">Save</button>
                </td>
            </tr>
        </table>
    </form>
@endsection