<x-app-layout>   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <form class="space-y-6" action="{{ route('product.update', $product->id) }}" method="POST"
                    autocomplete="off">
                    @csrf
                    @method('PUT')

                    <h5 class="text-xl font-medium text-gray-900 dark:text-white">Edit Product</h5>

                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Name
                        </label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Enter the product name" value="{{ old('name', $product->name) }}" />
                        @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Price
                        </label>
                        <input type="number" name="price" id="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Enter the product price" value="{{ old('price', $product->price) }}" />
                        @error('price')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit"
                            class="text-white bg-blue-600 px-5 py-2.5 rounded-lg">
                            Update Product
                        </button>
                    </div>
                </form>
        </div>
    </div>
</x-app-layout>