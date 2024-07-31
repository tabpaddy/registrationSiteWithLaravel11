<x-layout>
    

    <div class="max-w-2xl p-4 mx-auto rounded-lg shadow-lg bg-slate-300 dark:bg-slate-900">
          <h2 class="mb-6 text-2xl font-bold">Password Reset</h2>
          <form method="POST" action="{{ route('forgot-password.send') }}" >
            @csrf
            <div class="mb-4">
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="username">Input Your Email</label>
              <input type="email" id="username" name="email" class="
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
            <div class="flex items-center me-4">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Send OTP</button>

            </div>


          </form>
      </div>
</x-layout>
