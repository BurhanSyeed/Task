<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                        @error('price')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    @enderror
                    <div>
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="number" name="price" id="price" placeholder="Enter The Product Price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            autocomplete="off" />
                    </div>
                @error('price')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
                    <div>
                        <button type="submit"
                            class="p-4 mb-4 text-white bg-blue-600 px-5 py-2.5 rounded-lg">
                            Submit
                        </button>
                    </div>
                </form>
        </div>
    </div>
</x-app-layout>

