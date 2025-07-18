@extends('layouts.user')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Edit Profile</h2>

    <form id="profile-form" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="name" class="block font-semibold mb-1">Name</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" class="w-full border border-gray-300 rounded p-2" required>
        </div>

        <div class="mb-4">
            <label for="bio" class="block font-semibold mb-1">Bio</label>
            <textarea id="bio" name="bio" class="w-full border border-gray-300 rounded p-2" rows="4">{{ $user->bio }}</textarea>
        </div>

        <div class="mb-4">
            <label for="profile_picture" class="block font-semibold mb-1">Profile Picture</label>
            <input type="file" id="profile_picture" name="profile_picture" accept="image/*" class="w-full">
            @if($user->profile_picture)
                <img id="profile-picture-preview" src="{{ asset('profile_picture/' . $user->profile_picture) }}" alt="Profile Picture" class="w-32 h-32 object-cover rounded mt-2">
            @else
                <img id="profile-picture-preview" src="" alt="Profile Picture Preview" class="w-32 h-32 object-cover rounded mt-2 hidden">
            @endif
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Oshimen</label>
            <div class="grid grid-cols-3 gap-2 max-h-48 overflow-y-auto border border-gray-300 rounded p-2">
                @foreach($members as $member)
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="oshimen[]" value="{{ $member->id }}" @if(in_array($member->id, $userOshimenIds)) checked @endif>
                        <span>{{ $member->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Save</button>
        <a href="{{ route('user.profile.show') }}"class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Back</a>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#profile-form').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '{{ route("user.profile.update") }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if(response.redirect) {
                        window.location.href = response.redirect;
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr) {
                    alert('Error updating profile');
                }
            });
        });
        });

        // Preview uploaded image
        $('#profile_picture').change(function() {
            const [file] = this.files;
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#profile-picture-preview').attr('src', e.target.result).removeClass('hidden');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
