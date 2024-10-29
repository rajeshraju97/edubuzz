@extends('layouts.admin')
@section('title', 'Edit Subject')
@section('content')
<div class="flex flex-col flex-1 p-6">
    <header class="mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Edit Subject</h2>
    </header>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.subjects.update', $subject->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Spoofing the PUT method -->

        <div class="mb-4">
            <label for="name" class="block text-dark-300 font-bold">Subject Name</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full border border-gray-300 rounded-lg p-2"
                value="{{ old('name', $subject->name) }}" required>
        </div>

        <div class="mb-4">
            <label for="grade_id" class="block text-dark-300 font-bold">Select Grade</label>
            <select name="grade_id" id="grade_id" class="mt-1 block w-full border border-gray-300 rounded-lg p-2"
                required>
                <option value="">Select a grade</option>
                @foreach ($grades as $grade)
                    <option value="{{ $grade->id }}" {{ $subject->grade_id == $grade->id ? 'selected' : '' }}>
                        {{ $grade->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update
            Subject</button>
    </form>
</div>

@endsection