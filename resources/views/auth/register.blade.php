<x-layout>
    <x-header>
        Register page
    </x-header>

    <div class="max-w-2xl p-4 mx-auto rounded-lg shadow-lg bg-slate-300 dark:bg-slate-900">
          <h2 class="mb-6 text-2xl font-bold">Register</h2>
          <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="username">Username</label>
              <input type="text" id="username" name="username" class="
              @error('username')
              border-red-500 dark:border-red-500
          @else
              border-gray-300 dark:border-gray-600
          @enderror
          bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          @error('username')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="email">Email</label>
              <input type="email" id="email" name="email" class="
              @error('email')
              border-red-500 dark:border-red-500
          @else
              border-gray-300 dark:border-gray-600
          @enderror
          bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          @error('email')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="password">Password</label>
              <input type="password" id="password" name="password" class="
              @error('password')
              border-red-500 dark:border-red-500
          @else
              border-gray-300 dark:border-gray-600
          @enderror
          bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          @error('password')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="password_confirmation">Confirm Password</label>
              <input type="password" id="password_confirmation" name="password_confirmation" class="
              @error('password_confirmation')
              border-red-500 dark:border-red-500
          @else
              border-gray-300 dark:border-gray-600
          @enderror
          bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          @error('password_confirmation')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="thumbnail">Thumbnail</label>
              <input type="file" id="thumbnail" name="thumbnail" class="
              @error('thumbnail')
              border-red-500 dark:border-red-500
          @else
              border-gray-300 dark:border-gray-600
          @enderror
          bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          @error('thumbnail')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-center me-4">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Register</button> <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Already have an account <span class="text-red-700"><a href="{{route('login')}}">login here</a></span></p>
            </div>
          </form>
      </div>
</x-layout>
