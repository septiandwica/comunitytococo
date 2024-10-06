<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}

        </div>
        @endif

        <div class="flex items-center justify-center p-12">
            <div class="mx-auto w-full max-w-[550px] bg-white">
                <form method="POST" action="{{ route('form.store') }}">
                    @csrf
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Nama Lengkap
                            <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            placeholder="Masukan Nama Lengkap kamu"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            required="required"
                            value="{{ old('name') }}">
                        @error('name')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="phone" class="mb-3 block text-base font-medium text-[#07074D]">
                            Nomor Whatsapp
                            <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            name="phone"
                            id="phone"
                            placeholder="Masukan Nomor Whatsapp kamu"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            required="required"
                            value="{{ old('phone') }}">
                        @error('phone')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                            Email
                            <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            placeholder="Masukan Email kamu"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            required="required"
                            autocomplete="email"
                            value="{{ old('email') }}">
                        @error('email')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="age" class="mb-3 block text-base font-medium text-[#07074D]">Usia
                            <span class="text-red-500">*</span></label>
                        <input
                            type="number"
                            id="age"
                            name="age"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            required="required"
                            value="{{ old('age') }}">
                        @error('age')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="gender" class="mb-3 block text-base font-medium text-[#07074D]">Jenis Kelamin
                            <span class="text-red-500">*</span></label>
                        <select
                            id="gender"
                            name="gender"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            required="required">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Laki - Laki</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('gender')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Opsi Tipe Pelanggan -->

                    <div class="mb-5">
                        <label class="mb-3 block text-base font-medium text-[#07074D]">Jumlah yang kamu beli:</label>
                        <div class="flex items-center">
                            <input
                                type="radio"
                                id="single-purchase"
                                name="customer-type"
                                value="single"
                                onclick="toggleCustomerType()"
                                {{ old('customer-type') == 'single' ? 'checked' : '' }}>
                            <label for="single-purchase" class="ml-2">Satuan</label>
                        </div>
                        <div class="flex items-center">
                            <input
                                type="radio"
                                id="bulk-purchase"
                                name="customer-type"
                                value="bulk"
                                onclick="toggleCustomerType()"
                                {{ old('customer-type') == 'bulk' ? 'checked' : '' }}>
                            <label for="bulk-purchase" class="ml-2">Banyak (Grosir)</label>
                        </div>
                        @error('customer-type')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Bagian untuk Pembelian Satuan -->
                    <div class="mb-5" style="display: none;" id="single-options">
                        <label for="productbuy" class="mb-3 block text-base font-medium text-[#07074D]">Produk Tococo Indonesia Yang kamu beli (Satuan)
                            <span class="text-red-500">*</span></label>
                        <select
                            id="productbuy"
                            name="productbuy"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                            <option value="">Pilih Produk</option>
                            <option
                                value="tococochips"
                                {{ old('productbuy') == 'tococochips' ? 'selected' : '' }}>Tococo Chips</option>
                            <option value="alcoco" {{ old('productbuy') == 'alcoco' ? 'selected' : '' }}>Alcoco Oil</option>
                            <option value="copa" {{ old('productbuy') == 'copa' ? 'selected' : '' }}>COPA</option>
                            <option value="cocofe" {{ old('productbuy') == 'cocofe' ? 'selected' : '' }}>COCOFE</option>
                        </select>
                        @error('productbuy')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Bagian untuk Pembelian Banyak -->
                    <!-- Bagian untuk Pembelian Banyak -->
                    <div id="bulk-options" style="display: none;">
                        <label
                            for="bulk-quantity"
                            class="mb-3 block text-base font-medium text-[#07074D]">Berapa banyak produk yang ingin Anda beli?
                            <span class="text-red-500">*</span></label>
                        <input
                            type="number"
                            id="bulk-quantity"
                            name="bulk-quantity"
                            min="10"
                            required="required"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ old('bulk-quantity') }}"
                            style="display: none;"><br><br>
                        @error('bulk-quantity')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label class="mb-3 block text-base font-medium text-[#07074D]">Produk Tococo Indonesia Apa yang ingin kamu coba selanjutnya?
                            <span class="text-red-500">*</span></label>

                        <div class="flex flex-col">
                            <label>
                                <input
                                    type="checkbox"
                                    name="producttry[]"
                                    value="tococochips"
                                    class="mr-2"
                                    {{ in_array('tococochips', old('producttry', [])) ? 'checked' : '' }}>
                                Tococo Chips
                            </label>
                            <label>
                                <input
                                    type="checkbox"
                                    name="producttry[]"
                                    value="alcoco"
                                    class="mr-2"
                                    {{ in_array('alcoco', old('producttry', [])) ? 'checked' : '' }}>
                                Alcoco Oil
                            </label>
                            <label>
                                <input
                                    type="checkbox"
                                    name="producttry[]"
                                    value="copa"
                                    class="mr-2"
                                    {{ in_array('copa', old('producttry', [])) ? 'checked' : '' }}>
                                COPA
                            </label>
                            <label>
                                <input
                                    type="checkbox"
                                    name="producttry[]"
                                    value="cocofe"
                                    class="mr-2"
                                    {{ in_array('cocofe', old('producttry', [])) ? 'checked' : '' }}>
                                COCOFE
                            </label>
                        </div>
                        @error('producttry.*')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="message" class="mb-3 block text-base font-medium text-[#07074D]">Pesan</label>
                        <textarea
                            id="message"
                            name="message"
                            placeholder="Sampaikan harapan Kamu bagi kesejahteraan petani kelapa binaan Tococo Indonesia melalui kontribusi ini...."
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            rows="5">{{ old('message') }}</textarea>
                        @error('message')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-5 flex " id="agree">
                        <input
                            type="checkbox"
                            id="agree-checkbox"
                            name="agree"
                            value="agree"
                            class="mr-2 focus:border-[#6A64F1]"
                            required="required"
                            {{ old('agree') ? 'checked' : '' }}>
                        <label
                            for="agree-checkbox"
                            class="mb-3 block text-base font-medium text-red-500 ">
                            *) Untuk Berkontribusi pada petani binaan Tococo Indonesia saya menyatakan
                            setuju untuk menerima promosi dan komunikasi
                        </label>
                        @error('agree')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-5" id="frequency-options">
                        <label class="mb-3 block text-base font-medium text-[#07074D]">Frekuensi informasi yang diinginkan:
                        </label>
                        <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-4">

                            <div class="flex items-center">
                                <input
                                    type="radio"
                                    name="frequency"
                                    id="weekly"
                                    value="weekly"
                                    class="focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required="required"
                                    {{ old('frequency') == 'weekly' ? 'checked' : '' }}>
                                <label for="weekly" class="ml-2">Mingguan</label>
                            </div>
                            <div class="flex items-center">
                                <input
                                    type="radio"
                                    name="frequency"
                                    id="monthly"
                                    value="monthly"
                                    class="focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required="required"
                                    {{ old('frequency') == 'monthly' ? 'checked' : '' }}>
                                <label for="monthly" class="ml-2">Bulanan</label>
                            </div>
                            <div class="flex items-center">
                                <input
                                    type="radio"
                                    name="frequency"
                                    id="new-product"
                                    value="new-product"
                                    class="focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required="required"
                                    {{ old('frequency') == 'new-product' ? 'checked' : '' }}>
                                <label for="new-product" class="ml-2">Produk Baru</label>
                            </div>
                        </div>
                        @error('frequency')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <button
                            type="submit"
                            class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                            Mari Berkontribusi
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            function toggleCustomerType() {
                let singleOptions = document.getElementById("single-options");
                let bulkOptions = document.getElementById("bulk-options");
                let singlePurchase = document.getElementById("single-purchase");
                let bulkPurchase = document.getElementById("bulk-purchase");
                let bulkQuantity = document.getElementById("bulk-quantity");
                let productbuy = document.getElementById("productbuy"); // Add this line

                if (singlePurchase.checked) {
                    singleOptions.style.display = "block";
                    bulkOptions.style.display = "none";

                    // Hide the bulk quantity field and remove the required attribute
                    bulkQuantity.value = ""; // Clear any value
                    bulkQuantity.removeAttribute("required");
                    bulkQuantity.style.display = "none"; // Hide the input visually as well

                    // Ensure productbuy is visible and required
                    productbuy.setAttribute("required", "required"); // Add required attribute
                } else if (bulkPurchase.checked) {
                    singleOptions.style.display = "none";
                    bulkOptions.style.display = "block";

                    // Show the bulk quantity field and set it as required
                    bulkQuantity.style.display = "block"; // Show the input
                    bulkQuantity.setAttribute("required", "required"); // Make it required

                    // Hide productbuy and remove required
                    productbuy.value = ""; // Clear any value
                    productbuy.removeAttribute("required"); // Remove required attribute
                }
            }
        </script>
    </body>
</html>