@extends('permission-editor::layouts.app')

@section('content')
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Edit Permission</h1>
        </div>
    </div>
    <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <div class="sm:max-w-md px-6 py-4">

                        @if ($errors->any())
                            <div class="text-red-500 text-sm mb-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('permission-editor.permissions.update', $permission) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div>
                                <label class="block font-medium text-sm text-gray-700" for="name">
                                    Name
                                </label>

                                <input type="text" name="name" id="name" value="{{ $permission->name ?? old('name') }}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" required="required" autofocus="autofocus">
                            </div>

                            @if ($roles->count())
                            <div class="mt-4">
                                <label class="block font-medium text-sm text-gray-700" for="name">
                                    Roles
                                </label>

                                @foreach ($roles as $id => $name)
                                    <input type="checkbox" name="roles[]" id="role-{{ $id }}" value="{{ $id }}" @checked(in_array($id, old('role', [])) || $permission->roles->contains($id))>
                                    <label class="text-sm font-medium text-gray-700" for="role-{{ $id }}">{{ $name }}</label>
                                    <br />
                                @endforeach
                            </div>
                            @endif

                            <div class="mt-4">
                                <button type="submit" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
