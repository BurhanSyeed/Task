<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="w-full max-w-sm p-4  border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                <form class="space-y-6" action="{{ url('product') }}" method="post" autocomplete="off" onsubmit="return checkValiation()">
                    @csrf
                    <h5 class="text-xl font-medium text-gray-900 dark:text-white">Product Registration</h5>
                    <div>
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Enter The Product Name" autocomplete="off" />
                    </div>
                    @error('name')
                        {{ $message }}
                    @enderror
                    <div>
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="number" name="price" id="price" placeholder="Enter The Product Price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            autocomplete="off" />
                    </div>
                    @error('price')
                        {{ $message }}
                    @enderror
                    <div>
                        <button type="submit"
                            className="!bg-blue-700 !text-white !appearance-none !border-none px-4 py-2 rounded hover:!bg-red-800 transition">
                            Submit
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>

